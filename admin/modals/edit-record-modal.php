<!-- Edit Case/Surveillance Modal -->
<form action="process/edit-record.php" method="POST" id="edit-form">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle">This will be changed with the JQuery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <input type="hidden" name="type">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="editSelectStatus" name="status">
                        <!-- <option selected>Choose...</option> -->
                        <!-- <option value="Active">Active</option>
                        <option value="Recovery">Recovery</option>
                        <option value="Death">Death</option> -->
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectStatus">Status</label>
                    </div>
                </div>
            </div>
            <!-- First name, Last name, age -->
            <div class="row">
                <div class="input-group mb-3">
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="First name" name="fname">
                    </div>
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="Last name" name="lname">
                    </div>
                    <div class="col col-md-2">
                    <input type="text" class="form-control" placeholder="Age" name="age">
                    </div>
                </div>
            </div>
            <!-- Address Select -->
                <!-- Select Province -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $prov_code?>"  name="prov_code">
                    <select class="custom-select" id="editSelectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="editSelectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="editSelectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="" id="delete-link" class="btn btn-link text-danger">Delete</a>
                <button type="submit" id="edit-submit-button" name="edit-record" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
    </div>
</form>

<script>

    function getCaseDetails(id, status, age, fname, lname, type) {
        $('input[name=id]').val(id);
        $('input[name="age"]').val(age);
        $('input[name="fname"]').val(fname);
        $('input[name="lname"]').val(lname);
        $("#hiddenid").val(id);
        $('#editModalTitle').text("Edit " + type);
        $("#delete-link").attr('href', 'process/delete-record.php?id=' + id + '&type=' + type + '<?php echo '&prov_code='.$prov_code.'&citymun_code='.$citymun_code.'&brgy_code='.$brgy_code?>');
        $("#editSelectStatus").empty();
        if(type == "Case") {
            $('input[name=type]').val("Case");
            $("#editSelectStatus").append('<option value="Active">Active</option><option value="Recovery">Recovery</option><option value="Death">Death</option>');
        }else if(type = "Surveillance") {
            $('input[name=type]').val("Surveillance");
            $("#editSelectStatus").append('<option value="Suspect">Suspect</option><option value="Probable">Probable</option><option value="Confirmed">Confirmed</option><option value="Contact">Contact</option>');
        }
        $('select[name="status"]').val(status);
    }
    
    </script>