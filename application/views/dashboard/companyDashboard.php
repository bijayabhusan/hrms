        <div class="col-sm-12 " style="margin-top: 7%; " >
            <div class="row">
                <div class="col-lg-3 formsCard" style="min-height: 500px;">
                    <div class="card overview-item--c3" onclick="loadCompanyType()" style="cursor: pointer; ">
                        <div class="card-header">Company Type</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c2" onclick="loadNewCompany()">
                        <div class="card-header"  >New Company</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c4" onclick="loadDepartment()">
                        <div class="card-header"  >Department</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 formsCard" style="min-height: 10px;">
                    <div class="card overview-item--c1" onclick="loadDesignation()">
                        <div class="card-header"  >Designation</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function loadCompanyType() {
                window.location.href="<?= base_url('Forms/loadCompanyType')?>";
            }
            function loadNewCompany() {
                window.location.href="<?= base_url('Forms/loadNewCompany')?>"
            }
            function loadDepartment() {
                window.location.href="<?= base_url('Forms/loadDepartment')?>";
            }
            function loadDesignation() {
                window.location.href="<?= base_url('Forms/loadDesignation')?>";
            }
        </script>
