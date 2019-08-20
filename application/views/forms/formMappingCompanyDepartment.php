<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i> Department Mapping</h2>

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
                <form  class="" id="departmentMappingForm" >
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="companytype" class="control-label mb-1">Company Type</label>
                                    <select name="companytype" id="companytype" class="select"></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                    <label for="companyid" class="control-label mb-1">Company</label>
                                    <select name="companyid" id="companyid" class="select">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="departmentname" class="control-label mb-1">Department</label>
                                    <select name="departmentid" id="departmentid" class="select"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class=" form-group text-right">
                        <button type="reset" class="btn btn-danger btn-sm">reset</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
                <br>
                <hr>
                <form action="">
                    <button type="button" class="btn  btn-sm" onclick="companyDepartmentMappingReport(1)">Recent Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="companyDepartmentMappingReport(2)">All Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="companyDepartmentMappingReport(3)">Active Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="companyDepartmentMappingReport(4)">Inactive Entries</button>
                    <button type="button" class="btn btn-sm" onclick="companyDepartmentMappingReport(5)">Details View</button>
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
                        <th>Company name</th>
                        <th>Department name</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_department_mapping">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        load_department();
        load_companytype();
        // load_company();
    });
    $("#departmentMappingForm").submit(function(e){
        $("#department_mapping_report").show();
        e.preventDefault();
        var frm = $("#departmentMappingForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/create_department_mapping')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                }else{
                    console.log(data);
                }
                recentEntries();
            }
        });
    });

    function load_department(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/load_department')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#departmentid").html(data);
                }
            }
        });
    }
    function load_companytype(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/load_company_type')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#companytype").html(data);

                }
            }
        });
    }
    function load_company(){
        var companytype=$("#companytype").val();
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/load_company')?>",
            crossDomain:true,
            data:{typeid:companytype},
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#companyid").html(data);
                }
            }
        });
    }
    $("#companytype").change(function () {
        load_company();
    });
    function companyDepartmentMappingReport(id){
        if(id==1){
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department_mapping')?>",
                crossDomain:true,
                data:{onlyrecent:1},
                success:function(data){
                    var jsondata = JSON.parse(data);
                    if(data!=false){
                        var j=0;
                        var z = jsondata.length;
                        // alert(z);
                        var html = "";
                        for(var i=0; i<z; i++){
                            j++;
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyid+"</td><td>"+ jsondata[i].departmentid+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department_mapping").html(html);
                    }
                }
            });
        }else if(id==2){
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department_mapping')?>",
                crossDomain:true,
                success:function(data){
                    var jsondata = JSON.parse(data);
                    if(data!=false){
                        var j=0;
                        var z = jsondata.length;
                        var html = "";
                        for(var i=0; i<z; i++){
                            j++;
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyid+"</td><td>"+ jsondata[i].departmentid+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department_mapping").html(html);
                    }
                }
            });
        }else if(id==3){
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department_mapping')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyid+"</td><td>"+ jsondata[i].departmentid+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department_mapping").html(html);
                    }
                }
            });
        }else if(id==4){
            $.ajax({
                type:'post',
                url:"<?= base_url('Department/report_department_mapping')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyid+"</td><td>"+ jsondata[i].departmentid+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_department_mapping").html(html);
                    }
                }
            });
        }else if(id==5){
            alert('This report is not available right now.');
        }

    }
</script>
