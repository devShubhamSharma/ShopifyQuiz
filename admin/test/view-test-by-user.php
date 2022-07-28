<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php');
include_once("../Test.php");
$getToData = json_decode(base64_decode($_GET['id']), true);
$data = $testObj->getTestorUser($getToData);

?>
<style>
    p {
        margin: 0%
    }

    label.box {
        display: flex;
        margin-top: 10px;
        padding: 10px 12px;
        border-radius: 5px;
        cursor: pointer;
        border: 1px solid #ddd
    }

    label.box:hover {
        background: #d5bbf7
    }

    label.box .course {
        display: flex;
        align-items: center;
        width: 100%
    }

    label.box .circle {
        height: 22px;
        width: 22px;
        border-radius: 50%;
        margin-right: 15px;
        border: 2px solid #ddd;
        display: inline-block
    }

    label.box .checkbox {
        height: 22px;
        width: 22px;
        /* border-radius: 50%; */
        margin-right: 15px;
        border: 2px solid #ddd;
        display: inline-block;
    }

    input[type="radio"] {
        display: none
    }

    input[type="checkbox"] {
        display: none
    }

    .btn.btn-primary {
        border-radius: 25px;
        margin-top: 20px
    }

    @media(max-width: 450px) {
        .subject {
            font-size: 12px
        }
    }
</style>
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
                            #<?= $index + 1 ?> Date: <?= date('M j Y g:i A', strtotime($val['created_at'])) ?>
                        </button>
                    </h2>
                    <div id="collapseOne<?= $index ?>" class="accordion-collapse collapse <?= ($index == 0) ? 'show' : '' ?> " aria-labelledby="headingOne<?= $index ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <table class="table table-striped mb-4">
                                <thead>
                                    <tr>
                                        <th scope="row">Total Question</th>
                                        <th scope="col">Answered Question</th>
                                        <th scope="col">Not Answered Question</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Incorrect Answer</th>
                                        <th scope="col">Obtain Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"><?= $val['total_q'] ?></td>
                                        <td><?= $val['answered_q'] ?></td>
                                        <td><?= $val['not_answered_q'] ?></td>
                                        <td><?= $val['correct_q'] ?></td>
                                        <td><?= $val['wrong_q'] ?></td>
                                        <td><?= $val['obtain_mark'] ?></td>
                                    </tr>

                                </tbody>
                            </table>

                            <!---sub accordion start-->
                            <div class="accordion" id="accordionExample-sub-<?= $index + 1 ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne-sub-<?= $index + 1 ?>">
                                        <button class="accordion-button collapsed view-test-responsive" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-sub-<?= $index + 1 ?>" aria-expanded="false" aria-controls="collapseOne-sub-<?= $index + 1 ?>" data-score-id=<?= $val['score_id'] ?>>
                                            View Test response
                                        </button>
                                    </h2>
                                    <div id="collapseOne-sub-<?= $index + 1 ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?= $index + 1 ?>" data-bs-parent="#accordionExample-sub-<?= $index + 1 ?>">
                                        <div class="accordion-body">
                                            <div class="html-test-response">
                                                <div class="text-center">
                                                    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>


                                            </div>
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