var admin_url = window.settings.admin_url;
var base_url = window.settings.base_url;
gettestList();

function gettestList() {
    let thisInst = $(this);
    var test_code = $("#test_code").val();
    $.ajax({
        method: "POST",
        url: base_url + "admin/snippet/adminAjaxCall.php",
        data: { action: "admin/list-test-by-code", test_code: test_code },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            $(".loader-div").addClass('d-none');
            data = JSON.parse(data);
            if (data.status == "success") {
                let testhtml = renderList(data.data);
                $(".html-div-test").html(testhtml)
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
    var test_code = $("#test_code").val();
    console.log(test_code);
    var html = '';
    if (data.length == 0) {
        html += `<tr>
                    <td colspan="6"> No any test added</td>
                </tr>    `;
    } else {
        let i = 0,
            c = 1;
        for (i = 0; i < data.length; i++) {
            var email = $("<div/>").html(data[i].email_id).text();
            const idntestCode = { "test_code": data[i].test_code, "email_id": email }
            console.log(btoa(JSON.stringify(idntestCode)))

            html += `<tr class="render-count-${i}">
                        <td><input type="hidden" class="test_ids" name="test_ids" value="${data[i].email_id}"> #${c}</td>
                        <td class="">${email}</a></td>
                        <td class="" data-bs-toggle="tooltip" data-bs-placement="top"> ${data[i].times}</td>
                        <td><a href="${admin_url}test/view-test-by-user.php?id=${btoa(JSON.stringify(idntestCode))}" class="btn text-primary"> <i class="mdi mdi-eye"></i></a></td>
                        <td>
                            <div class="form-switch">
                                <input class="form-check-input" data-bs-toggle="tooltip" data-bs-placement="top" title="change status" type="checkbox" id="flexSwitchCheckChecked${c}" data-change-status-test change-status-id="${data[i].last_test_id}" change-status-test-code="${data[i].test_code}"  ${ (data[i].is_allow ==1 ) ? "checked" : ''}>
                            </div>
                        </td>
                        
                     </tr>`

            c++;
        }

        // <td class="text-center"> <a class="btn btn-sm btn-primary" href="${admin_url}test/edit.php?qid=${data[i].test_id}" title="edit"> <i class="mdi mdi-lead-pencil"></i></a> </td>
        // <td class="text-center text-danger"> <button class="btn btn-sm btn-danger" data-delete-test delete-item="test" delete-id="${data[i].test_id}"> <i class="mdi mdi-delete"></i></button></td>
    }
    return html += `</tr>`;
}

/***
 * 
 * @truncate sentence by words
 * @requiered: String: str, Limit:limit
 */
function truncate(str, limit) {
    const strArr = str.split(" ");
    return strtruncate = (strArr.length <= limit) ? strArr.splice(0, limit).join(" ") : strArr.splice(0, limit).join(" ") + "...";
}

/**
 * @function to select all child checkbox:toggle
 */
$(document).on("click", "#test_ids_parent", function(e) {
    let checked_ids = [];
    if ($(this)[0].checked) {
        $(this).parent().parent().parent().parent().find("input[name=test_ids]").prop('checked', true);

    } else {
        $(this).parent().parent().parent().parent().find("input[name=test_ids]").prop('checked', false);
    }
    $("input:checkbox[name=test_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    (checked_ids.length > 0) ? $("#action-with-selected").removeClass("d-none"): $("#action-with-selected").addClass("d-none");
});

$(document).on("click", "input[name=test_ids]", function(e) {
    let checked_ids = [];
    $("input:checkbox[name=test_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    (checked_ids.length > 0) ? $("#action-with-selected").removeClass("d-none"): $("#action-with-selected").addClass("d-none");
})

/**
 * @ change status start
 */
$(document).on("click", "[data-change-status-test]", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    $.ajax({
        method: "POST",
        url: base_url + "admin/snippet/adminAjaxCall.php",
        data: { action: "admin/allow-test", id: $(this).attr("change-status-id") },
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
 * @ delete test start
 */

$(document).on("click", "[data-delete-test]", function(e) {
    e.preventDefault();
    let checked_ids = [$(this).attr("delete-id")];
    var myModal = new bootstrap.Modal($("#myModal"), {});
    myModal.show();
    $(".delete-ids").val(checked_ids);
});

/**
 * @ change all status 
 * 
 */
$(document).on("click", ".change-status-all", function(e) {
    e.preventDefault();
    var thisInst = $(this);
    let checked_ids = [];
    $("input:checkbox[name=test_ids]:checked").each(function() {
        checked_ids.push($(this).val());
    });
    if (checked_ids.length == 0) {
        return false;
    }
    $.ajax({
        method: "POST",
        url: base_url + "admin/snippet/adminAjaxCall.php",
        data: { action: "admin/change-status-test-all", id: checked_ids, update_type: thisInst.attr('data-status-action') },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            data = JSON.parse(data);
            if (data.status == 'success') {
                $("#test_ids_parent").prop('checked', false);
                for (let i = 0; i < checked_ids.length; i++) {
                    (thisInst.attr('data-status-action') == 'set-active') ? $("#flexSwitchCheckChecked" + checked_ids[i]).prop('checked', true): $("#flexSwitchCheckChecked" + checked_ids[i]).prop('checked', false);
                    $("#flexSwitchCheckChecked" + checked_ids[i]).parent().parent().parent().find(".test_ids").prop('checked', false);

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
 * @ delete test start
 */

$(document).on("click", ".delete-all", function(e) {
    let checked_ids = [];
    var myModal = new bootstrap.Modal($("#myModal"), {});
    if ($("input:checkbox[name=test_ids]:checked").length == 1) {
        checked_ids = [$("input:checkbox[name=test_ids]:checked").val()];
    } else {
        $("input:checkbox[name=test_ids]:checked").each(function() {
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
    var myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('myModal'));
    myModal.hide();
    checked_ids = $(".delete-ids").val().split(",");
    if (checked_ids.length == 0) {
        return false;
    }
    $.ajax({
        method: "POST",
        url: base_url + "admin/snippet/adminAjaxCall.php",
        data: { action: "admin/delete-test", id: checked_ids },
        beforeSend: function() {
            $(".card-body").addClass('disabled-div');
        },
        success: function(data) {
            $(".card-body").removeClass('disabled-div');
            data = JSON.parse(data);
            if (data.status == 'success') {
                for (var i = 0; i < checked_ids.length; i++) {
                    $(".render-count-" + checked_ids[i]).hide(1000).remove();
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

$(document).on("click", ".mdi-content-copy", function() {

    let txtCpy = $(this).parent().find(".cpytxt").val();
    console.log(txtCpy);
    copyToClipboard(txtCpy);
});

function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
}