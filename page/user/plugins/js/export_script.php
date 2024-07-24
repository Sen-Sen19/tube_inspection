
<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Set default date values to today's date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_from').value = today;
    document.getElementById('date_to').value = today;

    // Event listener for Search button
    const searchBtn = document.getElementById('searchbtn');
    searchBtn.addEventListener('click', () => {
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        let url = `../../process/export_viewer.php?date_from=${dateFrom}&date_to=${dateTo}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Clear existing table rows if any
                const tableBody = document.getElementById('sp_cotdb_body');
                tableBody.innerHTML = '';

                // Populate table with fetched data
                data.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${formatCell(row.part_name)}</td>
                        <td>${formatCell(row.process)}</td>
                        <td>${formatCell(row.lot_no)}</td>
                        <td>${formatCell(row.serial_no)}</td>
                        <td>${formatCell(row.quantity)}</td>
                        <td>${formatCell(row.time_start)}</td>
                        <td>${formatCell(row.time_end)}</td>
                        <td>${formatCell(row.inspected_by)}</td>
                        <td>${formatCell(row.shift)}</td>
                        <td>${formatCell(row.inspection_date)}</td>
                        <td>${formatCell(row.total_mins)}</td>
                        <td>${formatCell(row.outside_appearance)}</td>
                        <td>${formatCell(row.slit_condition)}</td>
                        <td>${formatCell(row.inside_appearance)}</td>
                        <td>${formatCell(row.color)}</td>
                        <td>${formatCell(row.i_tolerance_plus)}</td>
                        <td>${formatCell(row.i_tolerance_minus)}</td>
                        <td>${formatCell(row.i_diameter_start)}</td>
                        <td>${formatCell(row.i_diameter_end)}</td>
                        <td>${formatCell(row.o_tolerance_plus)}</td>
                        <td>${formatCell(row.o_tolerance_minus)}</td>
                        <td>${formatCell(row.o_diameter_start)}</td>
                        <td>${formatCell(row.o_diameter_end)}</td>
                        <td>${formatCell(row.w_tolerance_plus)}</td>
                        <td>${formatCell(row.w_tolerance_minus)}</td>
                        <td>${formatCell(row.q1_start)}</td>
                        <td>${formatCell(row.q2_start)}</td>
                        <td>${formatCell(row.q3_start)}</td>
                        <td>${formatCell(row.q4_start)}</td>
                        <td>${formatCell(row.q1_middle)}</td>
                        <td>${formatCell(row.q2_middle)}</td>
                        <td>${formatCell(row.q3_middle)}</td>
                        <td>${formatCell(row.q4_middle)}</td>
                        <td>${formatCell(row.q1_end)}</td>
                        <td>${formatCell(row.q2_end)}</td>
                        <td>${formatCell(row.q3_end)}</td>
                        <td>${formatCell(row.q4_end)}</td>
                        <td>${formatCell(row.using_round_bar)}</td>
                        <td>${formatCell(row.using_bare_hands)}</td>
                        <td>${formatCell(row.appearance_judgement)}</td>
                        <td>${formatCell(row.dimension_judgement)}</td>
                        <td>${formatCell(row.ng_quantity)}</td>
                        <td>${formatCell(row.defect_type)}</td>
                        <td>${formatCell(row.confirm_by)}</td>
                        <td>${formatCell(row.remarks)}</td>
                    `;
                    tableBody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });



    function exportCSV() {
    const dateFrom = document.getElementById('date_from').value;
    const dateTo = document.getElementById('date_to').value;

    let url = `../../process/export_viewer.php?date_from=${dateFrom}&date_to=${dateTo}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Fetched Data:', data); // Debugging: Check the fetched data

            const aggregatedData = {};
            data.forEach(row => {
                const partName = row.part_name || ''; // Default to empty string if undefined
                const process = (row.process || '').trim(); // Default to empty string and trim
                const ngQuantity = parseInt(row.ng_quantity) || 0;
                const totalMins = parseFloat(row.total_mins) || 0;
                const remark = row.remarks || ''; // Default to empty string if undefined

                // Debugging: Log each row's data
                console.log(`Processing Row: PartName=${partName}, Process=${process}, NGQuantity=${ngQuantity}, TotalMins=${totalMins}, Remark=${remark}`);

                // Aggregate data for all rows
                if (aggregatedData[partName]) {
                    aggregatedData[partName].totalNG += ngQuantity; // Sum NG Quantity
                    aggregatedData[partName].totalMins += totalMins; // Sum total minutes
                    if (process === "Mass Production") {
                        aggregatedData[partName].count++; // Count occurrences of this partName if process is "Mass Production"
                    }
                } else {
                    aggregatedData[partName] = {
                        totalNG: ngQuantity, // Initialize NG Quantity
                        totalMins: totalMins, // Initialize total minutes
                        count: process === "Mass Production" ? 1 : 0, // Initialize count based on process
                        remark: remark // Store first remark
                    };
                }
            });

            console.log('Aggregated Data:', aggregatedData); // Debugging: Check aggregated data

            // Prepare CSV data
            let csvContent = "data:text/csv;charset=utf-8,";

            // CSV Header
            csvContent += "Item No,Part Name,Total Box/Roll,Total Part Qty,Total Inspected Qty,Total NG Detected, Ng %, Total Inspection Time,Frequency of Remark\n";

            let itemNo = 1;

            for (const partName in aggregatedData) {
                const { totalNG, totalMins, count, remark } = aggregatedData[partName];
                
                // Format totalMins to two decimal places
                const formattedTime = totalMins.toFixed(2);
                // Format count as Total Box/Roll
                const formattedBoxRoll = count; // Total number of occurrences for "Mass Production"

                // Format row content
                const rowContent = `${itemNo},${partName},${formattedBoxRoll},,,${totalNG},,${formattedTime},${remark}`;
                csvContent += rowContent + "\n";

                itemNo++;
            }

            // Create a download link and trigger download
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `COT_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            link.click();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}





    

    function formatCell(value) {
        return value === null || value === undefined || value === '' ? 'N/A' : value.toString().replace(/"/g, '""'); 
    }

    
    const pidsBtn = document.getElementById('pidsBtn');
    pidsBtn.addEventListener('click', exportCSV);
});
  // Event listener for Export button
    const exportBtn = document.getElementById('exportReqBtn');
    exportBtn.addEventListener('click', () => {
        // Call the exportTable function
        exportTable();
    });

    // Function to export table data to CSV
    function exportTable() {
    // Get the table element
    const table = document.getElementById('sp_cotdb');
    
    if (!table) {
        console.error('Table not found!');
        return;
    }

    const rows = table.rows;
    if (!rows || rows.length === 0) {
        console.error('No rows found in the table!');
        return;
    }

    // Initialize an array to hold the CSV data
    let csvContent = "";

    // Iterate over each row
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.cells;
        
        if (!cells) {
            console.error('Cells not found in row ' + i);
            continue;
        }

        let rowContent = [];
        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            rowContent.push(cell.textContent.replace(/(\r\n|\n|\r)/gm, "").trim()); // Clean up cell content
        }
        
        csvContent += rowContent.join(",") + "\n"; // Join the row's content and add a new line
    }

    // Create a blob with the CSV content and trigger a download
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement("a");
    if (link.download !== undefined) { // Feature detection
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", "table_export.csv");
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

</script>
