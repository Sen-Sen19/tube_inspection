<script>
     
  

    // Event listener for Export button
    const exportBtn = document.getElementById('exportReqBtn');
    exportBtn.addEventListener('click', () => {
        // Call the exportTable function
        exportTable();
    });

    // Function to export table data to CSV
    function exportTable() {
        const table = document.getElementById('export_cotdb');
        const rows = Array.from(table.rows);

        // Extract headers
        const headers = rows[0].cells;
        const headerRow = [];
        for (let header of headers) {
            headerRow.push(header.textContent);
        }

        // Extract rows
        const csvContent = [];
        csvContent.push(headerRow.join(','));

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].cells;
            const row = [];
            for (let cell of cells) {
                row.push(cell.textContent);
            }
            csvContent.push(row.join(','));
        }

        const csvBlob = new Blob([csvContent.join('\n')], { type: 'text/csv' });
        const csvUrl = URL.createObjectURL(csvBlob);

        const a = document.createElement('a');
        a.href = csvUrl;
        a.download = `COT_${new Date().toISOString().split('T')[0]}.csv`;
        document.body.appendChild(a);       
        a.click();
        document.body.removeChild(a);
    }

    // Function to refresh the page
    const refreshBtn = document.getElementById('refreshPageBtn');
    refreshBtn.addEventListener('click', () => {
        refreshPage();
    });

    // Function to refresh the page
    function refreshPage() {
        location.reload();
    }


</script>