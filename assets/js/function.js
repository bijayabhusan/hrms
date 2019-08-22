//editIsactive function is for used for active/deactive
// of all the records which are retrived from database and print on the report part.
function editIsactive(isactive,checkid,updatedid,urlid){
    $.ajax({
        type:'post',
        url:urlid,
        data:{txtid:checkid,isactive:isactive,tableid:updatedid},
        success:function (res) {
            if(res!=false){
                if(isactive==1){
                    $('#action'+checkid).html('<i class="fa fa-toggle-off fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsactive(0,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }else{
                    $('#action'+checkid).html('<i class="fa fa-toggle-on fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsactive(1,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }
            }
        }
    });
}
// report function for
function reportFunction(id) {
    var data = '';
    if(id==1){
        data= '1';
    }else if(id==2){
        data= '2';
    }else if(id==3){
        data= '3';
    }else if(id==4){
        data = '4';
    }
    loadAjaxForReport(data);
}
