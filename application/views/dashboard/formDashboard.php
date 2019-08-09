<div class="col-sm-12">
    <div class="row" style="margin-top:7%;">
        <div class="col-sm-12 dashboardPage">
            <div class="row formsCard" style="min-height: 10px;">
                <div class="col-sm-3">
                    <div class="card overview-item--c1" onclick="loadCompany()" style="cursor: pointer;">
                        <div class="card-header"  >Company</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card overview-item--c3" onclick="loadEmployee()">
                        <div class="card-header">Employee</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card overview-item--c4">
                        <div class="card-header">Attendance</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card overview-item--c2">
                        <div class="card-header">Leave</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 dashboardPage">
            <div class="row formsCard" style="min-height: 300px;">
                <div class="col-lg-3">
                    <div class="card overview-item--c4" onclick="loadState()" style="cursor: pointer;">
                        <div class="card-header"  >State</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card overview-item--c2" onclick="loadDistict()">
                        <div class="card-header">District</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card overview-item--c1" onclick="loadEducation()">
                        <div class="card-header">Education</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" >
                    <div class="card overview-item--c3" onclick="loadYear()">
                        <div class="card-header">Year</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function loadCompany() {
        window.location.href="<?= base_url('Forms/companyDashboard')?>";
    }
    function loadState() {
            window.location.href="<?= base_url('Forms/formState')?>"
    }
    function loadDistict() {
       window.location.href="<?= base_url('Forms/formDistrict')?>";
    }
    function loadEducation() {
        window.location.href="<?= base_url('Forms/formEducation')?>";
    }
    function loadYear() {
        window.location.href="<?= base_url('Forms/formYear')?>";
    }
</script>
