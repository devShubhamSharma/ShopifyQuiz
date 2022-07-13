<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= $config->admin_assets_url . 'ckeditor-plugin/ckeditor.js' ?>"></script>
<link rel="stylesheet" href="<?= $config->assets_url . 'bootstrap.min.js' ?>">
<script src="<?= $config->assets_url . 'sandbox1.js' ?>"></script>
<script src="<?= $config->assets_url . 'custom.js' ?>"></script>

<script>
    $(document).on("click", ".submit-test", function(e) {
        e.preventDefault();
        submitTest();
    });
    $(document).on("click", ".clear-response", function(e) {
        $(this).parent().addClass("hello");
        $(this).parent().find('input:radio , input:checkbox').each(function() {
            $(this).prop("checked", false);
        });
    });

    function submitTest() {
        //$(".quiz-html").addClass("disabled-div");
        var formData = $("#test-form-submit").serializeArray();
        $.ajax({
            method: "POST",
            url: "/ShopifyQuiz/user/ajaxcall.php",
            data: formData,
            success: function(data) {
                data = JSON.parse(data);
                if (data.status == "success") {
                } else {
                }

            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                console.log('Error - ' + errorMessage);
            }
        });
        console.log(formData);
    }
    //  const onConfirmRefresh = function(event) {
    //     event.preventDefault();
    //     return event.returnValue = "Are you sure you want to leave the page?";
    // }
    //     window.addEventListener("beforeunload", onConfirmRefresh, {
    //     capture: true
    // });
    // let data=performance.getEntriesByType("navigation")[0].type;
    // let data1=performance.getEntriesByType("navigation")[0].TYPE_RELOAD;
    // console.log("ggg ",data);
    // console.log("ggg ",data1);

    // const entries = performance.getEntriesByType("navigation");

    // console.log( entries.map( nav => nav.type ) );
    // console.log( entries.map( nav => nav.TYPE_RELOAD ) );
    // console.log("fff", PerformanceNavigationTiming.TYPE_NAVIGATE);
    // console.log("aaa", PerformanceNavigationTiming.TYPE_RELOAD);
</script>
</body>

</html>