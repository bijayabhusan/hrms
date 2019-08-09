<div class="col-sm-12" style="margin-top: 7%;">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Designation</div>
                <div class="card-body card-block">
                    <form  class="" id="designationForm" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="designationForm" class="control-label mb-1">Designation Name</label>
                            <input type="text" id="designationname" name="designationname" class="form-control" onclick="charachters_validate('designationname')" minlength="3" maxlength="20" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_designationname"></small>
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
                                    <th>Department name</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="load_designation">
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
        load_designation();
    });
    $("#designationForm").submit(function(e){
        e.preventDefault();
        var frm = $("#designationForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Designation/create_designation')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    $('#designationname').val("");
                }else{
                    console.log(data);
                }
                load_designation();
            }
        });
    });
    function load_designation(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Designation/report_designation')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].designationname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_designation").html(html);
                }
            }
        });
    };
</script>
