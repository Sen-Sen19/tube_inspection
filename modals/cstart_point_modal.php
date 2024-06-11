

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



                <!-- START POINT -->


            <h5 class="modal-title" id="addRecordModalLabel" style="color:black ;margin-bottom:30px;" ><strong>Start Point</strong> </h5>
 

            <div class="row mb-4">

            <div class="col-sm-3">
                  <label>Part Name</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"  style="margin-bottom:30px">
                </div>
                <div class="col-sm-3">
                  <label>Quantity(m)</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
                </div>
                <div class="col-sm-3">
                  <label>Time Start</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
                </div>
                <div class="col-sm-3">
                  <label>Time End</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
                </div>




                <div class="col-sm-3">
                  <label>Inspected By</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
                </div>

                <div class="col-sm-3">
    <label>Shift</label>
    <select id="employee_no_search" class="form-control" style="margin-bottom:30px">
        <option value="" selected disabled>Choose...</option>
        <option value="OK">Dayshift</option>
        <option value="NG">Night Shift</option>
    </select>
</div>

                <div class="col-sm-3">
                  <label>Inspection Date</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
                </div>

                <div class="col-sm-3">
                  <label>Total Mins</label>
                  <input type="text" id="employee_no_search" class="form-control" autocomplete="off"style="margin-bottom:30px">
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
                    <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off">
                    <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off">
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

        <div class="col-6 form-section">
            <h5 class="modal-title" style="margin-bottom:20px;"><strong>Outside Diameter</strong></h5>



            <div class="form-group">
                <label for="tolerance">Tolerance</label>
                <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off">
                    <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off">
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
            <label for="tolerance-plus" class="mr-2">Tolerance +</label>
            <input type="text" id="tolerance-plus" class="form-control" style="width: 50px; margin-right: 10px;" autocomplete="off">
            <label for="tolerance-minus" class="mr-2">Tolerance -</label>
            <input type="text" id="tolerance-minus" class="form-control" style="width: 50px;" autocomplete="off">
        </div>
    </div>

    <!-- Grid Layout for Questions -->
    <div class="row">
        <div class="col-4 form-section">
            <div class="form-group">
                <label for="q1-start">Q1</label>
                <input type="text" id="q1-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q2-start">Q2</label>
                <input type="text" id="q2-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q3-start">Q3</label>
                <input type="text" id="q3-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q4-start">Q4</label>
                <input type="text" id="q4-start" class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="col-4 form-section">
            <div class="form-group">
                <label for="q1-middle">Q1</label>
                <input type="text" id="q1-middle" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q2-middle">Q2</label>
                <input type="text" id="q2-middle" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q3-middle">Q3</label>
                <input type="text" id="q3-middle" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q4-middle">Q4</label>
                <input type="text" id="q4-middle" class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="col-4 form-section">
            <div class="form-group">
                <label for="q1-end">Q1</label>
                <input type="text" id="q1-end" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q2-end">Q2</label>
                <input type="text" id="q2-end" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q3-end">Q3</label>
                <input type="text" id="q3-end" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="q4-end">Q4</label>
                <input type="text" id="q4-end" class="form-control" autocomplete="off">
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

            <div class="form-group">
                <label for="inside-start">Appearance Judgement</label>
                <input type="text" id="inside-start" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inside-end">Dimension judgement</label>
                <input type="text" id="inside-end" class="form-control" autocomplete="off">
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
            <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success        ">Save changes</button>
            </div>
        </div>
    </div>
</div>
