<?php
$config = include('../config.php');
include('snippet/header.php');
include('snippet/side-header.php');
function random_color_part()
{
    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}

function random_color()
{
    return random_color_part() . random_color_part() . random_color_part();
}
$arrayLink = ["Add New Question" => $config->admin_url . 'questions/add.php', "List all Question" => $config->admin_url . 'questions/list.php', "Create new test" => $config->admin_url . 'test/add.php', "View all test" => $config->admin_url . 'test/list.php'];
?>

<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="transaparent-tab-border"></div>
            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if (count($arrayLink) > 0) {
                                            foreach ($arrayLink as $linktitle => $linkUrl) {
                                        ?>
                                                <div class="col-lg-3 mb-3">
                                                    <a href="<?= $linkUrl ?>" type="button" data-ss="<?= random_color() ?> " class="btn btn-primary btn-rounded btn-fw" style="background: #<?= random_color() ?>"><?= $linktitle ?></a>
                                                </div>
                                        <?php }
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('snippet/footer.php') ?>