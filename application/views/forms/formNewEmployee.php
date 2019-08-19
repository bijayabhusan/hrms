    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create New Employee</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="newEmployeeForm"  name="newEmployeeForm" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employeefirstname" class="control-label mb-1">First Name</label>
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value="1">
                                    <input type="hidden" id="slno" name="slno" value="1">
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
                                    <label for="employeespoucename" class="control-label mb-1">Spouse Name</label>
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
                    <br>
                    <hr>
                    <form action="">
                        <button type="reset" class="btn  btn-sm" onclick="recentEntries()">Recent Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="allEntries()">All Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="activeEntries()">Active Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="inactiveEntries()">Inactive Entries</button>
                        <button type="submit" class="btn btn-sm">Details View</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Report</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead style="font-size: 10px;">
                        <tr>
                            <th>Sl#</th>
                            <th>Employee Name</th>
                            <th>Gender</th>
                            <th>Date of birth</th>
                            <th>Marital Status</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Spouse Name</th>
                            <th>Employee Type</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Date of Joining</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Education</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>Aadhar Number</th>
                            <th>GST Number</th>
                            <th>URL</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_employeess">
                        </tbody>
                    </table>
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
        $("#newEmployee_report").show();
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
    function recentEntries(){
        $("#newEmployee_report").show();
        // var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee/1')?>",
            // data:{typeid:companyid},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employeess").html(html);
                }
            }
        });
    }
    function allEntries(){
        $("#newEmployee_report").show();
        // var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee')?>",
            // data:{typeid:companyid,onlyactive:1},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employeess").html(html);
                }
            }
        });
    }
    function activeEntries(){
        $("#newEmployee_report").show();
        // var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee')?>",
            data:{onlyactive:1},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employeess").html(html);
                }
            }
        });
    }
    function inactiveEntries(){
        $("#newEmployee_report").show();
        // var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee')?>",
            data:{onlyinactive:1},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employeess").html(html);
                }
            }
        });
    }
</script>
