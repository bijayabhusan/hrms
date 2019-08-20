
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i>Create Department</h2>

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
                <form  class="" id="departmentForm" autocomplete="off" >
                    <div class="form-group">
                        <input type="hidden" id="txtid" name="txtid" value="0">
                        <label for="departmentname" class="control-label mb-1">Department Name</label>
                        <input type="text" id="departmentname" name="departmentname" onclick="charachters_validate('departmentname')" minlength="3" maxlength="20"  class="form-control" aria-required="true" aria-invalid="false" required>
                        <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                        <small class="errormsg_departmentname"></small>
                    </div>
                    <br>
                    <div class=" form-group text-right">
                        <button type="reset" class="btn btn-danger btn-sm">reset</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
                <br>
                <hr>
                <form action="">
                    <button type="button" class="btn  btn-sm" onclick="departmentReport(1)">Recent Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="departmentReport(2)">All Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="departmentReport(3)">Active Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="departmentReport(4)">Inactive Entries</button>
                    <button type="button" class="btn btn-sm" onclick="departmentReport(5)">Details View</button>
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
                <div class="table-responsive">
                    <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                    <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Department name</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_department">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // load_department();
    });
    $("#departmentForm").submit(function(e){
        $("#department_report").show();
        e.preventDefault();
        var frm = $("#departmentForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/create_department')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    departmentReport(1);
                    $('#departmentname').val("");
                }else{
                    console.log(data);
                }
            }
        });
    });
    function departmentReport(id){
        if(id==1){
            $("#department_report").show();
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department')?>",
                data:{onlyrecent:1},
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department").html(html);
                    }
                }
            });
        }else if(id==2){
            $("#department_report").show();
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department").html(html);
                    }
                }
            });
        }else if(id==3){
            $("#department_report").show();
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department").html(html);
                    }
                }
            });
        }else if(id==4){
            $("#department_report").show();
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department").html(html);
                    }
                }
            });
        }else if(id==5){
         alert('This report is not available right now.');
        }

    }
</script>
