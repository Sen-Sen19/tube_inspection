<?php
session_name("tube_inspection");
session_start();

include 'conn.php';

// Check if user is logged in and set the username in JavaScript
if (isset($_SESSION['username'])) {
    $loggedInUser = $_SESSION['username'];
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    var inspectedByInput = document.getElementById("inspected_by");';
    echo '    inspectedByInput.value = "' . $loggedInUser . '";';
    echo '});';
    echo '</script>';
}
?>


<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="border-color: #20c997;"> <!-- Apply the stroke color here -->
            <div class="modal-header" style="background-color:#20c997">
                <h5 class="modal-title" id="addRecordModalLabel" style="color:white">ADD RECORD</h5>
                <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form id="myForm">


                <!----------------------------------------------------------- Start Point ----------------------------------------->
                <h5 class="modal-title" style="color: black; margin-bottom: 30px;"><strong>Start Point</strong></h5>
                <div class="row mb-4">
                    <div class="col-sm-3">
                        <label>Part Name</label>
                        <select id="part_name_dropdown" name="part_name" class="form-control" autocomplete="off" style="margin-bottom: 30px;">   </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Quantity(m)</label>
                        <input type="text" id="part_name_quantity" name="quantity" class="form-control" autocomplete="off" style="margin-bottom: 30px;">
                        </div>
                    <div class="col-sm-3">
                        <label>Time Start</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="start-button input-group-text" style="background-color: #20c997; border-color: #20c997; color: white;">Start</button>
                                </div>
                                <input type="text" id="start_time" name="time_start" class="form-control" autocomplete="off" readonly>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Time End</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="end-button input-group-text" style="background-color: #ff7371; border-color: #ff7371; color: white;">End</button>
                                </div>
                                <input type="text" id="end_time" name="time_end" class="form-control" autocomplete="off" readonly>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Inspected By</label>
                        <input type="text" id="inspected_by" name="inspected_by" class="form-control" autocomplete="off" readonly>
                        </div>
                    <div class="col-sm-3">
        <label>Shift</label>
        <select id="shift_select" name="shift" class="form-control" style="margin-bottom: 30px;">
            <option value="" selected disabled>Choose...</option>
            <option value="Dayshift">Dayshift</option>
            <option value="Night Shift">Night Shift</option>
        </select>
    </div>
                    <div class="col-sm-3">
                        <label>Inspection Date</label>
                        <input type="text" id="inspection_date" name="inspection_date" class="form-control" autocomplete="off"readonly>
                        </div>
                    <div class="col-sm-3">
                        <label>Total Mins</label>
                        <input type="text" id="total_mins" class="form-control" name="total_mins" autocomplete="off" style="margin-bottom: 30px;" readonly>
                    </div>
                </div>

                <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>












                <!-- ---------------------------------------------------------Appearance Inspection--------------------------------------------------- -->
                <h5 class="modal-title" style="color:black ;margin-bottom:30px;"><strong>Appearance Inspection</strong></h5>
                <div class="row mb-4">
                    <div class="col-sm-3">
                        <label>Outside Appearance</label>
                        <select id="outside_appearance" class="form-control" style="margin-bottom:30px">
                            <option value="" selected disabled>Choose...</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Slit Condition</label>
                        <select id="slit_condition" class="form-control" style="margin-bottom:30px">
                            <option value="" selected disabled>Choose...</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Inside Appearance</label>
                        <select id="inside_appearance" class="form-control" style="margin-bottom:30px">
                            <option value="" selected disabled>Choose...</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Color</label>
                        <select id="color_select" class="form-control" style="margin-bottom:30px">
                            <option value="" selected disabled>Choose...</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </div>
                </div>

                <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>

                <!-- Inside and Outside Diameter -->
                <div class="container">
    <div class="row">
        <!-- Inside Diameter Section -->
        <div class="col-6 form-section">
            <h5 class="modal-title" style="margin-bottom:20px;"><strong>Inside Diameter</strong></h5>
            <div class="form-group">
                <label for="tolerance">Tolerance</label>
                <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="tolerance-plus" class="form-control" style="width: 70px; margin-right: 10px;" autocomplete="off" readonly>
                    <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-minus" class="form-control" style="width: 70px;" autocomplete="off" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inside-start">Start</label>
                <input type="text" id="inside-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inside-end">End</label>
                <input type="text" id="inside-end" class="form-control" autocomplete="off">
            </div>
        </div>
        
        <!-- Outside Diameter Section -->
        <div class="col-6 form-section">
            <h5 class="modal-title" style="margin-bottom:20px;"><strong>Outside Diameter</strong></h5>
            <div class="form-group">
                <label for="tolerance">Tolerance</label>
                <div class="d-flex align-items-center">
                    <label for="o-tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="o-tolerance-plus" class="form-control" style="width: 70px; margin-right: 10px;" autocomplete="off" readonly>
                    <label for="o-tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="o-tolerance-minus" class="form-control" style="width: 70px;" autocomplete="off" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="outside-start">Start</label>
                <input type="text" id="outside-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="outside-end">End</label>
                <input type="text" id="outside-end" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    
    <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>
</div>

                <!-- Wall Thickness -->
                <h5 class="modal-title" style="color:black; margin-bottom:30px;"><strong>Wall Thickness</strong></h5>
                <div class="container">
                <div class="row mb-4">
            <div class="col-12 d-flex align-items-center">
                <label for="w-tolerance-plus" class="mr-2">Tolerance +</label>
                <input type="text" id="w-tolerance-plus" class="form-control" style="width: 70px; margin-right: 10px;" autocomplete="off" readonly>
                <label for="w-tolerance-minus" class="mr-2">-</label>
                <input type="text" id="w-tolerance-minus" class="form-control" style="width: 70px;" autocomplete="off" readonly>
            </div>
        </div>








                    <!-- ----------------------------------------- Wall Thickness Questions ----------------------------------------------->
                    <div class="row">
                        <div class="col-4 form-section text-center">
                            <h6>Start</h6>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q1</span>
                                    </div>
                                    <input type="text" id="q1_start" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q2</span>
                                    </div>
                                    <input type="text" id="q2_start" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q3</span>
                                    </div>
                                    <input type="text" id="q3_start" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q4</span>
                                    </div>
                                    <input type="text" id="q4_start" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-4 form-section text-center">
                            <h6>Middle</h6>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q1</span>
                                    </div>
                                    <input type="text" id="q1_middle" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q2</span>
                                    </div>
                                    <input type="text" id="q2_middle" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q3</span>
                                    </div>
                                    <input type="text" id="q3_middle" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q4</span>
                                    </div>
                                    <input type="text" id="q4_middle" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-4 form-section text-center">
                            <h6>End</h6>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q1</span>
                                    </div>
                                    <input type="text" id="q1_end" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q2</span>
                                    </div>
                                    <input type="text" id="q2_end" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q3</span>
                                    </div>
                                    <input type="text" id="q3_end" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light">Q4</span>
                                    </div>
                                    <input type="text" id="q4_end" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>








                <!-- -----------------------------------------------------------Tube Breaking ------------------------------------------------------------>
                <h5 class="modal-title" style="color:black ;margin-bottom:30px;"><strong>Tube Breaking</strong></h5>
                <div class="container">
                    <div class="row">
                        <div class="col-6 form-section">
                            <div class="col-sm-6">
                                <label>Using Round Bar</label>
                                <select id="using_round_bar" class="form-control" style="margin-bottom:30px">
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label>Appearance Judgment</label>
                                <select id="appearance_judgment" class="form-control" style="margin-bottom:20px">
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label>Dimension Judgment</label>
                                <select id="dimension_judgment" class="form-control" style="margin-bottom:10px">
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ng_quantity">NG Quantity</label>
                                <input type="text" id="ng_quantity" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-6 form-section">
                            <div class="col-sm-6">
                                <label>Using Bare Hands</label>
                                <select id="using_bare_hands" class="form-control" style="margin-bottom:30px">
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defect_type">Defect Type</label>
                                <input type="text" id="defect_type" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="confirm_by">Confirm By</label>
                                <input type="text" id="confirm_by" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <input type="text" id="remarks" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add this div where you want the notice to appear -->
<div id="notice" style="display: none;"></div>


                <!-- Footer Buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger float-right">Clear</button>
                    <button type="button" id="saveButton" class="btn btn-success float-right" style="width: 150px; background-color: #20c997; border-color: #20c997; color: white;" onclick="saveData()">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>

</form>