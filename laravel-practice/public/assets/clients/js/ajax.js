$(document).ready(function () {
    $("#users-form-add").on("submit", function (e) {
        e.preventDefault();

        let fullName = $('input[name="fullname"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        console.log(fullName);
        let actionUrl = $(this).attr("action");
        let cstfToken = $(this).find('input[name="_token"]').val();
        $(".error").text("");
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: {
                fullname: fullName,
                email: email,
                _token: cstfToken,
            },
            dataType: "json",
            success: function (data) {
                $(".msg_error").show();

                // data = 'Add users Successfully'
                $(".msg_error").text("Add users Successfully");
            },
            error: function (error) {
                $(".msg_error").show();
                let responJson = error.responseJSON.errors;
                if (Object.keys(responJson).length > 0) {
                    $(".msg_error").text(responJson.msg);
                    for (let key in responJson) {
                        // $('.msg_error').css('display', 'block');
                        $("." + key + "_error").text(responJson[key]);
                    }
                }
            },
        });
    });

    $("#users-form-edit").on("submit", function (e) {
        e.preventDefault();

        let fullName = $('input[name="fullname"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        console.log(fullName);
        let actionUrl = $(this).attr("action");
        let cstfToken = $(this).find('input[name="_token"]').val();
        $(".error").text("");
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: {
                fullname: fullName,
                email: email,
                _token: cstfToken,
            },
            dataType: "json",
            success: function (data) {
                $(".msg_error").show();
                $(".msg_error").text("Update  users Successfully");
            },
            error: function (error) {
                $(".msg_error").show();
                let responJson = error.responseJSON.errors;
                if (Object.keys(responJson).length > 0) {
                    $(".msg_error").text(responJson.msg);
                    for (let key in responJson) {
                        // $('.msg_error').css('display', 'block');
                        $("." + key + "_error").text(responJson[key]);
                    }
                }
            },
        });
    });
});
