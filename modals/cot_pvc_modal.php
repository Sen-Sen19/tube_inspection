<style>
  .is-invalid {
    border-color: #dc3545;
    /* Red color for invalid input */
  }

  .disabled-input {
    background-color: #e9ecef;
    cursor: not-allowed;
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
              <select id="part_name_dropdown" name="part_name" class="form-control" autocomplete="off">
              </select>
            </div>
            <div class="col-sm-3">
              <label>Quantity(m)</label>
              <input type="number" id="part_name_quantity" name="quantity" class="form-control" autocomplete="off">
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
                  <input type="number" id="outside-start" class="form-control" name="o_diameter_start"
                    autocomplete="off">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="outside-end">End</label>
                  <input type="number" id="outside-end" class="form-control" name="o_diameter_end" autocomplete="off">
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
            <div class="row">
              <div class="col-4 form-section text-center">
                <h6>Start</h6>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q1</span>
                    </div>
                    <input type="number" id="q1_start" class="form-control" autocomplete="off" name="q1_start">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="number" id="q2_start" class="form-control" autocomplete="off" name="q2_start">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="number" id="q3_start" class="form-control" autocomplete="off" name="q3_start">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="number" id="q4_start" class="form-control" autocomplete="off" name="q4_start">
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
                    <input type="number" id="q1_middle" class="form-control" autocomplete="off" name="q1_middle">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="number" id="q2_middle" class="form-control" autocomplete="off" name="q2_middle">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="number" id="q3_middle" class="form-control" autocomplete="off" name="q3_middle">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="number" id="q4_middle" class="form-control" autocomplete="off" name="q4_middle">
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
                    <input type="number" id="q1_end" class="form-control" autocomplete="off" name="q1_end">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q2</span>
                    </div>
                    <input type="number" id="q2_end" class="form-control" autocomplete="off" name="q2_end">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q3</span>
                    </div>
                    <input type="number" id="q3_end" class="form-control" autocomplete="off" name="q3_end">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light">Q4</span>
                    </div>
                    <input type="number" id="q4_end" class="form-control" autocomplete="off" name="q4_end">
                  </div>
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
                <label for="inside-start">Serial No.</label>
                <input type="text" id="serial_no" class="form-control" name="serial_no" autocomplete="off">
              </div>
              <div class="col-6">
                <label for="inside-end">Lot No.</label>
                <input type="text" id="lot_no" class="form-control" name="lot_no" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="horizontal-rule" style="width: 100%; height: 1px; background-color: #20c997; margin: 15px 0;">
          </div>
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
              <input type="text" id="confirm_by" class="form-control" name="confirm_by" autocomplete="off">
            </div>
            <div class="col-3">
              <label for="remarks">Remarks</label>
              <input type="text" id="remarks" class="form-control" name="remarks" autocomplete="off">
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

</form>
<script>
  document.getElementById('part_name_dropdown').addEventListener('change', function () {
    const partName = this.value;
    const disabledValues = [
      'VO10X0.5(B)', 'VO10X1(B)', 'VO12X0.5(B)', 'VO12X1(B)',
      'VO14X0.5(B)', 'VO14X1(B)', 'VO16X0.6(B)', 'VO16X1(B)',
      'VO18X0.6(B)', 'VO18X1(B)', 'VO20X0.6(B)', 'VO20X1(B)',
      'VO22X1(B)', 'VO24X1(B)', 'VO4X0.5(B)', 'VO4X1(B)',
      'VO6X0.5(B)', 'VO6X1(B)', 'VO8X0.5(B)', 'VO8X1(B)'
    ];

    const slitCondition = document.getElementById('slit_condition');
    const usingRoundBar = document.getElementById('using_round_bar');
    const usingBareHands = document.getElementById('using_bare_hands');
    const oDiameterStart = document.getElementById('outside-start');
    const oDiameterEnd = document.getElementById('outside-end');
    const oDiameterMin = document.getElementById('o-diameter-min');
    const oDiameterMax = document.getElementById('o-diameter-max');


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

    if (spRadio.checked) {

      serialNoInput.value = 'N/A';
      lotNoInput.value = 'N/A';
      serialNoInput.readOnly = true;
      lotNoInput.readOnly = true;


      q1Middle.disabled = false;
      q2Middle.disabled = false;
      q3Middle.disabled = false;
      q4Middle.disabled = false;
    }

    else if (epRadio.checked) {

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
    }








    else if (mpRadio.checked) {
      // For MP
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
    }
  }

  document.getElementById('sp').addEventListener('change', handleRadioChange);
  document.getElementById('mp').addEventListener('change', handleRadioChange);
  document.getElementById('ep').addEventListener('change', handleRadioChange);

</script>