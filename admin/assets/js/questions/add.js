$(document).on("click", ".add-question", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    let formData = $('#form-add-question').serializeArray();
    console.log(formData);

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
            // data = JSON.parse(data);
            thisInst.prop("disabled", true).html("Login success...");
            if (data.status == "success") {
                window.location = "dashboard.php";
            } else {
                $(".login-error")
                    .html(data.message)
                    .removeClass("d-none")
                    .addClass("d-block");
                thisInst.prop("disabled", false).html("Submit");
            }
        },
    });
});

$(document).on("change", "#question_type", function(e) {
    let select_val = $(this).val();
    console.log(select_val);
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