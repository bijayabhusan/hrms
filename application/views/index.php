<?php
defined("BASEPATH") or exit("No direct script access allowed.");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="loginbox" style="margin-left:auto;margin-right:auto;display: block;margin-top:15%;" class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form method="post" class="form-horizontal" name="frmLogin" role="form" id="frmLogin">
                            <div style="margin-bottom: 25px">
                                <input id="username" type="text" class="form-control" name="username"   placeholder="username or email" required>
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Next</button>
                                </div>
                            </div>
                        </form>

                        <form method="post" class="form-horizontal" name="frmPassword" role="form" id="frmPassword" style="display: none;">
                            <div style="margin-bottom: 25px">
<!--                                <input type="hidden" id="userid" value="" hidden>-->
                                <input id="password" type="password" class="form-control" name="password"  placeholder="password" required>
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Password Verify</button>
                                </div>
                            </div>
                        </form>

                        <form method="post" class="form-horizontal" name="frmOtp" role="form" id="frmOtp" style="display: none;">
                            <div style="margin-bottom: 25px">
                                <input id="otp" type="text" class="form-control" name="otp"  minlength="6" maxlength="6" placeholder="otp">
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Verify Otp</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>

    $("#frmLogin").submit(function (e) {
        e.preventDefault();
        var frm = $("#frmLogin").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/check_user') ?>",
            data:frm,
            success:function (data) {
                 var jsondata = JSON.parse(data);
                if(jsondata.status!=false){
                 $("#frmLogin").hide();
                 $('#frmPassword').show();
                 var userid = jsondata.userid;
                 $("#frmPassword").submit(function (e) {
                     e.preventDefault();
                     var frm = $("#frmPassword").serialize()+'&'+$.param({ 'userid': userid });
                     $.ajax({
                         type:'post',
                         url:"<?= base_url('User/check_password') ?>",
                         data:frm,
                         success:function (data) {
                             var jsondata = JSON.parse(data);
                             if (jsondata.status != false) {
                                 $("#frmLogin").hide();
                                 $('#frmPassword').hide();
                                 $('#frmOtp').show();
                                 var otp = jsondata.otp;
                                 var userid = jsondata.userid;
                                 $("#frmOtp").submit(function (e) {
                                     e.preventDefault();
                                     var frm = $("#frmOtp").serialize()+'&'+$.param({ 'userid': userid});
                                     alert(frm);
                                     $.ajax({
                                         type: 'post',
                                         url: "<?= base_url('User/verify_otp') ?>",
                                         data: frm,
                                         success: function (data) {
                                             var jsondata = JSON.parse(data);
                                                 if(jsondata.status != false){
                                                     window.location.href="<?= base_url('Dashboard/')?>";
                                                 }else{
                                                     alert("Your have entered wrong Otp");
                                                     window.location.href="<?= base_url('Welcome/')?>";
                                                 }
                                         }
                                     });
                                 });
                             }
                         }
                     });
                 });
             }else{
                    alert('You are not authorized to access.');
                }
            }
        });
    });
</script>
