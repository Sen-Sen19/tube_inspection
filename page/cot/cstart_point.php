<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/cot_bar.php';?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Start Point</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="nav-icon fas fa-play-circle"></i> Start Point</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label>&nbsp;</label>
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-block btn-success" style="background-color: #20c997; border-color: #20c997;color:white;"id="openModalBtn" data-toggle="modal" data-target="#addRecordModal">
    <i class="fas fa-plus mr-2"></i>Add Record
</button>

                                </div>
                            </div>

                            <div class="row mt-5">
                                <!-- Search Section -->
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchBox" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <input type="text" id="searchBox" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="searchReqBtn" onclick="search_accounts(1)">
                                                <i class="fas fa-search mr-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons Section -->
                                <div class="col-md-8 d-flex justify-content-end align-items-center">
                                    <button class="btn btn-danger mr-2" id="deleteReqBtn" onclick="delete_accounts()" style="width: 20%;">
                                        <i class="fas fa-trash-alt mr-2"></i>Delete
                                    </button>
                                    <button class="btn btn-warning" id="exportReqBtn" onclick="export_accounts()" style="width: 20%;">
                                        <i class="fas fa-file-export mr-2"></i>Export
                                    </button>
                                </div>
                            </div>
                            <div id="accounts_table_res" class="table-responsive" style="height: 415px; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="sp_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <tr>
                                             <th>#</th>
                <th>Part Name</th>
                <th>Quantity</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Inspected By</th>
                <th>Shift</th>
                <th>Inspection Date</th>
                <th>Total Minutes</th>
                <th>Outside Appearance</th>
                <th>Slit Condition</th>
                <th>Inside Appearance</th>
                <th>Color</th>
                <th>I Tolerance +</th>
                <th>I Tolerance -</th>
                <th>I Diameter Start</th>
                <th>I Diameter End</th>
                <th>O Tolerance +</th>
                <th>O Tolerance -</th>
                <th>O Diameter Start</th>
                <th>O Diameter End</th>
                <th>W Tolerance +</th>
                <th>W Tolerance -</th>
                <th>Q1 Start</th>
                <th>Q2 Start</th>
                <th>Q3 Start</th>
                <th>Q4 Start</th>
                <th>Q1 Middle</th>
                <th>Q2 Middle</th>
                <th>Q3 Middle</th>
                <th>Q4 Middle</th>
                <th>Q1 End</th>
                <th>Q2 End</th>
                <th>Q3 End</th>
                <th>Q4 End</th>
                <th>Using Round Bar</th>
                <th>Using Bare Hands</th>
                <th>Appearance Judgement</th>
                <th>Dimension Judgement</th>
                <th>NG Quantity</th>
                <th>Defect Type</th>
                <th>Confirm By</th>
                <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sp_cotdb_body" style="text-align: center;">
        <tr>
                                            <!-- <td colspan="6" style="text-align:center;">
                                                <div class="spinner-border text-dark" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            <div class="d-flex justify-content-sm-end">
                                <div class="dataTables_info" id="accounts_table_info" role="status" aria-live="polite"></div>
                            </div>
                            <div class="d-flex justify-content-sm-center">
                                <button type="button" class="btn bg-gray-dark" id="btnNextPage" style="display:none;" onclick="get_next_page()">Load more</button>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>
<?php

try {
    $stmt = $conn->prepare("SELECT * FROM sp_cotdb"); // Replace 'sp_cotdb' with your actual table name
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<script>
    // Function to populate the table with data
    function populateTable() {
        var tbody = document.getElementById('sp_cotdb_body'); // ID of your <tbody> element

        <?php foreach ($result as $row): ?>
            tbody.innerHTML += `
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['part_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['time_start']; ?></td>
                    <td><?php echo $row['time_end']; ?></td>
                    <td><?php echo $row['inspected_by']; ?></td>
                    <td><?php echo $row['shift']; ?></td>
                    <td><?php echo $row['inspection_date']; ?></td>
                    <td><?php echo $row['total_mins']; ?></td>
                    <td><?php echo $row['outside_appearance']; ?></td>
                    <td><?php echo $row['slit_condition']; ?></td>
                    <td><?php echo $row['inside_appearance']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['i_tolerance_plus']; ?></td>
                    <td><?php echo $row['i_tolerance_minus']; ?></td>
                    <td><?php echo $row['i_diameter_start']; ?></td>
                    <td><?php echo $row['i_diameter_end']; ?></td>
                    <td><?php echo $row['o_tolerance_plus']; ?></td>
                    <td><?php echo $row['o_tolerance_minus']; ?></td>
                    <td><?php echo $row['o_diameter_start']; ?></td>
                    <td><?php echo $row['o_diameter_end']; ?></td>
                    <td><?php echo $row['w_tolerance_plus']; ?></td>
                    <td><?php echo $row['w_tolerance_minus']; ?></td>
                    <td><?php echo $row['q1_start']; ?></td>
                    <td><?php echo $row['q2_start']; ?></td>
                    <td><?php echo $row['q3_start']; ?></td>
                    <td><?php echo $row['q4_start']; ?></td>
                    <td><?php echo $row['q1_middle']; ?></td>
                    <td><?php echo $row['q2_middle']; ?></td>
                    <td><?php echo $row['q3_middle']; ?></td>
                    <td><?php echo $row['q4_middle']; ?></td>
                    <td><?php echo $row['q1_end']; ?></td>
                    <td><?php echo $row['q2_end']; ?></td>
                    <td><?php echo $row['q3_end']; ?></td>
                    <td><?php echo $row['q4_end']; ?></td>
                    <td><?php echo $row['using_round_bar']; ?></td>
                    <td><?php echo $row['using_bare_hands']; ?></td>
                    <td><?php echo $row['appearance_judgement']; ?></td>
                    <td><?php echo $row['dimension_judgement']; ?></td>
                    <td><?php echo $row['ng_quantity']; ?></td>
                    <td><?php echo $row['defect_type']; ?></td>
                    <td><?php echo $row['confirm_by']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                </tr>
            `;
        <?php endforeach; ?>
    }

    // Call the function to populate the table when the page loads
    window.onload = function() {
        populateTable();
    };
</script>




<?php include 'plugins/footer.php';?>
<?php include 'plugins/js/cot_script.php';?>
<?php include 'plugins/js/load_more_script.php';?>
