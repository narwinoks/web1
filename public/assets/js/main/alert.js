function showAlert(msg, color) {
    var notification = $.notify(
        {
            message: msg,
        },
        {
            type: color,
            offset: {
                x: 15,
                y: 68,
            },
        }
    );
    notification.$ele.find('[data-notify="dismiss"]').css('display', 'none');
}
