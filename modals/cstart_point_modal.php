

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






















                <!-- ---------------------------------------------------------START POINT ------------------------------------------------------------------------------------------------->


                <h5 class="modal-title" id="addRecordModalLabel" style="color: black; margin-bottom: 30px;"><strong>Start Point</strong></h5>

<div class="row mb-4">
    <div class="col-sm-3">
        <label>Part Name</label>
        <select id="part_name_dropdown" class="form-control" style="margin-bottom: 30px;"></select>
    </div>

    <div class="col-sm-3">
        <label>Quantity(m)</label>
        <input type="text" id="employee_no_search" class="form-control" autocomplete="off" style="margin-bottom: 30px;">
    </div>


        <div class="col-sm-3">
            <label>Time Start</label>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="start-button input-group-text" style="background-color: #20c997; border-color: #20c997; color: white;">Start</button>
                    </div>
                    <input type="text" id="start_time" class="form-control" autocomplete="off" disabled>
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
                    <input type="text" id="end_time" class="form-control" autocomplete="off" disabled>
                </div>
            </div>
        </div>


    <div class="col-sm-3">
        <label>Inspected By</label>
        <input type="text" id="employee_no_search" class="form-control" autocomplete="off" value="COT Admin" disabled style="margin-bottom: 30px;">
    </div>

    <div class="col-sm-3">
        <label>Shift</label>
        <select id="employee_no_search" class="form-control" style="margin-bottom: 30px;">
            <option value="" selected disabled>Choose...</option>
            <option value="OK">Dayshift</option>
            <option value="NG">Night Shift</option>
        </select>
    </div>

    <div class="col-sm-3">
        <label>Inspection Date</label>
        <input type="text" id="inspection_date" class="form-control" autocomplete="off" style="margin-bottom: 30px;">
    </div>

    <div class="col-sm-3">
            <label>Total Mins</label>
            <input type="text" id="total_mins" class="form-control" autocomplete="off" style="margin-bottom: 30px;" disabled>
        </div>
</div>

<div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>

           
           
 










<!-- --------------------------------------------------------------------APPEARANCE INSPECTION--------------------------------------------------------------------------------- -->





  <h5 class="modal-title" id="addRecordModalLabel" style="color:black ;margin-bottom:30px;" ><strong>Appearance Inspection</strong> </h5>
 

 <div class="row mb-4">

 <div class="col-sm-3">
    <label>Outside Appearance</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>

<div class="col-sm-3">
    <label>Slit Condition</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>

<div class="col-sm-3">
    <label>Inside Appearance</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>

<div class="col-sm-3">
    <label>Color</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>





  <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>

























 <!-- ------------------------------------------------------------INSIDE AND OUTSIDE DIAMETER ----------------------------------------------------------------------->

  <div class="container">
    <div class="row">
        <div class="col-6 form-section">
            <h5 class="modal-title" style="margin-bottom:20px;"><strong>Inside Diameter</strong></h5>
            
            <div class="form-group">
                <label for="tolerance">Tolerance</label>
                <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off"readonly>
                    <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off"readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="inside-start">Start</label>
                <input type="text" id="inside-start" class="form-control" autocomplete="off" >
            </div>
            <div class="form-group">
                <label for="inside-end">End</label>
                <input type="text" id="inside-end" class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="col-6 form-section">
            <h5 class="modal-title" style="margin-bottom:20px;"><strong>Outside Diameter</strong></h5>



            <div class="form-group">
                <label for="tolerance">Tolerance</label>
                <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off"readonly>
                    <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off"readonly>
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
</div>

<div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>























<!-- ------------------------------------------------------------WALL THICKNESS ----------------------------------------------------------------------->

<h5 class="modal-title" id="addRecordModalLabel" style="color:black; margin-bottom:30px;">
    <strong>Wall Thickness</strong>
</h5>

<div class="container">
    <!-- Tolerance Inputs -->
    <div class="row mb-4">
        <div class="col-12 d-flex align-items-center">
            <label for="tolerance-plus" class="mr-2">Tolerance    +</label>
            <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off"readonly>
            <label for="tolerance-minus" class="mr-2">-</label>
            <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off"readonly>
        </div>
    </div>

    <!-- Grid Layout for Questions -->
    <div class="row">
        <div class="col-4 form-section text-center"> <!-- Added text-center class -->
            <h6>Start</h6>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q1</span>
                    </div>
                    <input type="text" id="q1-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="text" id="q2-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="text" id="q3-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="text" id="q4-start" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="col-4 form-section text-center"> <!-- Added text-center class -->
            <h6>Middle</h6>
            <div class="form-group">
            <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q1</span>
                    </div>
                    <input type="text" id="q1-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="text" id="q2-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="text" id="q3-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="text" id="q4-start" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="col-4 form-section text-center"> <!-- Added text-center class -->
            <h6>End</h6>
            <div class="form-group">
            <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q1</span>
                    </div>
                    <input type="text" id="q1-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="text" id="q2-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="text" id="q3-start" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="text" id="q4-start" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 20px 0;"></div>














 <!-- ---------------------------------------------------------------------------TUBE BREAKING ----------------------------------------------------------------------------------------------------------------->


<h5 class="modal-title" id="addRecordModalLabel" style="color:black ;margin-bottom:30px;" ><strong>Tube Breaking</strong> </h5>



<div class="container">
    <div class="row">
        <div class="col-6 form-section">
            
        <div class="col-sm-6">
    <label>Using Round Bar</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>

<div class="col-sm-12">
    <label>Appearance Judgement</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:20px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>
<div class="col-sm-12">
    <label>Dimension judgement</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:10px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>



            <div class="form-group">
                <label for="inside-end">NG Quantity</label>
                <input type="text" id="inside-end" class="form-control" autocomplete="off">
            </div>
        </div>
        




        <div class="col-6 form-section">



        <div class="col-sm-6">
    <label>Using Bare Hands</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">OK</option>
        <option value="NG">NG</option>
    </select>
</div>


            <div class="form-group">
                
                <label for="outside-start">Defect Type</label>
                <input type="text" id="outside-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="outside-end">Confirm By</label>
                <input type="text" id="outside-end" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="outside-end">Remarks</label>
                <input type="text" id="outside-end" class="form-control" autocomplete="off">
            </div>
            
        </div>
    </div>
</div>

             






























<!-- ----------------------------------------------------------------Footer-------------------------------------------------------------------- -->


            </div>
            <div class="modal-footer">
    <button type="button" class="btn btn-danger float-right">Clear</button>
    <button type="button" class="btn btn-success float-right" style="width: 150px; background-color: #20c997; border-color: #20c997; color: white;">Save</button>
</div>

        </div>
    </div>
</div>
