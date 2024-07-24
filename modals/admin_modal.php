
<style>
    .is-invalid {
    border-color: #dc3545; /* Red color for invalid input */
}

</style>
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
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
                <h5 class="modal-title" style="color: black; margin-bottom: 30px;"><strong>Add Account</strong></h5>
                <div class="row mb-4">
                  
                    <div class="col-sm-4">
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="form-control" autocomplete="off" style="margin-bottom: 30px;">
                        </div>
                        <div class="col-sm-4">
                        <label>Password</label>
                        <input type="text" id="password" name="password" class="form-control" autocomplete="off" style="margin-bottom: 30px;">
                        </div>
            
               
                            <div class="col-sm-4">
                                <label>Type</label>
                                <select id="type" class="form-control" name="type" style="margin-bottom:30px">
                                 
                                    <option value="user">user</option>
                                  
                                </select>
                            </div>
            
            
               




<div id="notice" style="display: none;"></div>


                <!-- Footer Buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger float-right">Clear</button>
                    <button type="button" id="saveButton" class="btn btn-success float-right" style="width: 150px; background-color: #20c997; border-color: #20c997; color: white;" onclick="saveData()">Add</button>
                    </div>
            </div>
        </div>
    </div>
</div>

</form>
