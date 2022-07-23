<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php');
include_once("../Test.php");
$getToData = json_decode(base64_decode($_GET['id']), true);
$data = $testObj->getTestorUser($getToData);
echo "<pre>";
print_r($getToData);
print_r($data);
echo "</pre>";
?>
<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Test Description : <?= $getToData['email_id'] ?> </h2>
    </div>
    <div class="row">
        <div class="accordion" id="accordionExample">
            <?php foreach ($data['data'] as $index => $val) { ?>
                <div class="accordion-item mt-2">
                    <h2 class="accordion-header" id="headingOne<?= $index ?>">
                        <button class="accordion-button <?= ($index == 0) ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $index ?>" aria-expanded="<?= ($index == 0) ? 'true' : '' ?>" aria-controls="collapseOne<?= $index ?>">
                            #<?=$index+1?> Date: <?= date('M j Y g:i A', strtotime($val['created_at']))?>
                        </button>
                    </h2>
                    <div id="collapseOne<?= $index ?>" class="accordion-collapse collapse <?= ($index == 0) ? 'show' : '' ?> " aria-labelledby="headingOne<?= $index ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            <!---sub accordion start-->
                            <div class="accordion" id="accordionExample-sub-<?=$index+1 ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne-sub-<?= $index+1 ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-sub-<?= $index+1 ?>" aria-expanded="false" aria-controls="collapseOne-sub-<?= $index+1 ?>">
                                           View Test response
                                        </button>
                                    </h2>
                                    <div id="collapseOne-sub-<?= $index+1 ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?= $index+1 ?>" data-bs-parent="#accordionExample-sub-<?= $index+1 ?>">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---sub accordion end-->
                        </div>
                    </div>
                </div>
            <?php } ?>

            
        </div>
    </div>
    <!-- Vertically centered modal -->

    <?php include('../snippet/footer.php') ?>