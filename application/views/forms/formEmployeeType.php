<?php
$datenow = date("Y-m-d H:i:s");
?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create Employee Type</h2>

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
                    <form  class="" id="employeeTypeForm" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Employee Type Name</label>
                            <input type="text" id="typename" name="typename" onclick="charachters_validate('companytypename')" minlength="5" maxlength="60" class="form-control" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_companytypename"></small>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right">
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
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>Company type name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_employee_type">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        // load_company_type();
    });
    $("#employeeTypeForm").submit(function(e){
        $("#employeeType_report").show();
        e.preventDefault();
        var frm = $("#employeeTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Employee/create_employee_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#typename').val("");
                }else{
                    console.log(data);
                }
                recentEntries();
            }
        });
    });
    function recentEntries(){
        $("#employeeType_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_type/1')?>",
            crossDomain:true,
            // data:{creatdate:datenow},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employee_type").html(html);
                }
            }
        });
    }
    function allEntries(){
        $("#employeeType_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_type')?>",
            crossDomain:true,
            // data:{creatdate:datenow},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employee_type").html(html);
                }
            }
        });
    }
    function activeEntries(){
        $("#employeeType_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_type')?>",
            crossDomain:true,
            data:{onlyactive:1},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employee_type").html(html);
                }
            }
        });
    }
    function inactiveEntries(){
        $("#employeeType_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_type')?>",
            crossDomain:true,
            data:{onlyinactive:1},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_employee_type").html(html);
                }
            }
        });
    }
</script>
