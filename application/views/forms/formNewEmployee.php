<div class="col-sm-12">
    <div class="row" style="margin-top: 7%;">
        <div class="col-sm-12">
            <div class="card">
<!--                <div class="card-header">New Employee Creation</div>-->
                <h4 class="text-center" style="margin-top: 5px;margin-bottom: 5px;">New Employee Creation</h4>
                <div class="card-body card-block">
                    <form  class="" id="newEmployeeForm"  name="newEmployeeForm">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employeefirstname" class="control-label mb-1">First Name</label>
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value="1">
                                    <input id="employeefirstname" name="employeefirstname" type="text" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="employeedob" class="control-label mb-1">Date of Birth</label>
                                    <input id="employeedob" name="employeedob" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="employeefathername" class="control-label mb-1">Father Name</label>
                                    <input id="employeefathername" name="employeefathername" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="employeetype" class="control-label mb-1">Employee Type</label>
                                    <select id="employeetype" name="employeetype" class="form-control" aria-required="true" aria-invalid="false" >
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeedoj" class="control-label mb-1">Date of Joining</label>
                                    <input id="employeedoj" name="employeedoj" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="employeeeducation" class="control-label mb-1">Education</label>
                                    <select id="employeeeducation" name="employeeeducation" class="form-control" aria-required="true" aria-invalid="false" >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeeepfnumber" class="control-label mb-1">EPF Number</label>
                                    <input id="employeeepfnumber" name="employeeepfnumber" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>

                            </div>
                        <!-- <div class="form-group">
                            <label for="employeedol" class="control-label mb-1">Date of leave</label>
                            <input id="employeedol" name="employeedol" type="date" class="form-control" aria-required="true" aria-invalid="false" minlength="16" maxlength="16">
                        </div> -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employeemiddlename" class="control-label mb-1">Middle Name</label>
                                    <input id="employeemiddlename" name="employeemiddlename" type="text" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="employeegender" class="control-label mb-1">Gender</label>
                                    <select id="employeegender" name="employeegender" class="form-control" aria-required="true" aria-invalid="false" >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeemothername" class="control-label mb-1">Mother Name</label>
                                    <input id="employeemothername" name="employeemothername" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="employeedepartment" class="control-label mb-1">Department</label>
                                    <select id="employeedepartment" name="employeedepartment" class="form-control" aria-required="true" aria-invalid="false" >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeeemail" class="control-label mb-1">Email</label>
                                    <input id="employeeemail" name="employeeemail" type="email" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="employeeaddress" class="control-label mb-1">Address</label>
                                    <textarea id="employeeaddress" name="employeeaddress" class="form-control" aria-required="true" aria-invalid="false" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="employeeesinumber" class="control-label mb-1">ESI Number</label>
                                    <input id="employeeesinumber" name="employeeesinumber" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employeelastname" class="control-label mb-1">Last Name</label>
                                    <input id="employeelastname" name="employeelastname" type="text" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="employeegender" class="control-label mb-1">Marital Status</label>
                                    <select id="employeemaritalstatus" name="employeemaritalstatus" class="form-control" aria-required="true" aria-invalid="false" >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeespoucename" class="control-label mb-1">Spouce Name</label>
                                    <input id="employeespoucename" name="employeespoucename" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="employeepostion" class="control-label mb-1">Designation</label>
                                    <select id="employeeposition" name="employeeposition" class="form-control" aria-required="true" aria-invalid="false" ></select>
                                </div>
                                <div class="form-group">
                                    <label for="employeemobile" class="control-label mb-1">Mobile</label>
                                    <input id="employeemobile" name="employeemobile" type="number" class="form-control" aria-required="true" aria-invalid="false" minlength="10" maxlength="10" >
                                </div>
                                <div class="form-group">
                                    <label for="employeeaadharnumber" class="control-label mb-1">Aadhar Number</label>
                                    <input id="employeeaadharnumber" name="employeeaadharnumber" type="text" class="form-control" aria-required="true" aria-invalid="false" maxlength="12" minlength="12" >
                                </div>

                                <div class="form-group">
                                    <label for="employeepannumber" class="control-label mb-1">PAN Number</label>
                                    <input id="employeepannumber" name="employeepannumber" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class=" text-center ">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Report</div>
                    <div class="card-body">
                        <div class="table table-responsive" >
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Company Name</th>
                                    <th>Company Short Name</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>GST Number</th>
                                    <th>URL</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="load_company">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        load_employee_type();
        // load_company_report();
        load_education();
        load_department();
        load_designation();
        load_marital_status();
        load_gender();
    });


    function load_employee_type(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Employee/load_employee_type')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#employeetype").html(data);
                }
            }

        });
    }
    function load_education(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Education/load_education')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#employeeeducation").html(data);
                }
            }
        });
    }
    function load_department() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Department/load_department')?>",
            crossDomain: true,
            success: function (data) {
                var data = JSON.parse(data);
                if (data != false) {
                    $("#employeedepartment").html(data);
                }
            }
        });
    }
    function load_designation() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Designation/load_designation')?>",
            crossDomain: true,
            success: function (data) {
                var data = JSON.parse(data);
                if (data != false) {
                    $("#employeeposition").html(data);
                }
            }
        });
    }
    function load_gender() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Gender/load_gender')?>",
            crossDomain: true,
            success: function (data) {
                var data = JSON.parse(data);
                if (data != false) {
                    $("#employeegender").html(data);
                }
            }
        });
    }
    function load_marital_status() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('MaritalStatus/load_marital_status')?>",
            crossDomain: true,
            success: function (data) {
                var data = JSON.parse(data);
                if (data != false) {
                    $("#employeemaritalstatus").html(data);
                }
            }
        });
    }
    $("#newEmployeeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#newEmployeeForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/create_employee')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    console.log(data);
                }else{
                    console.log(data);
                }
            }

        });
    });
</script>
