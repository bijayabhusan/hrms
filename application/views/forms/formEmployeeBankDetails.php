    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Employee Bank Details</h2>

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
                    <form  class="" id="frmBankDetails" name="frmBankDetails" autocomplete="off">
                        <div class="form-group">
                            <label for="" class="control-label mb-1">Employee Name</label>
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <input type="hidden" id="isactive" name="isactive" value="1">
                            <select id="employeename" name="employeename" class="form-control" aria-required="true" aria-invalid="false" >
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employeebankname" class="control-label mb-1">Bank Name</label>
                            <select id="employeebankname" name="employeebankname" class="form-control" aria-required="true" aria-invalid="false" >
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bankaccountnumber" class="control-label mb-1">A/C Number</label>
                            <input id="bankaccountnumber" name="bankaccountnumber" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter account number.">
                        </div>
                        <div class="form-group">
                            <label for="bankifscnumber" class="control-label mb-1">IFSC Number</label>
                            <input id="bankifscnumber" name="bankifscnumber" type="text" AUTOCAPITALIZE="characters" class="form-control" aria-required="true" aria-invalid="false" minlength="12" maxlength="12" placeholder="Enter ifsc code.">
                        </div>
                        <div class="form-actions form-group text-center ">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
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
                            <th>Employee name</th>
                            <th>Bank name</th>
                            <th>A/C Number</th>
                            <th>IFSC Code</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_bank_employee">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        // load_employee_bank_details();
        load_employee();
    });
    $("#frmBankDetails").submit(function(e){
        e.preventDefault();
        var frm = $("#frmBankDetails").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Employee/employee_bank_details')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $("#bankaccountnumber").val('').focus();
                    $("#bankifscnumber").val('');
                }else{
                    console.log(data);
                }
                recentEntries();
            }
        });
    });
    function load_employee(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/load_employee')?>",
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#employeename").html(data);
                    load_banks();
                }
            }
        });
    }
    function load_banks(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Bank/load_bank')?>",
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#employeebankname").html(data);
                }
            }
        });
    }
    $("#stateid").change(function () {
        load_district();
    });
    function recentEntries(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_bank_details/1')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].bankid+"</td><td>"+ jsondata[i].acno+"</td><td>"+ jsondata[i].ifsccode+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_bank_employee").html(html);
                }
            }
        });
    }
    function allEntries(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_bank_details')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].bankid+"</td><td>"+ jsondata[i].acno+"</td><td>"+ jsondata[i].ifsccode+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_bank_employee").html(html);
                }
            }
        });
    }
    function activeEntries(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_bank_details')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].bankid+"</td><td>"+ jsondata[i].acno+"</td><td>"+ jsondata[i].ifsccode+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_bank_employee").html(html);
                }
            }
        });
    }
    function inactiveEntries(){
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_bank_details')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].bankid+"</td><td>"+ jsondata[i].acno+"</td><td>"+ jsondata[i].ifsccode+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_bank_employee").html(html);
                }
            }
        });
    }
</script>
