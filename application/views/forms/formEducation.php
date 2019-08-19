<div class="col-sm-10">

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Education</h2>

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
                    <form  class="" id="educationForm" autocomplete="off">
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
