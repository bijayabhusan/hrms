        <div class="col-sm-12 " style="margin-top: 7%; " >
            <div class="row">
                <div class="col-lg-3 formsCard" style="min-height: 500px;">
                    <div class="card overview-item--c3" onclick="loadEmployeeType()" style="cursor: pointer; ">
                        <div class="card-header">Employee Type</div>
                        <div class="card-body">
                            <i class="fa fa-industry fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c2" onclick="loadNewEmployee()">
                        <div class="card-header"  >New Eployee</div>
                        <div class="card-body">
                            <i class="fa fa-building fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c4" onclick="formEmployeeBankDetails()">
                        <div class="card-header" >Bank Details</div>
                        <div class="card-body">
                            <i class="fa fa-search fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c1" onclick="employeeAttendance()">
                        <div class="card-header">Attendance</div>
                        <div class="card-body">
                            <i class="fa fa-industry fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function loadEmployeeType() {
                window.location.href="<?= base_url('Forms/formEmployeeType')?>";
            }
            function loadNewEmployee() {
                window.location.href="<?= base_url('Forms/formNewEmployee')?>"
            }
            function formEmployeeBankDetails() {
                window.location.href="<?= base_url('Forms/formEmployeeBankDetails')?>";
            }
            function employeeAttendance() {
                window.location.href="<?= base_url('Forms/employeeAttendance')?>";
            }
        </script>
