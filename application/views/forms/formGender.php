<?php
$datenow = date("Y-m-d H:i:s");
?>
    <div class="col-sm-10">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i> Create Gender</h2>

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
                        <form  class="" id="genderForm" name="genderForm" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" id="txtid" name="txtid" value="0">
                                <label for="" class="control-label mb-1">Gender Name</label>
                                <input type="text" id="gendername" name="gendername" onclick="charachters_validate('gendername')" minlength="5" maxlength="60" class="form-control" required>
                                <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                <small class="errormsg_gendername"></small>
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
                            <button type="button" class="btn  btn-sm" onclick="genderReport(1)">Recent Entries</button>
                            <button type="button" class="btn  btn-sm" onclick="genderReport(2)">All Entries</button>
                            <button type="button" class="btn  btn-sm" onclick="genderReport(3)">Active Entries</button>
                            <button type="button" class="btn  btn-sm" onclick="genderReport(4)">Inactive Entries</button>
                            <button type="button" class="btn btn-sm" onclick="genderReport(5)">Details View</button>
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
                                <th>Gender name</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_gendername">
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
        // load_gender();
    });
    $("#genderForm").submit(function(e){
        e.preventDefault();
        var frm = $("#genderForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Gender/create_gender')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#gendername').val("");
                }else{
                    console.log(data);
                }
                genderReport(1);
            }
        });
    });
    function genderReport(id){
     if(id==1){
         $.ajax({
             type:'post',
             url:"<?= base_url('Gender/report_gender')?>",
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
                         html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                     }
                     $("#load_gendername").html(html);
                 }
             }
         });
     }else if(id==2){
         $.ajax({
             type:'post',
             url:"<?= base_url('Gender/report_gender')?>",
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
                         html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                     }
                     $("#load_gendername").html(html);
                 }
             }
         });
     }else if(id==3){
         $.ajax({
             type:'post',
             url:"<?= base_url('Gender/report_gender')?>",
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
                         html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                     }
                     $("#load_gendername").html(html);
                 }
             }
         });
     }else if(id==4){
         $.ajax({
             type:'post',
             url:"<?= base_url('Gender/report_gender')?>",
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
                         html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                     }
                     $("#load_gendername").html(html);
                 }
             }
         });
     }else if(id==5){
      alert('This report is not available right now');
     }
    }
</script>
