<?php
$datenow = date("Y-m-d H:i:s");
?>
<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Marital Status</div>
                <div class="card-body card-block">
                    <form  class="" id="maritalStatusForm" name="maritalStatusForm">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Status Name</label>
                            <input type="text" id="statusname" name="statusname" onclick="charachters_validate('statusname')" minlength="5" maxlength="60" class="form-control" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_statusname"></small>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                    <br>
                    <hr>
<!--                    <form action="">-->
<!--                        <button type="reset" class="btn  btn-sm">All Records</button>-->
<!--                        <button type="submit" class="btn btn-sm">Details View</button>-->
<!--                    </form>-->
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">Report</div>
                <div class="card-body">
                    <div class="table table-responsive" >
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Status name</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="load_status_names">
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
        load_status_name();
    });
    $("#maritalStatusForm").submit(function(e){
        e.preventDefault();
        var frm = $("#maritalStatusForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('MaritalStatus/create_marital_status')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#statusname').val("");
                }else{
                    console.log(data);
                }
                load_status_name();
            }
        });
    });
    function load_status_name(){
        $.ajax({
            type:'post',
            url:"<?= base_url('MaritalStatus/report_marital_status')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statusname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_status_names").html(html);
                }
            }
        });
    }
</script>
