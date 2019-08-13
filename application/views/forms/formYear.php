<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Year</div>
                <div class="card-body card-block">
                    <form  class="" id="yearForm" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="yearname" class="control-label mb-1">Add Year</label>
                            <input type="text" id="year" name="year" class="form-control" aria-required="true" aria-invalid="false">
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
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
                    <div class="table">
                        <table class="table table-striped">
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
