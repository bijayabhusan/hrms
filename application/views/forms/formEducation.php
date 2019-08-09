<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Education</div>
                <div class="card-body card-block">
                    <form  class="" id="educationForm" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="educationname" class="control-label mb-1">Education Name</label>
                            <input type="text" id="educationname" name="educationname" class="form-control" onclick="charachters_validate('educationname')" minlength="3" maxlength="20" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_educationname"></small>
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
                                    <th>Education</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="load_education">
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
        load_education();
    });
    $("#educationForm").submit(function(e){
        e.preventDefault();
        var frm = $("#educationForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Education/create_education')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#educationname').val('');
                }else{
                    console.log(data);
                }
                load_education();
            }

        });
    });
    function load_education(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Education/report_education')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].educationname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_education").html(html);
                }
            }
        });
    };
</script>
