<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Department Mapping</div>
                <div class="card-body card-block">
                    <form  class="" id="departmentMappingForm" >
                               <div class="col-sm-12">
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <div class="form-group">
                                               <label for="companytype" class="control-label mb-1">Company Type</label>
                                               <select name="companytype" id="companytype" class="form-control"></select>
                                           </div>
                                       </div>
                                   <div class="col-sm-4">
                                       <div class="form-group">
                                           <input type="hidden" id="txtid" name="txtid" value="0">
                                           <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                           <label for="companyid" class="control-label mb-1">Company</label>
                                           <select name="companyid" id="companyid" class="form-control"></select>
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                       <div class="form-group">
                                           <label for="departmentname" class="control-label mb-1">Department</label>
                                           <select name="departmentid" id="departmentid" class="form-control"></select>
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
                        <button type="reset" class="btn  btn-sm" onclick="recentEntries()">Recent Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="allEntries()">All Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="activeEntries()">Active Entries</button>
                        <button type="reset" class="btn  btn-sm" onclick="inactiveEntries()">Inactive Entries</button>
                        <button type="submit" class="btn btn-sm">Details View</button>
                    </form>
                </div>
            </div>
        </div>

            <div class="col-sm-12" id="department_mapping_report" style="display: none;">
                <div class="card">
                    <div class="card-header">Report</div>
                    <div class="card-body">
                        <div class="table table-responsive" >
                            <table class="table table-striped">
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
    </div>
<script>
    $(function () {
        load_department();
        load_companytype();
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
    function recentEntries(){
        $("#department_mapping_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Department/report_department/1')?>",
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
    }
    function allEntries(){
        $("#department_mapping_report").show();
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
    }
    function activeEntries(){
        $("#department_mapping_report").show();
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
    }
    function inactiveEntries(){
        $("#department_mapping_report").show();
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
    }
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
        alert(companytype);
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
</script>
