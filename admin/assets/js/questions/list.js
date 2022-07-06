getQuestionList();
var base_url = 'http://localhost/ShopifyQuiz/admin/';

function getQuestionList() {
    let thisInst = $(this);
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/list-question" },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            $(".loader-div").addClass('d-none');
            data = JSON.parse(data);
            if (data.status == "success") {
                let questionhtml = renderList(data.data);
                $(".html-div-queation").html(questionhtml)
            } else {
                console.log(data);
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
}

function renderList(data) {
    const statusArr = ['', 'SSMCQ', 'MSMCQ', 'True/False'];
    const statusArrTitle = ['', 'Single Select Multiple Choice Questions', 'Multi Select Multiple Choice Questions', 'True/False'];
    var html = '';
    if (data.length == 0) {
        html += `<tr>
                    <td colspan="6"> No any question added</td>
                </tr>    `;
    } else {
        let i = 0,
            c = 1;
        for (i = 0; i < data.length; i++) {
            html += `<tr class="render-count-${data[i].q_id}">
                        <td><input type="checkbox" class="q_ids" name="q_ids" value="${data[i].q_id}"> #${c}</td>
                        <td class=""> ${truncate(data[i].question,7)}</td>
                        <td class="" data-bs-toggle="tooltip" data-bs-placement="top" title="${statusArrTitle[data[i].question_type]}">  ${statusArr[data[i].question_type]}</td>
                        <td>
                            <div class="form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked${data[i].q_id}" data-change-status-question change-status-id="${data[i].q_id}"  ${ (data[i].status ==1 ) ? "checked" : ''}>
                            </div>
                        </td>
                        <td class="text-center"> <a class="btn btn-sm btn-primary" href="${base_url}questions/edit.php?qid=${data[i].q_id}" title="edit"> <i class="mdi mdi-lead-pencil"></i></a> </td>
                        <td class="text-center text-danger"> <button class="btn btn-sm btn-danger" data-delete-question delete-item="questions" delete-id="${data[i].q_id}"> <i class="mdi mdi-delete"></i></button></td>
                     </tr>`

            c++;
        }

    }
    return html += `</tr>`;
}

/***
 * 
 * @truncate sentence by words
 * @requiered: String: str, Limit:limit
 */
function truncate(str, limit) {
    return str.split(" ").splice(0, limit).join(" ");
}

/**
 * @function to select all child checkbox:toggle
 */
$(document).on("click", "#q_ids_parent", function(e) {
    let checked_ids = [];
    if ($(this)[0].checked) {
        $(this).parent().parent().parent().parent().find("input[name=q_ids]").prop('checked', true);

    } else {
        $(this).parent().parent().parent().parent().find("input[name=q_ids]").prop('checked', false);
    }
    $("input:checkbox[name=q_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    (checked_ids.length > 0) ? $("#action-with-selected").removeClass("d-none"): $("#action-with-selected").addClass("d-none");
});

$(document).on("click", "input[name=q_ids]", function(e) {
    let checked_ids = [];
    $("input:checkbox[name=q_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    (checked_ids.length > 0) ? $("#action-with-selected").removeClass("d-none"): $("#action-with-selected").addClass("d-none");
})

/**
 * @ change status start
 */
$(document).on("click", "[data-change-status-question]", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/change-status-question", id: $(this).attr("change-status-id") },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            data = JSON.parse(data);
            (data.q_status == '1') ? thisInst.prop('checked', true): thisInst.prop('checked', false);
            $(".resopnse-message").removeClass('d-none').addClass("alert-success").html(data.message);
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
});

/**
 * @ delete questions start
 */

$(document).on("click", "[data-delete-question]", function(e) {
    e.preventDefault();
    let checked_ids = [$(this).attr("delete-id")];
    var myModal = new bootstrap.Modal($("#myModal"), {});
    $(".delete-ids").val(checked_ids);
    myModal.show();
});

/**
 * @ change all status 
 * 
 */
$(document).on("click", ".change-status-all", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    let checked_ids = [];
    $("input:checkbox[name=q_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    if (checked_ids.length == 0) {
        return false;
    }
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/change-status-question-all", id: checked_ids, update_type: thisInst.attr('data-status-action') },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            data = JSON.parse(data);
            if (data.status == 'success') {
                $("#q_ids_parent").prop('checked', false);
                for (let i = 0; i < checked_ids.length; i++) {
                    (thisInst.attr('data-status-action') == 'set-active') ? $("#flexSwitchCheckChecked" + checked_ids[i]).prop('checked', true): $("#flexSwitchCheckChecked" + checked_ids[i]).prop('checked', false);
                    $("#flexSwitchCheckChecked" + checked_ids[i]).parent().parent().parent().find(".q_ids").prop('checked', false);

                }
                $("#action-with-selected").addClass("d-none");
                $(".resopnse-message").removeClass('d-none').addClass("alert-success").html(data.message);
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
});
/**
 * @ delete questions start
 */

$(document).on("click", ".delete-all", function(e) {
    let checked_ids = [];
    var myModal = new bootstrap.Modal($("#myModal"), {});
    if ($("input:checkbox[name=q_ids]:checked").length == 1) {
        checked_ids = [$("input:checkbox[name=q_ids]:checked").val()];
    } else {
        $("input:checkbox[name=q_ids]:checked").each(function() {
            checked_ids.push($(this).val());
        });
    }
    $(".delete-ids").val(checked_ids);
    myModal.show();
});


$(document).on("click", ".confirm-delete", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    let checked_ids = [];
    checked_ids = $(".delete-ids").val().split(",");
    if (checked_ids.length == 0) {
        return false;
    }
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/delete-question", id: checked_ids },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            data = JSON.parse(data);
            if (data.status == 'success') {
                for (var i = 0; i < checked_ids.length; i++) {
                    $(".render-count-" + checked_ids[i]).hide(1000);
                }
                $(".resopnse-message").removeClass('d-none').addClass("alert-success").html(data.message);
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
});