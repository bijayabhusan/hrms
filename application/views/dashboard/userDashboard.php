<div class="row">
    <div class="col-sm-12" style="margin-top: 5%">
        <div class="row">
            <div class="box col-sm-2">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i> User Forms</h2>
                    </div>
                    <div class="box-content">
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li onclick="loadUserType()"><i class="fa fa-check-square "></i> &nbsp; User Type</li>
                            <li onclick="loadNewUser()"><i class="fa fa-check-square "></i> &nbsp; New User</li>
                            <li onclick="loadUserAuthentication()"><i class="fa fa-check-square "></i> &nbsp; User Authentication</li>
                        </ul>
                        <hr>
                        <ul class="nav nav-pills nav-stacked main-menu">
                                                    <li onclick="loadDepartment()"><i class="fa fa-check-square "></i> &nbsp; Department</li>
                                                    <li onclick="loadDesignation()"><i class="fa fa-check-square "></i> &nbsp; Designation</li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked main-menu">
                                                    <li onclick="loadDepartmentMapping()"><i class="fa fa-check-square "></i> &nbsp; Department Mapping</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class=" " style="min-height: 600px;">
                    <div id="load_pages">
                        <div class="row">
                            <div class="box col-sm-12">
                                <div class="box-inner">
                                    <div class="box-header well">
                                        <h2><i class="fa fa-angle-double-right "></i> User Dashboard</h2>
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
    function loadUserType() {
        $.ajax({
            url:"<?= base_url('Forms/formUsertype')?>",
            type:"post",
            success:function (d) {
                $("#load_pages").html(d);
            }
        });
    }
    function loadNewUser() {
        $.ajax({
            url:"<?= base_url('Forms/formUser')?>",
            type:"post",
            success:function (d) {
                $("#load_pages").html(d);
            }
        });
    }
    function loadUserAuthentication() {
        $.ajax({
            url:"<?= base_url('Forms/formUserAuthentication')?>",
            type:"post",
            success:function (d) {
                $("#load_pages").html(d);
            }
        });
    }
</script>
