<style>
  .is-invalid {
    border-color: #dc3545;
    /* Red color for invalid input */
  }

  .disabled-input {
    background-color: #e9ecef;
    cursor: not-allowed;
  }

  .sticky-note {
  position: absolute;
  top:29%;
  left: 51%;
  width: 420px;
  height: 60px;
  background-color: #fffa9e;
  border: 1px solid #ddd;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
  padding: 10px;
  display: none; /* Initially hidden */
  z-index: 1050;
}

</style>
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content" style="border-color: #20c997;"> <!-- Apply the stroke color here -->
      <div class="modal-header" style="background-color:#20c997">
        <h5 class="fas fa-plus mr-2" id="addRecordModalLabel" style="color:white"> ADD RECORD</h5>
        <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myForm">
          <!----------------------------------------------------------- Start Point ----------------------------------------->
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <h5 class="modal-title" style="color: black; margin-bottom: 15px;">
              <strong>Plastic Tube Inspection</strong>
            </h5>
            <div class="radio-buttons" style="display: flex; gap: 50px;">
              <label class="radio-inline">
                <input type="radio" id="sp" name="processType" value="SP"> SP
              </label>
              <label class="radio-inline">
                <input type="radio" id="mp" name="processType" value="MP"> MP
              </label>
              <label class="radio-inline">
                <input type="radio" id="ep" name="processType" value="EP"> EP
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label>Part Name</label>
              <select id="part_name_dropdown" name="part_name" class="form-control" autocomplete="off" >
              </select>
            </div>
            <div class="col-sm-3">
              <label>Quantity(m)</label>
              <input type="number" id="part_name_quantity" name="quantity" class="form-control" autocomplete="off" >
            </div>
            <div class="col-sm-3">
              <label>Time Start</label>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="button" class="start-button input-group-text"
                      style="background-color: #20c997; border-color: #20c997; color: white;">Start</button>
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
                    <button type="button" class="end-button input-group-text"
                      style="background-color: #ff7371; border-color: #ff7371; color: white;">End</button>
                  </div>
                  <input type="text" id="end_time" name="time_end" class="form-control" autocomplete="off" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label>Inspected By</label>
              <input type="text" id="inspected_by" name="inspected_by" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-sm-3">
              <label>Shift</label>
              <input type="text" id="shift_select" name="shift" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-sm-3">
              <label>Inspection Date</label>
              <input type="text" id="inspection_date" name="inspection_date" class="form-control" autocomplete="off"
                readonly>
            </div>
            <div class="col-sm-3">
              <label>Total Mins</label>
              <input type="text" id="total_mins" class="form-control" name="total_mins" autocomplete="off"
                style="margin-bottom: 30px;" readonly>
            </div>
          </div>
          <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997;"></div>
          <!-- ---------------------------------------------------------Appearance Inspection--------------------------------------------------- -->
          <h5 class="modal-title" style="color:black;margin-top: 15px;margin-bottom:15px;"><strong>Appearance
              Inspection</strong></h5>
          <div class="row mb-4">
            <div class="col-sm-3">
              <label>Outside Appearance</label>
              <select id="outside_appearance" class="form-control" name="outside_appearance">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              </select>
            </div>
            <div class="col-sm-3">
              <label>Slit Condition</label>
              <select id="slit_condition" class="form-control" name="slit_condition">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
                <option value="N/A">N/A</option>
              </select>
            </div>
            <div class="col-sm-3">
              <label>Inside Appearance</label>
              <select id="inside_appearance" class="form-control" name="inside_appearance">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              </select>
            </div>
            <div class="col-sm-3">
              <label>Color</label>
              <select id="color_select" class="form-control" name="color">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              </select>
            </div>
          </div>
          <!-- ------------------------------------------------------------Inside and Outside Diameter---------------------------------------------------------------------------- -->
          <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997;"></div>

          <div class="container">
            <h5 class="modal-title" style="margin-top: 15px;margin-bottom:15px;"><strong>Inside
                Diameter</strong>
            </h5>
            <div class="row">

              <div class="col-3 form-section">
                <div class="form-group">
                  <label for="tolerance">Tolerance</label>
                  <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="text" id="tolerance-minus" class="form-control"
                      style="min-width: 105px; margin-right: 10px;" autocomplete="off" readonly
                      name="i_tolerance_minus"> <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="text" id="tolerance-plus" class="form-control" style="min-width: 105px;"
                      autocomplete="off" readonly name="i_tolerance_plus">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="tolerance">Min and Max</label>
                  <div class="d-flex align-items-left">
                    <label for="i-diamin"></label>
                    <input type="text" id="i-diameter-min" class="mr-3 form-control" style="min-width: 115px;"
                      autocomplete="off" readonly name="i_dia_min">
                    <label for="i-diamax"></label>
                    <input type="text" id="i-diameter-max" class="form-control" style="min-width: 115px;"
                      autocomplete="off" readonly name="i_dia_max">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inside-start">Start</label>
                  <input type="number" id="inside-start" class="form-control" name="i_diameter_start"
                    autocomplete="off">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inside-end">End</label>
                  <input type="number" id="inside-end" class="form-control" name="i_diameter_end" autocomplete="off">
                </div>
              </div>
            </div>

            <h5 class="modal-title" style="margin-top: 15px;margin-bottom:15px;"><strong>Outside
                Diameter</strong>
            </h5>
            <div class="row mb-2">
              <!-- Outside Diameter Section -->
              <div class="col-3 form-section">
                <div class="form-group">
                  <label for="tolerance">Tolerance</label>
                  <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="number" id="o-tolerance-minus" class="form-control"
                      style="min-width: 105px; margin-right: 10px;" autocomplete="off" readonly
                      name="o_tolerance_minus"> <label for="tolerance-minus" class="mr-2">-</label>

                    <input type="number" id="o-tolerance-plus" class="form-control" style="min-width: 105px;"
                      autocomplete="off" readonly name="o_tolerance_plus">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="tolerance">Min and Max</label>
                  <div class="d-flex align-items-left">
                    <label for="o-diamin"></label>
                    <input type="number" id="o-diameter-min" class="mr-3 form-control" style="min-width: 115px;"
                      autocomplete="off" readonly name="o_dia_min">

                    <label for="o-diamax"></label>
                    <input type="number" id="o-diameter-max" class="form-control" style="min-width: 115px;"
                      autocomplete="off" readonly name="o_dia_max">
                  </div>
                </div>
              </div>
              <div class="col-3">
               <div class="form-group">
  <label for="outside-start">Start</label>
  <div class="input-group">
    <input type="text" id="outside-start" class="form-control" name="o_diameter_start" autocomplete="off">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" onclick="setNA('outside-start')">N/A</button>
    </div>
  </div>

                </div>
              </div>
            <div class="col-3">
  <div class="form-group">
    <label for="outside-end">End</label>
    <div class="input-group">
      <input type="text" id="outside-end" class="form-control" name="o_diameter_end" autocomplete="off">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" onclick="setNA('outside-end')">N/A</button>
      </div>
    </div>
  </div>
</div>

            <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997;"></div>
            <!-- ----------------------------------------- Wall Thickness Questions ----------------------------------------------->
            <h5 class="modal-title" style="color:black; margin-bottom:15px;margin-top:15px;"><strong>Wall
                Thickness</strong>
            </h5>
            <div class="row mb-4">
              <div class="col-6 form-section">
                <div class="form-group">
                  <label for="tolerance">Tolerance</label>
                  <div class="d-flex align-items-center">
                    <label for="tolerance-plus" class="mr-2">+</label>
                    <input type="number" id="w-tolerance-plus" class="form-control"
                      style="min-width: 105px; margin-right: 10px;" autocomplete="off" readonly
                      name="o_tolerance_minus"> <label for="tolerance-minus" class="mr-2">-</label>
                    <input type="number" id="w-tolerance-minus" class="form-control" style="min-width: 105px;"
                      autocomplete="off" readonly>
                  </div>
                </div>
              </div>
              <div class="col-2">
                <label for="w-tolerance-plus">Min</label>
                <input type="text" id="w-min" class="form-control" style="min-width: 70px; autocomplete=" off" readonly
                  name="w_tolerance_minus">
              </div>
              <div class="col-2">
                <label for="w-tolerance-minus">Avg</label>
                <input type="text" id="w-value" class="form-control" style="min-width: 70px;" autocomplete="off"
                  readonly name="w_tolerance_plus">
              </div>
              <div class="col-2">
                <label for="w-tolerance-minus">Max</label>
                <input type="text" id="w-max" class="form-control" style="min-width: 70px;" autocomplete="off" readonly
                  name="w_tolerance_plus">
              </div>
            </div>
            <div class="container">


            
    <div class="row">
    <div class="col-4 form-section text-center">
  <h6>Start 
  <button type="button" class="btn btn-light btn-sm ml-2" style="color: black; border: 1px solid #333; margin-top: -3px;" onclick="start()">N/A</button>
  </h6>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">Q1</span>
      </div>
      <input type="text" id="q1_start" class="form-control" autocomplete="off" name="q1_start" oninput="validateInput(this)" placeholder=" ">
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">Q2</span>
      </div>
      <input type="text" id="q2_start" class="form-control" autocomplete="off" name="q2_start" oninput="validateInput(this)" placeholder=" ">
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">Q3</span>
      </div>
      <input type="text" id="q3_start" class="form-control" autocomplete="off" name="q3_start" oninput="validateInput(this)" placeholder=" ">
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">Q4</span>
      </div>
      <input type="text" id="q4_start" class="form-control" autocomplete="off" name="q4_start" oninput="validateInput(this)" placeholder=" ">
    </div>
  </div>
</div>



      <div class="col-4 form-section text-center">
        <h6>Middle  
          <button type="button" class="btn btn-light btn-sm ml-2" style="color: black; border: 1px solid #333; margin-top: -3px;" onclick="middle()">N/A</button>
        </h6>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q1</span>
            </div>
            <input type="text" id="q1_middle" class="form-control" autocomplete="off" name="q1_middle" oninput="validateInput(this)" placeholder=" ">
        
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q2</span>
            </div>
            <input type="text" id="q2_middle" class="form-control" autocomplete="off" name="q2_middle" oninput="validateInput(this)" placeholder=" ">
         
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q3</span>
            </div>
            <input type="text" id="q3_middle" class="form-control" autocomplete="off" name="q3_middle" oninput="validateInput(this)" placeholder=" ">
          
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q4</span>
            </div>
            <input type="text" id="q4_middle" class="form-control" autocomplete="off" name="q4_middle" oninput="validateInput(this)" placeholder=" ">
         
          </div>
        </div>
      </div>

      <div class="col-4 form-section text-center">
        <h6>End  <button type="button" class="btn btn-light btn-sm ml-2" style="color: black; border: 1px solid #333; margin-top: -3px;" onclick="end()">N/A</button>
        </h6>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q1</span>
            </div>
            <input type="text" id="q1_end" class="form-control" autocomplete="off" name="q1_end" oninput="validateInput(this)" placeholder=" ">
           
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q2</span>
            </div>
            <input type="text" id="q2_end" class="form-control" autocomplete="off" name="q2_end" oninput="validateInput(this)" placeholder=" ">
          
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q3</span>
            </div>
            <input type="text" id="q3_end" class="form-control" autocomplete="off" name="q3_end" oninput="validateInput(this)" placeholder=" ">
           
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-light">Q4</span>
            </div>
            <input type="text" id="q4_end" class="form-control" autocomplete="off" name="q4_end" oninput="validateInput(this)" placeholder=" ">
          
                </div>
              </div>
            </div>
          </div>
          <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 15px 0;">
          </div>
          <!------------------------------------------------------Barcode---------------------------------------------------------- -->
     <div class="form-group">
  <div class="row">
    <div class="col-6">
      <label for="serial_no">Serial No.</label>
      <div class="input-group">
        <input type="text" id="serial_no" class="form-control" name="serial_no" autocomplete="off">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" onclick="setNA('serial_no')">N/A</button>
        </div>
      </div>
    </div>
    <div class="col-6">
      <label for="lot_no">Lot No.</label>
      <div class="input-group">
        <input type="text" id="lot_no" class="form-control" name="lot_no" autocomplete="off">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" onclick="setNA('lot_no')">N/A</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 15px 0;"></div>

          <!-- -----------------------------------------------------------Tube Breaking ------------------------------------------------------------>
          <h5 class="modal-title" style="color:black ;margin-bottom:15px;"><strong>Tube Breaking</strong></h5>
          <div class="row mb-3">
            <div class="col-3">
              <label>Using Round Bar</label>
              <select id="using_round_bar" class="form-control" name="using_round_bar">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
                <option value="N/A">N/A</option>
              </select>
            </div>
            <div class="col-3">
              <label>Using Bare Hands</label>
              <select id="using_bare_hands" class="form-control" name="using_bare_hands">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
                <option value="N/A">N/A</option>
              </select>
            </div>
            <div class="col-3">
              <label>Appearance Judgment</label>
              <select id="appearance_judgment" class="form-control" name="appearance_judgement">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              </select>
            </div>
            <div class="col-3">
              <label>Dimension Judgment</label>
              <select id="dimension_judgment" class="form-control" name="dimension_judgement">
                <option value="" selected disabled>Choose...</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <form id="defectForm" onsubmit="return handleFormSubmit(event)">
                <label>Defect type</label>
                <div id="defect-container">
                  <select id="defect_type" class="form-control" name="defect_type" onchange="handleDefectTypeChange()">
                    <option value="" selected disabled>Choose...</option>
                    <option value="N/A">N/A</option>
                    <option value="Round crest">Round crest</option>
                    <option value="Damage">Damage</option>
                    <option value="Molding defect">Molding defect</option>
                    <option value="Excess burr">Excess burr</option>
                    <option value="Dent">Dent</option>
                    <option value="Misaligned joint portion">Misaligned joint portion</option>
                    <option value="Foreign material">Foreign material</option>
                    <option value="Slit position is on joint portion">Slit position is on joint portion</option>
                    <option value="With gap on slit">With gap on slit</option>
                    <option value="Crack">Crack</option>
                    <option value="Overlap">Overlap</option>
                    <option value="Slit is uneven">Slit is uneven</option>
                    <option value="Slanted slit">Slanted slit</option>
                    <option value="Unstable thickness">Unstable thickness</option>
                    <option value="Tubebreaking on slit portion">Tubebreaking on slit portion</option>
                    <option value="Hole">Hole</option>
                    <option value="Scratch">Scratch</option>
                    <option value="Deformed">Deformed</option>
                    <option value="Rough surface">Rough surface</option>
                    <option value="Bubbles on surface">Bubbles on surface</option>
                    <option value="Unstable thickness">Unstable thickness</option>
                    <option value="Big Diameter">Big Diameter</option>
                    <option value="Small Diameter">Small Diameter</option>
                    <option value="Wrinkled on surface">Wrinkled on surface</option>
                    <option value="Out of Tolerance">Out of Tolerance</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="col-3">
              <label for="ng_quantity">NG Quantity</label>
              <input type="number" id="ng_quantity" class="form-control" name="ng_quantity" autocomplete="off">
            </div>
            <div class="col-3">
              <label for="confirm_by">Confirm By</label>
              <div class="input-group">
  <input type="text" id="confirm_by" class="form-control" name="confirm_by" autocomplete="off">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="setNA('confirm_by')">N/A</button>
  </div>
</div>

            </div>
            <div class="col-3">
    <label for="remarks">Remarks</label>
    <div class="input-group">
        <input type="text" id="remarks" class="form-control" name="remarks" autocomplete="off">
        <div class="input-group-append">
            <button type="button" class="btn btn-light btn-sm" style="color: black; border: 1px solid #333;" onclick="remarksb()">100% INSP</button>
        </div>
    </div>
</div>

          </div>
          <div id="notice" style="display: none;"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger float-right">Clear</button>
            <button type="button" id="saveButton" class="btn btn-success float-right"
              style="width: 150px; background-color: #20c997; border-color: #20c997; color: white;"
              onclick="saveData()">Save</button>
          </div>
      </div>
    </div>
  </div>
</div>
<div id="stickyNote" class="sticky-note">
  <p>For Partname VO26X1(B), VO28X1(B), VO30X1(B), VO34X1(B)

    <strong>1</strong> = Small,  &nbsp;&nbsp;&nbsp;
    <strong>2</strong> = Medium, &nbsp;&nbsp;&nbsp;
    <strong>3</strong> = Large
    </p>
</div>

</form>



<!-- <script>
  document.getElementById('part_name_dropdown').addEventListener('change', function () {
    const partName = this.value;
    const disabledValues = [
      'VO10X0.5(B)', 'VO10X1(B)', 'VO12X0.5(B)', 'VO12X1(B)',
      'VO14X0.5(B)', 'VO14X1(B)', 'VO16X0.6(B)', 'VO16X1(B)',
      'VO18X0.6(B)', 'VO18X1(B)', 'VO20X0.6(B)', 'VO20X1(B)',
      'VO22X1(B)', 'VO24X1(B)', 'VO4X0.5(B)', 'VO4X1(B)',
      'VO6X0.5(B)', 'VO6X1(B)', 'VO8X0.5(B)', 'VO8X1(B)'
    ];

    const enablePartNames = [
     'NCOT13', 'NCOT13-NC', 'NCOT15', 'NCOT19', 'RCOT13', 'RCOT15', 'RCOT19'
    ];

    const slitCondition = document.getElementById('slit_condition');
    const usingRoundBar = document.getElementById('using_round_bar');
    const usingBareHands = document.getElementById('using_bare_hands');
    const oDiameterStart = document.getElementById('outside-start');
    const oDiameterEnd = document.getElementById('outside-end');
    const oDiameterMin = document.getElementById('o-diameter-min');
    const oDiameterMax = document.getElementById('o-diameter-max');
    const q1Start = document.getElementById('q1_start');
    const q2Start = document.getElementById('q2_start');
    const q3Start = document.getElementById('q3_start');
    const q4Start = document.getElementById('q4_start');

    if (disabledValues.includes(partName)) {
      slitCondition.disabled = true;
      usingRoundBar.disabled = true;
      usingBareHands.disabled = true;
      slitCondition.value = 'N/A';
      usingRoundBar.value = 'N/A';
      usingBareHands.value = 'N/A';

      oDiameterStart.readOnly = true;
      oDiameterEnd.readOnly = true;
      oDiameterStart.value = 'N/A';
      oDiameterEnd.value = 'N/A';
      oDiameterMin.value = 'N/A';
      oDiameterMax.value = 'N/A';

      // q1Start.disabled = false;

    } else {
      slitCondition.disabled = false;
      usingRoundBar.disabled = false;
      usingBareHands.disabled = false;
      oDiameterStart.readOnly = false;
      oDiameterEnd.readOnly = false;
      slitCondition.value = '';
      usingRoundBar.value = '';
      usingBareHands.value = '';
      oDiameterStart.value = '';
      oDiameterEnd.value = '';
      oDiameterMin.value = '';
      oDiameterMax.value = '';

      if (disabledValues.includes(partName)) {
        q1Start.readOnly = true;
        q2Start.readOnly = true;
        q3Start.readOnly = true;
        q4Start.readOnly = true;
      } else {
      
        q1Start.readOnly = false;
        q2Start.readOnly = false;
        q3Start.readOnly = false;
        q4Start.readOnly = false;
      }

    
      if (enablePartNames.includes(partName)) {
        q1Start.readOnly = false;
        q2Start.readOnly = false;
        q3Start.readOnly = false;
        q4Start.readOnly = false;
      } else {

        q1Start.readOnly = true;
        q2Start.readOnly = true;
        q3Start.readOnly = true;
        q4Start.readOnly = true;
      }
    }
  });

  function handleRadioChange() {
    const spRadio = document.getElementById('sp');
    const mpRadio = document.getElementById('mp');
    const epRadio = document.getElementById('ep');
    const serialNoInput = document.getElementById('serial_no');
    const lotNoInput = document.getElementById('lot_no');
    const q1Middle = document.getElementById('q1_middle');
    const q2Middle = document.getElementById('q2_middle');
    const q3Middle = document.getElementById('q3_middle');
    const q4Middle = document.getElementById('q4_middle');
    const q1Start = document.getElementById('q1_start');
    const q2Start = document.getElementById('q2_start');
    const q3Start = document.getElementById('q3_start');
    const q4Start = document.getElementById('q4_start');

    const part_name = document.getElementById('part_name_dropdown');
    const quantity = document.getElementById('part_name_quantity');

    if (spRadio.checked) {
      part_name.disabled = false;
      quantity.disabled = false;

      serialNoInput.value = 'N/A';
      lotNoInput.value = 'N/A';
      serialNoInput.readOnly = true;
      lotNoInput.readOnly = true;

      q1Middle.disabled = false;
      q2Middle.disabled = false;
      q3Middle.disabled = false;
      q4Middle.disabled = false;

     
      q1Start.readOnly = false;
      q2Start.readOnly = false;
      q3Start.readOnly = false;
      q4Start.readOnly = false;

      

    } else if (epRadio.checked) {
      part_name.disabled = false;
      quantity.disabled = false;

      serialNoInput.value = 'N/A';
      lotNoInput.value = 'N/A';
      serialNoInput.readOnly = true;
      lotNoInput.readOnly = true;

      q1Middle.value = 'N/A';
      q2Middle.value = 'N/A';
      q3Middle.value = 'N/A';
      q4Middle.value = 'N/A';
      q1Middle.disabled = true;
      q2Middle.disabled = true;
      q3Middle.disabled = true;
      q4Middle.disabled = true;

    } else if (mpRadio.checked) {
      part_name.disabled = false;
      quantity.disabled = false;
   
      serialNoInput.value = '';
      lotNoInput.value = '';
      serialNoInput.readOnly = false;
      lotNoInput.readOnly = false;

      q1Middle.value = 'N/A';
      q2Middle.value = 'N/A';
      q3Middle.value = 'N/A';
      q4Middle.value = 'N/A';
      q1Middle.disabled = true;
      q2Middle.disabled = true;
      q3Middle.disabled = true;
      q4Middle.disabled = true;

      
      q1Start.readOnly = true;
      q2Start.readOnly = true;
      q3Start.readOnly = true;
      q4Start.readOnly = true;
      q1Start.value = 'N/A';
      q2Start.value = 'N/A';
      q3Start.value = 'N/A';
      q4Start.value = 'N/A';

    } else {
      serialNoInput.value = '';
      lotNoInput.value = '';
      serialNoInput.readOnly = false;
      lotNoInput.readOnly = false;

      q1Middle.value = '';
      q2Middle.value = '';
      q3Middle.value = '';
      q4Middle.value = '';
      q1Middle.disabled = false;
      q2Middle.disabled = false;
      q3Middle.disabled = false;
      q4Middle.disabled = false;

    
      q1Start.readOnly = false;
      q2Start.readOnly = false;
      q3Start.readOnly = false;
      q4Start.readOnly = false;
    }
  }

  
  document.getElementById('sp').addEventListener('change', handleRadioChange);
  document.getElementById('mp').addEventListener('change', handleRadioChange);
  document.getElementById('ep').addEventListener('change', handleRadioChange);
</script>
 
 -->
 <script>

    function setNA(id) {
      const input = document.getElementById(id);
      input.value = "N/A";
    }
    document.getElementById("part_name_dropdown").addEventListener("change", function () {
  const stickyNote = document.getElementById("stickyNote");
  const selectedValue = this.value;

  // List of part names that trigger the sticky note
  const triggerPartNames = ["VO26X1(B)", "VO28X1(B)", "VO30X1(B)", "VO34X1(B)"];

  if (triggerPartNames.includes(selectedValue)) {
    stickyNote.style.display = "block";
  } else {
    stickyNote.style.display = "none";
  }
});


  function start() {
    document.getElementById('q1_start').value = 'N/A';
    document.getElementById('q2_start').value = 'N/A';
    document.getElementById('q3_start').value = 'N/A';
    document.getElementById('q4_start').value = 'N/A';
  }


  function middle() {
    document.getElementById('q1_middle').value = 'N/A';
    document.getElementById('q2_middle').value = 'N/A';
    document.getElementById('q3_middle').value = 'N/A';
    document.getElementById('q4_middle').value = 'N/A';
  }
   
  function end() {
    document.getElementById('q1_end').value = 'N/A';
    document.getElementById('q2_end').value = 'N/A';
    document.getElementById('q3_end').value = 'N/A';
    document.getElementById('q4_end').value = 'N/A';
  }
  function remarksb() {
    document.getElementById('remarks').value = '100% INSPECTION';
  
  }
  </script>

