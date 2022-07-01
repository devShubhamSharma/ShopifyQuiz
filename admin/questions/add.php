<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php')

?>

<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Add Question </h2>
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
                                                <form class="forms-sample" id="form-add-question">
                                                    <input type="hidden" name="action" value="admin/add-questions">
                                                    <div class="form-group">
                                                        <label for="question form-label">Enter Question</label>
                                                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question type" required>
                                                        <div class="error-question"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="question_type">Select Question type</label>
                                                        <select class="form-control" id="question_type" name="question_type" required>
                                                            <option value="1">Single select multiple choice</option>
                                                            <option value="2">Multi select multiple choice</option>
                                                            <option value="3">True/False</option>
                                                        </select>
                                                        <div class="error-question-type"></div>
                                                    </div>
                                                    <div class="transaparent-tab-border mb-3"> Add Options</div>
                                                    <div class="list-group">
                                                        <div class="form-group list-group-item">
                                                            <div class="type-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer1" value="1" required>
                                                                    <input type="text" class="form-control" id="options1" name="options[]" placeholder="Enter option" required>
                                                                    <div class="error-options1"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer2" value="2">
                                                                    <input type="text" class="form-control" id="options2" name="options[]" placeholder="Enter option" required>
                                                                    <div class="error-options2"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer3" value="3">
                                                                    <input type="text" class="form-control" id="options3" name="options[]" placeholder="Enter option" required>
                                                                    <div class="error-options3"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer4" value="4">
                                                                    <input type="text" class="form-control" id="options4" name="options[]" placeholder="Enter option" required>
                                                                    <div class="error-options4"></div>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>

                                                            <div class="type-2 d-none">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox1" value="1" disabled>
                                                                    <input type="text" class="form-control" id="options21" name="options[]" placeholder="Enter option" disabled required>
                                                                    <div class="error-options21"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox2" value="2" disabled>
                                                                    <input type="text" class="form-control" id="options22" name="options[]" placeholder="Enter option" disabled required>
                                                                    <div class="error-options22"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox3" value="3" disabled>
                                                                    <input type="text" class="form-control" id="options23" name="options[]" placeholder="Enter option" disabled required>
                                                                    <div class="error-options23"></div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="options_answer[]" id="options_answer_checkbox4" value="4" disabled>
                                                                    <input type="text" class="form-control" id="options24" name="options[]" placeholder="Enter option" disabled required>
                                                                    <div class="error-options24"></div>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>

                                                            <div class="type-3 d-none">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer_true" value="True" disabled>
                                                                    <label class="form-check-label" for="options_answer_true"> True </label>
                                                                    <input type="hidden" class="form-control" id="optionstrue" name="options[]" placeholder="Enter option" value="True" disabled required>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options_answer[]" id="options_answer_false" value="False" disabled>
                                                                    <label class="form-check-label" for="options_answer_false">False</label>
                                                                    <input type="hidden" class="form-control" id="optionsfalse" name="options[]" placeholder="Enter option" value="False" disabled required>
                                                                </div>
                                                                <div class="error-options-answer"></div>
                                                            </div>
                                                        </div>
                                                        <div class="alert d-none" role="alert">
                                                            <div class="add-question-message"></div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary me-2 add-question">Add Question</button>
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