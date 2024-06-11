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
                                    <button class="btn btn-block btn-success" id="openModalBtn" data-toggle="modal" data-target="#addRecordModal">
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
                            <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #000; margin: 20px 0;"></div>
                            <div id="accounts_table_res" class="table-responsive" style="height: 200px; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="accounts_table" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>#</th>
                                            <th>Employee No.</th>
                                            <th>Username</th><!DOCTYPE html>
                                            <th>Full Name</th>
                                            <th>Section</th>
                                            <th>User Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_of_accounts" style="text-align: center;">
                                        <tr>
                                            <td colspan="6" style="text-align:center;">
                                                <div class="spinner-border text-dark" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </td>
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

<?php include 'plugins/footer.php';?>
<?php include 'plugins/js/load_more_script.php';?>

<script>
    document.getElementById("openModalBtn").addEventListener("click", function() {
     
    });
</script>