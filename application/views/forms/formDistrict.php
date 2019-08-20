<div class="col-sm-10">

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create District</h2>

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
                    <form  class="" id="districtname" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="stateid" class="control-label mb-1">State Name</label>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <select name="stateid" id="stateid"  class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label mb-1">District Name</label>
                            <input type="text" id="distname" name="distname" class="form-control" onclick="charachters_validate('distname')" minlength="3" maxlength="20" required>
                            <small class="errormsg_distname"></small>
                        </div>
                        <div class="form-actions form-group">
                            <button type="reset" class="btn btn-danger btn-sm">reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form action="">
                        <button type="button" class="btn  btn-sm" onclick="districtEventFire(1)">Recent Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="districtEventFire(2)">All Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="districtEventFire(3)">Active Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="districtEventFire(4)">Inactive Entries</button>
                        <button type="button" class="btn btn-sm" onclick="districtEventFire(5)">Details View</button>
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
                            <th>District name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_district">
                        </tbody>
                    </table>
                    </div>
                </div>
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
    $("#districtname").submit(function(e){
        e.preventDefault();
        var frm = $("#districtname").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('District/create_district')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $("#districtname").val('');
                }else{
                    console.log(data);
                }
                districtEventFire(1);
            }
        });
    });
    function load_state(){
        $.ajax({
            type:'post',
            url:"<?= base_url('State/load_state')?>",
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#stateid").html(data);
                }
            }
        });
    }
    $("#stateid").change(function () {
        load_district();
    });
    function districtEventFire(id){
        if(id==1){
            var stateid = $('#stateid').val();
            $.ajax({
                type:'post',
                url:"<?= base_url('District/report_district')?>",
                data:{stateid:stateid,onlyrecent: 1},
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_district").html(html);
                    }
                }
            });
        }else if(id==2){
            var stateid = $('#stateid').val();
            $.ajax({
                type:'post',
                url:"<?= base_url('District/report_district')?>",
                data:{stateid:stateid},
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_district").html(html);
                    }
                }
            });
        }else if(id==3){
            var stateid = $('#stateid').val();
            $.ajax({
                type:'post',
                url:"<?= base_url('District/report_district')?>",
                data:{stateid:stateid,onlyactive:1},
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_district").html(html);
                    }
                }
            });
        }else if(id==4){
            var stateid = $('#stateid').val();
            $.ajax({
                type:'post',
                url:"<?= base_url('District/report_district')?>",
                data:{stateid:stateid,onlyinactive:1},
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_district").html(html);
                    }
                }
            });
        }else if(id==5){
            alert('This report is not available now.');
        }
    }

</script>
