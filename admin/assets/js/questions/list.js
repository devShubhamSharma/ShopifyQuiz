getQuestionList();

function getQuestionList() {
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: formData,
        beforeSend: function() {
            thisInst.prop("disabled", true);
            thisInst.html("<i class='fa fa-spinner fa-spin '></i> Adding...");
        },
        success: function(data) {
            data = JSON.parse(data);
            thisInst.prop("disabled", true).html("Question added");
            if (data.status == "success") {
                $(".add-question-message")
                    .parent()
                    .addClass("alert-success")
                    .removeClass("d-none text-danger");
                $(".add-question-message").html(data.message);
                thisInst.prop("disabled", false).html("Add Question");
            } else {
                $(".add-question-message")
                    .parent()
                    .addClass("alert-danger")
                    .removeClass("d-none alert-success");
                $(".add-question-message").html(data.message);
                thisInst.prop("disabled", false).html("Add Question");
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
}