<div class="col-sm-10">

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create State</h2>

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
                    <form  class="" id="stateForm" autocomplete="off">
                        <br>
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="statename" class="control-label mb-1">State Name</label>
                            <input type="text" id="statename" name="statename" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('statename')" minlength="3" maxlength="20" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_statename"></small>
                        </div>
                        <br>
                        <div class="text-right form-group">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form action="">
                        <button type="button" class="btn  btn-sm" onclick="stateEventFire(1)">Recent Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="stateEventFire(2)">All Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="stateEventFire(3)">Active Entries</button>
                        <button type="button" class="btn  btn-sm" onclick="stateEventFire(4)">Inactive Entries</button>
                        <button type="button" class="btn btn-sm" onclick="stateEventFire(5)">Details View</button>
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
</div>
</div>
<script>
    $(function () {
        // load_state();
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

                stateEventFire(1);
            }

        });
    });

    function stateEventFire(id) {

        if(id==1){
            $.ajax({
                type:'post',
                url:"<?= base_url('State/report_state')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_state").html(html);
                    }
                }
            });
        }else if(id==2){
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
        }else if(id==3){
            $.ajax({
                type:'post',
                url:"<?= base_url('State/report_state')?>",
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
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_state").html(html);
                    }
                }
            });
        }else if(id==4) {
            $.ajax({
                type: 'post',
                url: "<?= base_url('State/report_state')?>",
                crossDomain: true,
                data: {onlyinactive: 1},
                success: function (data) {
                    var jsondata = JSON.parse(data);
                    if (data != false) {
                        var j = 0;
                        var z = jsondata.length;
                        // alert(z);
                        var html = "";
                        for (var i = 0; i < z; i++) {
                            j++;
                            html += ("<tr> <td>" + j + "</td><td>" + jsondata[i].statename + "</td><td>" + jsondata[i].isactive + "</td><td>Edit</td></tr>");
                        }
                        $("#load_state").html(html);
                    }
                }
            });
        }
        //}else if(id==5){
        //    $("#hide_for_details_view").hide();
        //    $.ajax({
        //        type:'post',
        //        url:"<?//= base_url('State/report_state')?>//",
        //        crossDomain:true,
        //        success:function(data){
        //            var jsondata = JSON.parse(data);
        //            if(data!=false){
        //                var j=0;
        //                var z = jsondata.length;
        //                // alert(z);
        //                var html = "";
        //                for(var i=0; i<z; i++){
        //                    j++;
        //                    html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statename+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
        //                }
        //                $("#load_state").html(html);
        //            }
        //        }
        //    });
        //}
    }
</script>
