window.addEventListener("load", function () {
    $.ajax({
        url: "logo-url",
        type: "POST",
        data: {
            _token: $("#token").val(),
        },
        dataType: "json",
        success: function (urlLogo) {
            if (!urlLogo[0]) {
                $(".logo_empresa").attr("src", "/storage/w.png");
            } else {
                $(".logo_empresa").attr("src", urlLogo[0]);
            }
            $(".brand-text").html(urlLogo[1]);
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
});
