$(document).on("click", ".view-test-responsive", function(e) {
    var thisInst = $(this);
    let score_id = $(this).attr("data-score-id");
    if (thisInst.parent().parent().find(".html-added").length > 0) {
        return false;
    }
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/admin/snippet/adminAjaxCall.php",
        data: { action: "admin/list-test-response", score_id: score_id },
        beforeSend: function() {
            $(".card-body").addClass("disabled-div");
        },
        success: function(data) {
            $(".card-body").removeClass("disabled-div");
            $(".loader-div").addClass("d-none");

            data = JSON.parse(data);
            if (data.status == "success") {
                let testhtml = renderTestResponse(data.data.question_response);
                thisInst.parent().parent().find(".html-test-response").addClass("html-added disabled-div").html(testhtml);
            } else {
                console.log(data);
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
});

function renderTestResponse(data) {
    var html = "";
    if (data.length == 0) {
        html += `<tr>
                    <td colspan="6"> No any response found.</td>
                </tr>`;
    } else {
        let i = 0,
            c = 1;
        for (i = 0; i < data.length; i++) {
            var question = $("<div/>").html(data[i].question_data.question).text();

            html += `
            
            <style>
                            #one-${c}:checked~label.first,
                            #two-${c}:checked~label.second,
                            #three-${c}:checked~label.third,
                            #four-${c}:checked~label.forth,
                            #five-${c}:checked~label.fifth,
                            #six-${c}:checked~label.sixth,
                            #seven-${c}:checked~label.seveth,
                            #eight-${c}:checked~label.eighth {
                                border-color: #8e498e
                            }

                            #one-${c}:checked~label.first .circle,
                            #two-${c}:checked~label.second .circle,
                            #three-${c}:checked~label.third .circle,
                            #four-${c}:checked~label.forth .circle,
                            #five-${c}:checked~label.fifth .circle,
                            #six-${c}:checked~label.sixth .circle,
                            #seven-${c}:checked~label.seveth .circle,
                            #eight-${c}:checked~label.eighth .circle {
                                border: 6px solid #8e498e;
                                background-color: #fff
                            }

                            #one-${c}:checked~label.first .checkbox,
                            #two-${c}:checked~label.second .checkbox,
                            #three-${c}:checked~label.third .checkbox,
                            #four-${c}:checked~label.forth .checkbox,
                            #five-${c}:checked~label.fifth .checkbox,
                            #six-${c}:checked~label.sixth .checkbox,
                            #seven-${c}:checked~label.seveth .checkbox,
                            #eight-${c}:checked~label.eighth .checkbox {
                                border: 6px solid #8e498e;
                                background-color: #fff
                            }
                        </style>
            
            <div class="card ck-content mt-3" style="background: aliceblue">
                        <div class="card-header d-flex card-title">
                            <p class="">${c}. </p> &nbsp;<p>${question}</p>
                        </div>`;
            // var option_data = data[i].option_data.q_option;
            var option_data = unserialize($("<div/>").html(data[i].option_data.q_option).text());
            var answer_option = unserialize($("<div/>").html(data[i].answer_data.answer_option).text());
            var given_answer = data[i].given_answer;
            switch (data[i].question_data.question_type) {
                case "1":
                    html += `<div class="card-body count-${c}">
                                <div>
                                <input type="checkbox" name="box" disabled id="one-${c}" ${ (jQuery.inArray('1',given_answer) !==-1) ? 'checked':''}>
                                <input type="checkbox" name="box" disabled id="two-${c}" ${ (jQuery.inArray('2',given_answer) !==-1) ? 'checked':''}>
                                <input type="checkbox" name="box" disabled id="three-${c}" ${ (jQuery.inArray('3',given_answer) !==-1) ? 'checked':''}>
                                <input type="checkbox" name="box" disabled id="four-${c}" ${ (jQuery.inArray('4',given_answer) !==-1) ? 'checked':''}>
                                
                                    <label for="one-${c}" class="box first">
                                        <div class="course"> <span class="circle"></span> <span class="subject">${option_data[0]} </span> </div>
                                    </label> <label for="two-${c}" class="box second">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> ${option_data[1]} </span> </div>
                                    </label> <label for="three-${c}" class="box third">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> ${option_data[2]} </span> </div>
                                    </label> <label for="four-${c}" class="box forth">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> ${option_data[3]} </span> </div>
                                    </label>
                                </div>
                            </div>`;
                    break;
                case "2":
                    html += `<div class="card-body  count-${c}">
                                <div>
                                    <input type="checkbox" name="box" id="one-${c}" ${ (jQuery.inArray('1',given_answer) !==-1) ? 'checked':''}>
                                    <input type="checkbox" name="box" id="two-${c}" ${ (jQuery.inArray('2',given_answer) !==-1) ? 'checked':''}>
                                    <input type="checkbox" name="box" id="three-${c}" ${ (jQuery.inArray('3',given_answer) !==-1) ? 'checked':''}>
                                    <input type="checkbox" name="box" id="four-${c}" ${ (jQuery.inArray('4',given_answer) !==-1) ? 'checked':''}>
                                    <label for="one-${c}" class="box first">
                                        <div class="course"> <span class="checkbox"></span> <span class="subject">${option_data[0]} </span> </div>
                                    </label> <label for="two-${c}" class="box second">
                                        <div class="course"> <span class="checkbox"></span> <span class="subject"> ${option_data[1]} </span> </div>
                                    </label> <label for="three-${c}" class="box third">
                                        <div class="course"> <span class="checkbox"></span> <span class="subject"> ${option_data[2]} </span> </div>
                                    </label> <label for="four-${c}" class="box forth">
                                        <div class="course"> <span class="checkbox"></span> <span class="subject"> ${option_data[3]} </span> </div>
                                    </label>
                                </div>
                            </div>`;
                    break;
                case "3":
                    html += `<div class="card-body  count-${c}">
                                <div>
                                    <input type="checkbox" name="box" id="one-${c}" ${ (jQuery.inArray('True',given_answer) !==-1) ? 'checked':''}>
                                    <input type="checkbox" name="box" id="two-${c}" ${ (jQuery.inArray('False',given_answer) !==-1) ? 'checked':''}>
                                    <label for="one-${c}" class="box first">
                                        <div class="course"> <span class="circle"></span> <span class="subject">${option_data[0]} </span> </div>
                                    </label> <label for="two-${c}" class="box second">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> ${option_data[1]} </span> </div>
                                    </label> 
                                </div>
                            </div>`;
                    break;
            }

            html += `
            <div class="card-footer">Correct Answer: ${  myGFG(answer_option)}</div>
            
            </div>`;

            c++;
        }

        // <td class="text-center"> <a class="btn btn-sm btn-primary" href="${admin_url}test/edit.php?qid=${data[i].test_id}" title="edit"> <i class="mdi mdi-lead-pencil"></i></a> </td>
        // <td class="text-center text-danger"> <button class="btn btn-sm btn-danger" data-delete-test delete-item="test" delete-id="${data[i].test_id}"> <i class="mdi mdi-delete"></i></button></td>
    }
    return html;
}

function myGFG(data) {
    var res = [];
    $.each(data, function(i, v) {
        res.push(v)
    });

    return res;
}