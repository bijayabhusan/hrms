<div class="row">
    <div class="col-sm-12" style="margin-top: 5%">
        <div class="row">
            <div class="box col-sm-2">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i> Menus</h2>

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
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li onclick="loadEmployeeType()"><i class="fa fa-check-square "></i> &nbsp; Employee Type</li>
                            <li onclick="loadNewEmployee()"><i class="fa fa-check-square "></i> &nbsp; New Eployee</li>
                            <li onclick="loadEmployeeBankDetails()"><i class="fa fa-check-square "></i> &nbsp; Bank Details</li>
                            <li onclick="loadDepartmentMapping()"><i class="fa fa-check-square "></i> &nbsp; Department Mapping</li>
                            <li onclick="loadAttendance()"><i class="fa fa-check-square "></i> &nbsp; Attendance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class=" " style="min-height: 600px;">
                    <div id="load_employee_pages">
                        <div class="row">
                            <div class="box col-sm-12">
                                <div class="box-inner">
                                    <div class="box-header well">
                                        <h2><i class="fa fa-angle-double-right "></i> Employee Dashboard</h2>

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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            function loadEmployeeType() {
                $.ajax({
                    url:"<?= base_url('Forms/formEmployeeType')?>",
                    type:"post",
                    success:function (d) {
                        $("#load_employee_pages").html(d);
                    }
                });
            }
            function loadNewEmployee() {
                $.ajax({
                    url:"<?= base_url('Forms/formNewEmployee')?>",
                    type:"post",
                    success:function (d) {
                        $("#load_employee_pages").html(d);
                    }
                });
            }
            function loadEmployeeBankDetails() {
                $.ajax({
                    url:"<?= base_url('Forms/formEmployeeBankDetails')?>",
                    type:"post",
                    success:function (d) {
                        $("#load_employee_pages").html(d);
                    }
                });
            }
            function employeeAttendance() {
                $.ajax({
                    url:"<?= base_url('Forms/employeeAttendance')?>",
                    type:"post",
                    success:function (d) {
                        $("#load_employee_pages").html(d);
                    }
                });
            }
            function loadDepartmentMapping() {
                $.ajax({
                    url:"<?= base_url('Forms/mapping_company_department')?>",
                    type:"post",
                    success:function (d) {
                        $("#load_employee_pages").html(d);
                    }
                });
            }
        </script>
