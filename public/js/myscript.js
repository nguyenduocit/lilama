/**
 * Created by NguyenVan on 05/08/2016.
 */

function preview(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#form img").remove();
            $("#image").after('<img src="'+e.target.result+'" width="200" heigth="200" >');
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$("#image").change(function(){

    preview(this);
});

(function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#image').checkFileType({
        allowedExtensions: ['jpg', 'jpeg','png','gif'],
        success: function() {
        },
        error: function() {
            alert('Không phải định dạng file img');
        }
    });

});
$(function() {
    $('#image_list').checkFileType({
        allowedExtensions: ['jpg', 'jpeg','png','gif'],
        success: function() {
        },
        error: function() {
            alert('Không phải định dạng file img');
        }
    });

});