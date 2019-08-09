<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Company Type</div>
                <div class="card-body card-block">
                    <form  class="" id="companyTypeForm" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Company Type Name</label>
                            <input type="text" id="companytypename" name="companytypename" onclick="charachters_validate('companytypename')" minlength="5" maxlength="60" class="form-control" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_companytypename"></small>
                        </div>
                        <div class="form-actions form-group">
                            <button type="reset" class="btn btn-danger btn-sm">reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Report</div>
                <div class="card-body">
                    <div class="table table-responsive" >
                        <table class="table table-striped">
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
</div>
<script>
    $(function () {
        load_company_type();
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
                load_company_type();
            }
        });
    });
    function load_company_type(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/report_company_type')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_company_type").html(html);
                }
            }
        });
    }
</script>
