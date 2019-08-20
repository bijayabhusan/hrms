<?php
$datenow = date("Y-m-d H:i:s");
?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create Company Type</h2>

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
                    <form  class="" id="companyTypeForm" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Company Type Name</label>
                            <input type="text" id="companytypename" name="companytypename" onclick="charachters_validate('companytypename')" minlength="5" maxlength="60" class="form-control" placeholder="Enter company name, Only charachters and space are allowed." required>
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
                        <button type="button" class="btn  btn-sm" onclick="companyTypeReport(1)">Recent Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="companyTypeReport(2)">All Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="companyTypeReport(3)">Active Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="companyTypeReport(4)">Inactive Entries</button>
                        <button type="button" class="btn btn-sm" onclick="companyTypeReport(5)">Details View</button>
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
                        <th>Company type name</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_company_type">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // load_company_type();
        // recentEntries();
    });
    $("#companyTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#companyTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/create_company_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#companytypename').val("");
                }else{
                    console.log(data);
                }
                companyTypeReport(1);
            }
        });
    });
    function companyTypeReport(id){
        if(id==1){
            var datenow = "<?= $datenow?>";
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company_type')?>",
                crossDomain:true,
                data:{onlyrecent:1},
                // data:{onlyactive:1},
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
                        $("#load_company_type").html(html);
                    }
                }
            });
        }else if(id==2){
            var datenow = "<?= $datenow?>";
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company_type')?>",
                crossDomain:true,
                // data:{onlyactive:1},
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
                        $("#load_company_type").html(html);
                    }
                }
            });
        }else if(id==3){
            var datenow = "<?= $datenow?>";
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company_type')?>",
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
                        $("#load_company_type").html(html);
                    }
                }
            });
        }else if(id==4){
            var datenow = "<?= $datenow?>";
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company_type')?>",
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
                        $("#load_company_type").html(html);
                    }
                }
            });
        }else if(id==5){
            alert('This report is not avalilable right now');
        }

    }
    // function allEntries() {
    //     $("#companyTypeReport").toggle();
    // }
</script>
