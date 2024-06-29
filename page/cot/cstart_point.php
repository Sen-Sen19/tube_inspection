<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/cot_bar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Start Point</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-play-circle"></i> Start Point
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label>Part Name</label>
                                    <input type="text" class="form-control" placeholder="Part Name">
                                </div>
                                <div class="col-sm-4">
                                    <label>Inspected By</label>
                                    <input type="text" class="form-control" placeholder="Inspected By">
                                </div>
                                <div class="col-sm-4">
                                    <label>Defect Type</label>
                                    <input type="text" class="form-control" placeholder="Defect Type">
                                </div>
                               
                            </div>


                            <div class="row mt-4">
    <div class="col-6 col-sm-4">
        <!-- Date From -->
        <label style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date From</label>
        <input type="date" name="date_from" class="form-control form-control-sm" id="date_from_search_defect">
    </div>
    <div class="col-6 col-sm-4">
        <!-- Date To -->
        <label style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date To</label>
        <input type="date" name="date_to" class="form-control form-control-sm" id="date_to_search_defect">
    </div>

    <div class="col-6 col-sm-4 ">
    <label style="font-weight:normal;margin:0;padding:0;color:#000; visibility: hidden !important;">Search</label>
    <button class="btn btn-primary btn-block btn-sm" id="searchbtn" style="margin-bottom:30px">
            <i class="fas fa-search mr-2"></i>Search
        </button>
    </div>

    <div class="col-6 col-sm-4 ">
        <!-- Refresh Button -->
        <button class="btn btn-info btn-block btn-sm" id="refreshPageBtn" onclick="refreshPage()">
            <i class="fas fa-sync-alt mr-2"></i>Refresh
        </button>
    </div>
    <div class="col-6 col-sm-4 ">
        <!-- Export Button -->
        <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn">
            <i class="fas fa-file-export mr-2"></i>Export
        </button>
    </div>
    <div class="col-6 col-sm-4 ">
        <!-- Add Record Button -->
        <button class="btn btn-success btn-block btn-sm" style="background-color: #20c997; border-color: #20c997; color:white;" id="openModalBtn" data-toggle="modal" data-target="#addRecordModal">
            <i class="fas fa-plus mr-2"></i>Add Record
        </button>
    </div>
</div>



                            <div id="accounts_table_res" class="table-responsive" style="height: 45vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="sp_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <!-- Table Headers -->
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
                                    <tbody id="sp_cotdb_body" style="text-align: center; padding:20px;">
                                        <!-- Data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-sm-center mt-3">
                                <button type="button" class="btn bg-gray-dark" id="btnLoadMore">Load more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'plugins/sp_footer.php'; ?>
<?php include 'plugins/js/cot_sp_script.php'; ?>
