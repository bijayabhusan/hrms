<div class="col-sm-10">

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Year</h2>
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
                    <br>
                    <form  class="" id="yearForm" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="yearname" class="control-label mb-1">Add New Year</label>
                            <input type="text" id="year" name="year" class="form-control" aria-required="true" aria-invalid="false">
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                        </div>
                        <div class=" form-group text-right">
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
                            <th>Department name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_year">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--<div class="container" style="margin-top: 14%;min-height: 500px;">-->
<!--    <div class="hd">-->
<!--        <div class="hot">-->
<!---->
<!--            <span class="sun"></span>-->
<!--            <span class="sunx"></span>-->
<!--        </div>-->
<!--        <div class="cloudy">-->
<!--            <span class="cloud"></span>-->
<!--            <span class="cloudx"></span>-->
<!--        </div>-->
<!--        <div class="stormy">-->
<!--            <ul>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--            </ul>-->
<!--            <span class="snowe"></span>-->
<!--            <span class="snowex"></span>-->
<!--            <span class="stick"></span>-->
<!--            <span class="stick2"></span>-->
<!--        </div>-->
<!--        <div class="breezy">-->
<!--            <ul>-->
<!---->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--            </ul>-->
<!--            <span class="cloudr"></span>-->
<!---->
<!---->
<!--        </div>-->
<!--        <div class="night">-->
<!--            <span class="moon"></span>-->
<!--            <span class="spot1"></span>-->
<!--            <span class="spot2"></span>-->
<!--            <ul>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--                <li></li>-->
<!--            </ul>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<script>
    $(function () {
        load_year();
    })
    $("#yearForm").submit(function(e){
        e.preventDefault();
        var frm = $("#yearForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Year/action/')?>",
            data:frm,
            success:function(data){
               if(data!=false){
                   load_year();
               }
            }

        });
    });
    function load_year() {
            $.ajax({
                type:'post',
                url:"<?= base_url('Year/report_year')?>",
                data:{onlyactive:1},
                success:function(data){
                    if(data!=false){
                        jsondata = JSON.parse(data);
                        var j=0;
                        var z = jsondata.length;
                        // alert(z);
                        var html = "";
                        for(var i=0; i<z; i++){
                            j++;
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].year+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                        }
                        $("#load_year").html(html);

                    }
                }

            });
    }
</script>
