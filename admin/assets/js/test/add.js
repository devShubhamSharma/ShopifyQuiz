var base_url = window.settings.base_url;
var numberRegex = /^\d+$/;
let questionErr = "",
    password = "",
    emailErr = false,
    passcodeErr = false;
const field_err = {};
var error_form = '';

$(document).on("click", ".create-test", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    const formData = $('#form-create-test').serializeArray();
    var testTopic = testTopicEditor.getData();
    var testInstruction = testInstructionEditor.getData();
    formData[formData.length] = { name: "topic", value: testTopic };
    formData[formData.length] = { name: "test_instruction", value: testInstruction };
    field_err['topic_error'] = checkQuestion(testTopic.trim(), "test_topic");
    field_err['marks_error'] = validateNumber($("#test_marks").val(), "test_marks");
    field_err['time_error'] = validateNumber($("#test_time").val(), "test_time");
    $.each(field_err, function(i, v) {
        if (v == false) {
            error_form = true;
            return false;
        } else {
            error_form = false;
        }
    });
    //return false;

    if (error_form === false) {
        $.ajax({
            method: "POST",
            url: base_url + "admin/snippet/adminAjaxCall.php",
            data: formData,
            beforeSend: function() {
                thisInst.prop("disabled", true);
                thisInst.html("<i class='fa fa-spinner fa-spin '></i> Creating Test...");
            },
            success: function(data) {
                data = JSON.parse(data);
                thisInst.prop("disabled", true).html("Test created");
                if (data.status == "success") {
                    $(".create-test-message").parent().addClass("alert-success").removeClass("d-none alert-danger");
                    $(".create-test-message").html(data.message);
                    thisInst.prop("disabled", false).html("Create Test");
                } else {
                    $(".create-test-message").parent().addClass("alert-danger").removeClass("d-none alert-success");
                    $(".create-test-message").html(data.message);
                    thisInst.prop("disabled", false).html("Create Test");
                }

            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                console.log('Error - ' + errorMessage);
            }
        });
    }
});



function checkQuestion(val, id) {
    let error_class = id.replace("_", "-");
    if (val === '') {
        $("#" + id).parent().find(".error-" + error_class).removeClass("valid-feedback")
            .addClass("invalid-feedback d-block")
            .css("display", "block !important")
            .html("*This field is required");
        return false;
    } else {
        $("#" + id).parent().find(".error-" + error_class).removeClass("invalid-feedback")
            .addClass("valid-feedback d-block")
            .css("display", "block !important")
            .html("");

        return true;
    }

}

function validateNumber(val, id) {
    console.log(id + ' ' + val);
    let error_class = id.replace("_", "-");
    if (val === '') {
        return true;
        $("#" + id).parent().find(".error-" + error_class).removeClass("valid-feedback")
            .addClass("invalid-feedback d-block")
            .css("display", "block !important")
            .html("*This field is required");
        return false;
    } else if (!val.match(numberRegex)) {
        $("#" + id).parent().find(".error-" + error_class).removeClass("valid-feedback")
            .addClass("invalid-feedback d-block")
            .css("display", "block !important")
            .html("*Only number allowed.");
        return false;

    } else {
        $("#" + id).parent().find(".error-" + error_class).removeClass("invalid-feedback")
            .addClass("valid-feedback d-block")
            .css("display", "block !important")
            .html("");

        return true;
    }
}