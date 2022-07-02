getQuestionList();
var base_url = 'http://localhost/ShopifyQuiz/admin/';

function getQuestionList() {
    let thisInst = $(this);
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/list-question" },
        success: function(data) {
            $(".loader-div").remove();
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
                    <td colspan="6"> No any qustion added</td>
                </tr>    `;
    } else {
        let i = 0,
            c = 1;
        for (i = 0; i < data.length; i++) {
            html += `<tr>
                        <td><input type="checkbox" class="q_ids" name="q_ids" value="${data[i].q_id}"> #${c}</td>
                        <td class=""> ${truncate(data[i].question,7)}</td>
                        <td class="" data-bs-toggle="tooltip" data-bs-placement="top" title="${statusArrTitle[data[i].question_type]}">  ${statusArr[data[i].question_type]}</td>
                        <td>
                            <div class="form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"   ${ (data[i].status ==1 ) ? "checked" : ''}>
                            </div>
                        </td>
                        <td class="text-center"> <a class="btn btn-sm btn-primary" href="${base_url}/questions/edit.php?qid=${data[i].q_id}" title="edit"> <i class="mdi mdi-lead-pencil"></i></a> </td>
                        <td class="text-center text-danger"> <button class="btn btn-sm btn-danger" data-delete delete-item="questions" delete-id="${data[i].q_id}"> <i class="mdi mdi-delete"></i></button></td>
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
    if ($(this)[0].checked) {
        $(this).parent().parent().parent().parent().find("input[name=q_ids]").attr("checked", "checked");
        // $("input:checkbox[name=q_ids]:checked").each(function() {
        //     yourArray.push($(this).val());
        // });
    } else {
        $(this).parent().parent().parent().parent().find("input[name=q_ids]").removeAttr("checked", "checked");
    }
})