$.xhrPool = [];
$.xhrPool.abortAll = function () {
    $(this).each(function (idx, jqXHR) {
        jqXHR.abort();
    });
};

$.ajaxSetup({
    beforeSend: function (jqXHR) {
        $.xhrPool.push(jqXHR);
        $("#loading-mask").show();
    }
});
$(document).ajaxStop(function () {
    $.xhrPool.pop();
    $("#loading-mask").hide();
});

$(document).ajaxError(function () {
    $.xhrPool.abortAll();
});

function CheckAccountLogin() {
    var accountId = 0;
    $.ajax({
        url: '/AccountModule/CheckAccountLogin',
        type: 'POST',
        async: false,
        data: JSON.stringify({}),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (data) {
            if (data.Result == "OK") {
                accountId = data.Data;
            }
            else {
                alert(data.Message);
            }
        },
        error: function () {
        }
    });
    return accountId;
}