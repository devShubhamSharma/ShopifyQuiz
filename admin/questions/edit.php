<?php
ob_start();
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php');
include_once("../Questions.php");
$q_id= (isset($_GET['qid']) && $_GET['qid'] > 0) ? $_GET['qid'] : 0;
$data = $questionsObj->listQuestionByID($q_id);
if (count($data['data']) == 0) {
    header("Location: " . $config->admin_url . "questions/list.php");
}
$questionData = $data['data']['question_data'];
$questionOptionData = $data['data']['option_data'];
$questionAnswerData = $data['data']['answer_data'];
ob_end_flush();
?>

<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Update Question </h2>
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
                                                <form class="forms-sample" id="form-update-question">
                                                    <input type="hidden" name="action" value="admin/update-questions">
                                                    <input type="hidden" name="question_id" value="<?= isset($questionData->q_id) ? $questionData->q_id : '' ?>">
                                                    <div class="form-group">
                                                        <label for="question form-label">Enter Question</label>
                                                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question type" value="<?= (isset($questionData->question)) ? $questionData->question : '' ?>" required>
                                                        <div class="error-question"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="question_type">Select Question type</label>
                                                        <select class="form-control" id="question_type" name="question_type" required>
                                                            <option value="1" <?= (isset($questionData->question_type) && $questionData->question_type == 1) ? ' selected' : ' ' ?>>Single select multiple choice</option>
                                                            <option value="2" <?= (isset($questionData->question_type) && $questionData->question_type == 2) ? ' selected' : ' ' ?>>Multi select multiple choice</option>
                                                            <option value="3" <?= (isset($questionData->question_type) && $questionData->question_type == 3) ? ' selected' : ' ' ?>>True/False</option>
                                                        </select>
                                                        <div class="error-question-type"></div>
                                                    </div>
                                                    <div class="transaparent-tab-border mb-3"> Add Options</div>
                                                    <div class="list-group">
                                                        <div class="form-group list-group-item">
                                                            <div class="type-1 <?= (isset($questionData->question_type) && $questionData->question_type == 1) ? ' ' : ' d-none' ?>">
                                                                <?php $disable_1 = (isset($questionData->question_type) && $questionData->question_type == 1) ? ' ' : ' disabled ';
                                                                $questionOptionStr1 = unserialize(htmlspecialchars_decode($questionOptionData->q_option));
                                                                $questionOptionArr1 = ($questionData->question_type  == 1) ?  $questionOptionStr1 : [];
                                                                $questionAnswerStr1 = unserialize(htmlspecialchars_decode($questionAnswerData->answer_option));
                                                                $questionAnswerArr1 = ($questionData->question_type == 1) ?  $questionAnswerStr1 : [];

                                                                ?>
                                                                <div class="form-check">
                                                                    <input type="hidden" name="option_id" value="<?= (isset($questionOptionData->options_id)) ? $questionOptionData->options_id : ''  ?>" <?= $disable_1 ?>>
                                                                    <input type="hidden" name="answer_id" value="<?= (isset($questionAnswerData->qa_id)) ? $questionAnswerData->qa_id : ''  ?>" <?= $disable_1 ?>>

                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer1" value="1" <?= $disable_1 ?> required <?= (in_array(1, $questionAnswerArr1)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options1" name="options[]" placeholder="Enter option" required <?= $disable_1 ?> value="<?= (isset($questionOptionArr1[0])) ? $questionOptionArr1[0] : ''  ?>">
                                                                    <div class="error-options1"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer2" value="2" <?= $disable_1 ?> <?= (in_array(2, $questionAnswerArr1)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options2" name="options[]" placeholder="Enter option" required <?= $disable_1 ?> value="<?= (isset($questionOptionArr1[1])) ? $questionOptionArr1[1] : ''  ?>">
                                                                    <div class="error-options2"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer3" value="3" <?= $disable_1 ?> <?= (in_array(3, $questionAnswerArr1)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options3" name="options[]" placeholder="Enter option" required <?= $disable_1 ?> value="<?= (isset($questionOptionArr1[2])) ? $questionOptionArr1[2] : ''  ?>">
                                                                    <div class="error-options3"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer4" value="4" <?= $disable_1 ?> <?= (in_array(4, $questionAnswerArr1)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options4" name="options[]" placeholder="Enter option" required <?= $disable_1 ?> value="<?= (isset($questionOptionArr1[3])) ? $questionOptionArr1[3] : ''  ?>">
                                                                    <div class="error-options4"></div>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>

                                                            <div class="type-2 <?= (isset($questionData->question_type) && $questionData->question_type == 2) ? ' ' : ' d-none' ?>">
                                                                <?php $disable_2 = (isset($questionData->question_type) && $questionData->question_type == 2) ? ' ' : ' disabled ';
                                                                $questionOptionStr2 = unserialize(htmlspecialchars_decode($questionOptionData->q_option));
                                                                $questionOptionArr2 = ($questionData->question_type  == 2) ?  $questionOptionStr2 : [];
                                                                $questionAnswerStr2 = unserialize(htmlspecialchars_decode($questionAnswerData->answer_option));
                                                                $questionAnswerArr2 = ($questionData->question_type == 2) ?  $questionAnswerStr2 : [];
                                                                ?>
                                                                <div class="form-check">
                                                                    <input type="hidden" name="option_id" value="<?= (isset($questionOptionData->options_id)) ? $questionOptionData->options_id : ''  ?>" <?= $disable_2 ?>>
                                                                    <input type="hidden" name="answer_id" value="<?= (isset($questionAnswerData->qa_id)) ? $questionAnswerData->qa_id : ''  ?>" <?= $disable_2 ?>>

                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox1" value="1" <?= $disable_2 ?> <?= (in_array(1, $questionAnswerArr2)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options21" name="options[]" placeholder="Enter option" <?= $disable_2 ?> required value="<?= (isset($questionOptionArr2[0])) ? $questionOptionArr2[0] : ''  ?>">
                                                                    <div class="error-options21"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox2" value="2" <?= $disable_2 ?> <?= (in_array(2, $questionAnswerArr2)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options22" name="options[]" placeholder="Enter option" <?= $disable_2 ?> required value="<?= (isset($questionOptionArr2[1])) ? $questionOptionArr2[1] : ''  ?>">
                                                                    <div class="error-options22"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox3" value="3" <?= $disable_2 ?> <?= (in_array(3, $questionAnswerArr2)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options23" name="options[]" placeholder="Enter option" <?= $disable_2 ?> required value="<?= (isset($questionOptionArr2[2])) ? $questionOptionArr2[2] : ''  ?>">
                                                                    <div class="error-options23"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox4" value="4" <?= $disable_2 ?> <?= (in_array(4, $questionAnswerArr2)) ? ' checked ' : '' ?>>
                                                                    <input type="text" class="form-control" id="options24" name="options[]" placeholder="Enter option" <?= $disable_2 ?> required value="<?= (isset($questionOptionArr2[3])) ? $questionOptionArr2[3] : ''  ?>">
                                                                    <div class="error-options24"></div>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>

                                                            <div class="type-3 <?= (isset($questionData->question_type) && $questionData->question_type == 3) ? ' ' : ' d-none' ?>">
                                                                <?php $disable_3 = (isset($questionData->question_type) && $questionData->question_type == 3) ? ' ' : ' disabled ';
                                                                $questionOptionStr3 = unserialize(htmlspecialchars_decode($questionOptionData->q_option));
                                                                $questionOptionArr3 = ($questionData->question_type  == 3) ?  $questionOptionStr3 : [];
                                                                $questionAnswerStr3 = unserialize(htmlspecialchars_decode($questionAnswerData->answer_option));
                                                                $questionAnswerArr3 = ($questionData->question_type == 3) ?  $questionAnswerStr3 : [];
                                                                ?>
                                                                <div class="form-check">
                                                                    <input type="hidden" name="option_id" value="<?= (isset($questionOptionData->options_id)) ? $questionOptionData->options_id : ''  ?>" <?= $disable_3 ?>>
                                                                    <input type="hidden" name="answer_id" value="<?= (isset($questionAnswerData->qa_id)) ? $questionAnswerData->qa_id : ''  ?>" <?= $disable_3 ?>>
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer_true" value="True" <?= $disable_3 ?> required <?= (in_array('True', $questionAnswerArr3)) ? ' checked ' : ' ss' ?>>
                                                                    <label class="form-check-label" for="options_answer_true"> True </label>
                                                                    <input type="hidden" class="form-control" id="optionstrue" name="options[]" placeholder="Enter option" value="True">
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer_false" value="False" <?= $disable_3 ?> <?= (in_array('False', $questionAnswerArr3)) ? ' checked ' : ' ss' ?>>
                                                                    <label class="form-check-label" for="options_answer_false">False</label>
                                                                    <input type="hidden" class="form-control" id="optionsfalse" name="options[]" placeholder="Enter option" value="False" <?= $disable_3 ?> required>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>
                                                        </div>
                                                        <div class="alert d-none" role="alert">
                                                            <div class="update-question-message"></div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary me-2 update-question">Update Question</button>
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