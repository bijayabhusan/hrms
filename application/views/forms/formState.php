<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">State</div>
                <div class="card-body card-block">
                    <form  class="" id="stateForm" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="statename" class="control-label mb-1">State Name</label>
                            <input type="text" id="statename" name="statename" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('statename')" minlength="3" maxlength="20" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_statename"></small>
                        </div>
                        <div class="form-actions form-group">
                            <button type="reset" class="btn btn-primary btn-sm">reset</button>
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
                                <th>State name</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_state">
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
        load_state();
    });
    $("#stateForm").submit(function(e){
        e.preventDefault();
        var x = location.hostname;
        var frm = $("#stateForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('State/create_state')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $("#statename").val("");
                }else{
                    console.log(data);
                }

                load_state();
            }

        });
    });
    function load_state(){
        $.ajax({
            type:'post',
            url:"<?= base_url('State/report_state')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_state").html(html);
                }
            }
        });
    };
</script>
