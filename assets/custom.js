/**
 * prevent reloading
 *
 */
var base_url = window.settings.base_url;
let email = "",
    passcode = "",
    emailErr = false,
    passcodeErr = false;
$(document).on("click", "#submit-test-login-form", function(e) {
    e.preventDefault();
    let thisInst = $(this);
    email = $("#email").val().trim();
    passcode = $("#passcode").val().trim();
    passcodeErr = validatePasscode(passcode, "passcode");
    emailErr = validateEmail(email, "email");
    if (emailErr === true && passcodeErr === true) {
        let formData = $("#test-login-form").serialize();
        $.ajax({
            method: "POST",
            url: base_url + "user/ajaxcall.php",
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
                    window.location = "quiz-test.php";
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

function validatePasscode(passcode, id) {
    if (passcode === "") {
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