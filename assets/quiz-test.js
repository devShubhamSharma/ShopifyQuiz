$(document).on("click", ".submit-test", function(e) {
    e.preventDefault();
    submitTest();
});
$(document).on("click", ".clear-response", function(e) {
    $(this)
        .parent()
        .find("input:radio , input:checkbox")
        .each(function() {
            $(this).prop("checked", false);
        });
});

function submitTest() {
    $(".quiz-html").addClass("disabled-div");
    var formData = $("#test-form-submit").serializeArray();
    $.ajax({
        method: "POST",
        url: "/ShopifyQuiz/user/ajaxcall.php",
        data: formData,
        success: function(data) {
            data = JSON.parse(data);
            if (data.status == "success") {
                $(".test-message").removeClass("d-none");
                $(".countdown-timer").remove();
                $("#quiz-div").remove();
                $(".instruction-div").remove();
            } else {}
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ": " + xhr.statusText;
            console.log("Error - " + errorMessage);
        },
    });
    console.log(formData);
}

/**
 * disable right click
 */
document.addEventListener(
    "contextmenu",
    function(e) {
        e.preventDefault();
    },
    false
);
/**
 * disable right click end
 */

/**
 * disable slelection
 */
const disableselect = (e) => {
    return false;
};

document.onselectstart = disableselect;
document.onmousedown = disableselect;

/**
 * disable slelection END
 */

/**
 * detect multiple window
 */
localStorage.openpages = Date.now();
window.addEventListener(
    "storage",
    function(e) {
        if (e.key == "openpages") {
            // Listen if anybody else is opening the same page!
            localStorage.page_available = Date.now();
        }
        if (e.key == "page_available") {
            // $(".test-message").children().addClass("hello");
            $(".test-message").children().removeClass('alert-success').addClass("alert-danger");
            $(".test-message").children().html("Error! : Multiple window open.");
            validatepageOpen();
        }
    },
    false
);
/**
 * detect multiple window end
 */

countdownTimeStart();

function countdownTimeStart() {
    var timeCounter = testTime * 60 * 1000;
    var x = setInterval(function() {
        var now = new Date().getTime();
        timeCounter -= 1000;
        var hours = Math.floor(
            (timeCounter % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((timeCounter % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeCounter % (1000 * 60)) / 1000);
        document.getElementById("countdown").innerHTML =
            hours + "h " + minutes + "m " + seconds + "s ";
        if (timeCounter < 0) {
            clearInterval(x);
            submitTest()
            document.getElementById("countdown").innerHTML = "TEST END";
        }
    }, 1000);
}

function validatepageOpen() {
    $(".test-message").removeClass("d-none");
    $(".countdown-timer").remove();
    $("#quiz-div").remove();
}

const entries = performance.getEntriesByType("navigation");
if (entries.map(nav => nav.type) == 'reload') {
    $(".test-message").children().removeClass('alert-success').addClass("alert-danger");
    $(".test-message").children().html("Error! : Window reloaded.");
    validatepageOpen();

}