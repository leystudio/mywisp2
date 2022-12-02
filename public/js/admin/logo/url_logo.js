function url_logo() {
    $.ajax({
        url: "logo-url",
        type: "POST",
        data: {
            _token: $("#token").val(),
        },
        dataType: "json",
        success: function (urlLogo) {
            $(".logo_emp").attr("src", urlLogo[0]);
        },
        error: function (jqXHR, exception) {
            //si la session se perdio->
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
}
