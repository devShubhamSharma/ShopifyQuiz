var base_url = window.settings.base_url;
let questionErr = "",
    password = "",
    emailErr = false,
    passcodeErr = false;
const field_err = {};
var error_form = '';

$(document).on("click", ".add-question", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    const formData = $('#form-add-question').serializeArray();
    var ckeditorData = questionEditor.getData();
    formData[formData.length] = { name: "question", value: ckeditorData };
    let q_type = $("#question_type").val();
    field_err['question_error'] = checkQuestion(ckeditorData.trim(), "question");
    switch (q_type) {
        case '1':
            console.log("sss 1 = " + q_type);
            field_err['options_answer1_error'] = checkAnswer('options_answer[]', 'type-1');
            field_err['options1_error'] = checkOption($("#options1").val().trim(), 'options1');
            field_err['options2_error'] = checkOption($("#options2").val().trim(), 'options2');
            field_err['options3_error'] = checkOption($("#options3").val().trim(), 'options3');
            field_err['options4_error'] = checkOption($("#options4").val().trim(), 'options4');
            break;
        case "2":
            console.log("sss 2 = " + q_type)
            field_err['options_answer2_error'] = checkAnswer('options_answer[]', 'type-2');
            field_err['options1_error'] = checkOption($("#options21").val().trim(), 'options21');
            field_err['options2_error'] = checkOption($("#options22").val().trim(), 'options22');
            field_err['options3_error'] = checkOption($("#options23").val().trim(), 'options23');
            field_err['options4_error'] = checkOption($("#options24").val().trim(), 'options24');
            break;
        case "3":
            console.log("sss 3 = " + q_type)
            field_err['options_answer3_error'] = checkAnswer('options_answer[]', 'type-3');
    }
    $.each(field_err, function(i, v) {
        if (v == false) {
            error_form = true;
            return false;
        } else {
            error_form = false;
        }
    });
    if (error_form === false) {
        $.ajax({
            method: "POST",
            url: base_url + "admin/snippet/adminAjaxCall.php",
            data: formData,
            beforeSend: function() {
                thisInst.prop("disabled", true);
                thisInst.html("<i class='fa fa-spinner fa-spin '></i> Adding...");
            },
            success: function(data) {
                data = JSON.parse(data);
                thisInst.prop("disabled", true).html("Question added");
                if (data.status == "success") {
                    $(".add-question-message").parent().addClass("alert-success").removeClass("d-none alert-danger");
                    $(".add-question-message").html(data.message);
                    thisInst.prop("disabled", false).html("Add Question");
                } else {
                    $(".add-question-message").parent().addClass("alert-danger").removeClass("d-none alert-success");
                    $(".add-question-message").html(data.message);
                    thisInst.prop("disabled", false).html("Add Question");
                }

            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                console.log('Error - ' + errorMessage);
            }
        });
    }
});

$(document).on("change", "#question_type", function(e) {
    let select_val = $(this).val();
    switch (select_val) {

        case "1":
            $(".type-1").removeClass('d-none');
            $(".type-1").find("[type]").removeAttr("disabled");

            $(".type-2").addClass('d-none');
            $(".type-2").find("[type]").attr("disabled", true);

            $(".type-3").addClass('d-none');
            $(".type-3").find("[type]").attr("disabled", true);
            break;
        case "2":
            $(".type-1").addClass('d-none');
            $(".type-1").find("[type]").attr("disabled", true);

            $(".type-2").removeClass('d-none');
            $(".type-2").find("[type]").removeAttr("disabled");

            $(".type-3").addClass('d-none');
            $(".type-3").find("[type]").attr("disabled", true);
            break;
        case "3":
            $(".type-1").addClass('d-none');
            $(".type-1").find("[type]").attr("disabled", true);

            $(".type-2").addClass('d-none');
            $(".type-2").find("[type]").attr("disabled", true);

            $(".type-3").removeClass('d-none');
            $(".type-3").find("[type]").removeAttr("disabled");
            break;
    }

});

function checkQuestion(val, id) {
    if (val === '') {
        $("#" + id).parent().find(".error-question").removeClass("valid-feedback")
            .addClass("invalid-feedback d-block")
            .css("display", "block !important")
            .html("*This field is required");
        return false;
    } else {
        $("#" + id).parent().find(".error-question").removeClass("invalid-feedback")
            .addClass("valid-feedback d-block")
            .css("display", "block !important")
            .html("");

        // $("#" + id)
        //     .removeClass("is-invalid")
        //     .addClass("is-valid")
        //     .next()
        //     .removeClass("invalid-feedback")
        //     .addClass("valid-feedback")
        //     .html("");
        return true;
    }

}

function checkAnswer(name, clss) {
    let check_bos_res = $("." + clss).find($("input[name='" + name + "']")).serializeArray().length;
    if (check_bos_res == 0) {
        $("." + clss).find(".form-check-input")
            .removeClass("is-valid")
            .addClass("is-invalid")
        $("." + clss).find(".error-options-answer").addClass('text-danger').html("Please add answer");
        return false;
    } else {
        $("." + clss).find(".form-check-input")
            .removeClass("is-invalid")
        $("." + clss).find(".error-options-answer").removeClass('text-danger').html("");
        return true;
    }
}

function checkOption(val, id) {
    if (val === '') {
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