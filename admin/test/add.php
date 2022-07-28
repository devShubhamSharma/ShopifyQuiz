<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php');
include("../Admin.php");
$randomString = $adminObj->getRandomString();
?>

<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Create test </h2>
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

                                    <!--------------------------------------
**** Main Content Start ***
--------------------------------------->

                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="forms-sample" id="form-create-test">
                                                    <input type="hidden" name="action" value="admin/create-test">
                                                    <div class="form-group">
                                                        <label for="test_code">Test Code ( Auto generated )</label>
                                                        <input class="form-control" type="text" name="test_code" id="test_code" value="<?= ($randomString != '') ? $randomString : md5(time()) ?>" required readonly>
                                                        <div class="error-test-code"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="question form-label">Enter Topic</label>
                                                        <textarea class="form-control richtext-editor" id="test_topic" name="test_topic" cols="30" rows="10" required disabled></textarea>
                                                        <div class="error-test-topic"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="question form-label">Enter Instruction</label>
                                                        <textarea class="form-control richtext-editor" id="test_instruction" name="test_instruction" cols="30" rows="10" required disabled></textarea>
                                                        <div class="error-test-instruction"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="question_type">Passcode</label>
                                                        <input class="form-control" type="text" name="passcode" id="passcode" value="TEST" required>
                                                        <small>Default: TEST</small>
                                                        <div class="error-test-time"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="question_type">Time ( in minutes )</label>
                                                        <input class="form-control" type="text" name="test_time" id="test_time" value="20" required>
                                                        <small>Default: 20 minutes</small>
                                                        <div class="error-test-time"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="question_type">Mark per question</label>
                                                        <input class="form-control" type="text" name="test_marks" id="test_marks" value="1" required>
                                                        <small>Default: 1</small>
                                                        <div class="error-test-marks"></div>
                                                    </div>
                                                    <div class="alert d-none" role="alert">
                                                        <div class="create-test-message"></div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary me-2 create-test">Create Test</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------------------------------------
**** Main Content End ***
--------------------------------------->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../snippet/footer.php') ?>