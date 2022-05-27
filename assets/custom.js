/**
 * prevent reloading
 * 
 */
   



let email = "",
  passcode = "";
let emailErr = false,
  passcodeErr = false;
$(document).on("click", "#submit-test-login-form", function (e) {
  e.preventDefault();
  email = $("#email").val().trim();
  passcode = $("#passcode").val().trim();
  passcodeErr = validatePasscode(passcode, "passcode");
  emailErr = validateEmail(email, "email");
  if (emailErr === true && passcodeErr === true) {
    $("#test-login-form").submit();
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
  } else if (
    !email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ||
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
