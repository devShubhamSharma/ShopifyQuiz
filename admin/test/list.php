<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php');
include_once("../Test.php");
$data = $testObj->listAllTest();
$testData = $data['data'];
echo "<pre>";
print_r($data);
echo "</pre>";
?>
<style>
    .card:hover {
        border: 1px solid #1a1aff;
        -webkit-transform: translateY(-10px);
        transform: translateY(-10px);
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> All Test </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="transaparent-tab-border"></div>
            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="row">
                            <?php $count=1; foreach ($testData as $index => $val) { 
                                if($val['email_id'] !='') {?>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-5">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h2 class="card-title text-right" style="text-transform: unset"><?= $val['email_id']?><sup> (2)</sup></h2>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div class="card-body card-p">
                                            <div class="row">
                                                <div class="col col-xs-4 ">
                                                    <i class="far fa-comments"></i> 456
                                                </div>
                                                <div class="col col-xs-4 ">
                                                    <i class="far fa-heart"></i> 2.4k
                                                </div>
                                                <div class="col col-xs-4">
                                                    <i class="fas fa-share"></i> 99
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $count++; } } ?>
                            
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertically centered modal -->

    <?php include('../snippet/footer.php') ?>