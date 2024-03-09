function printErrorMsg(msg) {
    $.each(msg.responseJSON.errors, function (key, value) {
        $("body").find(".error-" + key).html(value);
        $("body").find(".error-" + key).removeClass('d-none');
    });
}
