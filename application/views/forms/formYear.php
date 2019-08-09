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
                            <input type="text" id="yearname" name="yearname" class="form-control" aria-required="true" aria-invalid="false">
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
                        <table>
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#yearForm").submit(function(e){
        e.preventDefault();
        var frm = $("#yearForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Year/create_year')?>",
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
</script>
