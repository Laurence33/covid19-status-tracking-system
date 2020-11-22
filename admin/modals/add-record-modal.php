
<!-- Add Case/Sur Modal -->
<form action="process/add-record.php" method="POST" id="addForm">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Add Case/Surveillance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Type of Form -->
            <input type="hidden" name="type">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="addSelectStatus" name="status">
                        <!-- This will populated with Jquery -->
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSelectStatus">Status</label>
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
                    <select class="custom-select" id="addSelectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSelectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="addSelectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSelectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="addSelectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSelectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add-record" class="btn btn-primary" id="addSubmit">Add record</button>
            </div>
        </div>
    </div>
    </div>
</form>



<script>

    function addModalToggle(type) {
        //clear fields
        $('input[name=fname]').val('');
        $('input[name=lname]').val('');
        $('input[name=age]').val('');
        
        $("#addModalTitle").text('Add ' + type); // change the modal title
        $('#addSelectStatus').empty(); //remove existing options and 
        if (type == "Case") {
            $('input[name=type]').val("Case");
            //repopulate options using append()
            $('#addSelectStatus').append('<option value="Active">Active</option><option value="Recovery">Recovery</option><option value="Death">Death</option>');
        }else if(type == "Surveillance") {
            $('input[name=type]').val("Surveillance");
            //repopulate options using append()
            $('#addSelectStatus').append('<option value="Suspect">Suspect</option><option value="Probable">Probable</option><option value="Confirmed">Confirmed</option><option value="Contact">Contact</option>');
        }
    }

</script>