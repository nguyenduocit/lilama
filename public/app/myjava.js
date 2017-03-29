/**
 * Created by NguyenVan on 09/09/2016.
 */
$(document).ready(function () {
    $('#showcheck').hide();
    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            $('#showcheck').show();
        }
        else if($(this).prop("checked") == false){
            $('#showcheck').hide();
        }
    });
})