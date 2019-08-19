    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create New Company</h2>

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
                    <form  class="" id="newCompanyForm" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="companyname" class="control-label mb-1">Company Name</label>
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                    <input id="companyname" name="companyname" type="text" onclick="charachters_validate('companyname')" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="60" placeholder="Enter company name" required>
                                    <small class="errormsg_companyname"></small>
                                </div>
                                <div class="form-group">
                                    <label for="companytype" class="control-label mb-1">Company Type</label>
                                    <select id="companytype" name="companytype" class="form-control" aria-required="true" aria-invalid="false" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="companyshortname" class="control-label mb-1">Company Short Name</label>
                                    <input id="companyshortname" name="companyshortname" type="text" onclick="charachters_validate('companyshortname')" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="5" placeholder="Enter company short name" required>
                                    <small class="errormsg_companyshortname"></small>
                                </div>
                                <div class="form-group">
                                    <label for="establishedon" class="control-label mb-1">Established On</label>
                                    <input id="establishedon" name="establishedon" type="date" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="form-group">
                                    <label for="gstno" class="control-label mb-1">GST Number</label>
                                    <input id="gstno" name="gstno" type="text" onclick="alfa_numeric('gstno')" class="form-control" aria-required="true" aria-invalid="false" minlength="15" maxlength="15" placeholder="Enter GST number" autocapitalize="characters" required>
                                    <small class="errormsg_gstno"></small>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Address</label>
                                    <textarea id="address" name="address" onclick="alfa_numeric('address')" rows="1" class="form-control text-area" aria-required="true" aria-invalid="false" placeholder="Enter company address" required autocomplete="off"></textarea>
                                    <small class="errormsg_address"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state" class="control-label mb-1">State</label>
                                    <select id="stateid" name="stateid" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="distid" class="control-label mb-1">District</label>
                                    <select id="distid" name="distid" class="form-control" aria-required="true" aria-invalid="false" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pincode" class="control-label mb-1 errlable">Pincode</label>
                                    <input id="pincode" name="pincode" type="text" onclick="number_validate('pincode')" class="form-control"  aria-required="true" aria-invalid="false" minlength="6" maxlength="6"   placeholder="Enter pincode" required autocomplete="off">
                                    <small class="errormsg_pincode"></small>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="control-label mb-1">Url</label>
                                    <input id="url" name="url" type="text" onclick="url_validate('url')" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter company url" required>
                                    <small class="errormsg_url"></small>
                                </div>
                                <div class="form-group">
                                    <label for="companyemail" class="control-label mb-1">email</label>
                                    <input id="companyemail" name="companyemail" type="email" onclick="email_validate('companyemail')" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter company email" required>
                                    <small class="errormsg_companyemail"></small>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="control-label mb-1">Mobile</label>
                                    <input id="mobile" name="mobile" type="text" onclick="number_validate('mobile')" class="form-control" aria-required="true" aria-invalid="false" minlength="10" maxlength="10" placeholder="Enter company contact number" required>
                                    <small class="errormsg_mobile"></small>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions form-group text-center ">
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
                            <th>Company Name</th>
                            <th>Company Short Name</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>GST Number</th>
                            <th>URL</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_company">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        load_company_type();
        load_state();
        // load_company_report();
        $('#gstno').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });
    });
    $("#newCompanyForm").submit(function(e){
        $("#newCompany_report").show();
        e.preventDefault();
        var frm = $("#newCompanyForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/create_company')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                }else{
                    console.log(data);
                }
            }
        });
    });

    function load_company_type(){

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
    function load_state(){

        $.ajax({
            type:'post',
            url: "<?= base_url('State/load_state')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#stateid").html(data);
                }
            }

        });
    }
    $('#stateid').change(function () {
        load_district();
    });
    function load_district(){
        var stateid = $("#stateid").val();
        $.ajax({
            type:'post',
            url: "<?= base_url('District/load_district')?>",
            data:{stateid:stateid},
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#distid").html(data);
                }
            }

        });
    }
    $("#companytype").change(function () {
        recentEntries();
    });
    function recentEntries(){
        $("#newCompany_report").show();
        var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/report_company/1')?>",
            data:{typeid:companyid},
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_company").html(html);
                }else{
                    $("#newCompany_report").hide();
                }
            }
        });
    }
    function allEntries(){
        $("#newCompany_report").show();
        var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/report_company')?>",
            data:{typeid:companyid},
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_company").html(html);
                }
            }
        });
    }
    function activeEntries(){
        $("#newCompany_report").show();
        var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/report_company')?>",
            data:{typeid:companyid,onlyactive:1},
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_company").html(html);
                }
            }
        });
    }
    function inactiveEntries(){
        $("#newCompany_report").show();
        var companyid = $("#companytype").val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/report_company')?>",
            data:{typeid:companyid,onlyinactive:1},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";s
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td><td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_company").html(html);
                }else{
                    $("#newCompany_report").hide();
                }
            }
        });
    }
</script>
