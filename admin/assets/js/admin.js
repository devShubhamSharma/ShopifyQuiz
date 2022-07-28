/**
 * prevent reloading
 *
 */
var base_url = window.settings.admin_url
let email = "",
    password = "",
    emailErr = false,
    passcodeErr = false;
$(document).on("click", "#submit_admin_login_form", function(e) {
    e.preventDefault();
    let thisInst = $(this);
    email = $("#email").val().trim();
    password = $("#password").val().trim();
    passcodeErr = validatePasscode(password, "password");
    emailErr = validateEmail(email, "email");
    if (emailErr === true && passcodeErr === true) {
        let formData = $("#admin_login_form").serialize();
        $.ajax({
            method: "POST",
            url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
            data: formData,
            beforeSend: function() {
                thisInst.prop("disabled", true);
                thisInst.html("<i class='fa fa-spinner fa-spin '></i> Logging...");
            },
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                thisInst.prop("disabled", true).html("Login success...");
                if (data.status == "success") {
                    window.location = base_url + "dashboard.php";
                } else {
                    $(".login-error")
                        .html(data.message)
                        .removeClass("d-none")
                        .addClass("d-block");
                    thisInst.prop("disabled", false).html("Submit");
                }
            },
        });
        //$("#test-login-form").submit();
    }
});

function validateEmail(email, id) {
    if (email === "") {
        $("#" + id)
            .removeClass("is-valid")
            .addClass("is-invalid")
            .next()
            .removeClass("valid-feedback")
            .addClass("invalid-feedback")
            .html("*This field is required.");
        return false;
    } else if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ||
        email.match(/^[0-9]/)
    ) {
        $("#" + id)
            .removeClass("is-valid")
            .addClass("is-invalid")
            .next()
            .removeClass("valid-feedback")
            .addClass("invalid-feedback")
            .html("*Please enter valid email id.");
        return false;
    } else {
        $("#" + id)
            .removeClass("is-invalid")
            .addClass("is-valid")
            .next()
            .removeClass("invalid-feedback")
            .addClass("valid-feedback")
            .html("");
        return true;
    }
}

function validatePasscode(password, id) {
    if (password === "") {
        $("#" + id)
            .removeClass("is-valid")
            .addClass("is-invalid")
            .next()
            .removeClass("valid-feedback")
            .addClass("invalid-feedback")
            .html("*This field is required.");
        return false;
    } else {
        $("#" + id)
            .removeClass("is-invalid")
            .addClass("is-valid")
            .next()
            .removeClass("invalid-feedback")
            .addClass("valid-feedback")
            .html("");
        return true;
    }
}