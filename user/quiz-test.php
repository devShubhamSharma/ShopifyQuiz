<?php

// if ( !isset($_SESSION['start_test'])  ) {

// }

include('../user/snippet/header.php');
include_once("../admin/Questions.php");
$data = $questionsObj->listQuestionForTest();

?>
<!--Top Section-->
<div class="intro py-3 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-3 my-4">Liquid Quiz</h2>
        <?php if (isset($_SESSION['user_data']['first_name'])) { ?>
            <h2 class="text-primary display-6 my-1">Welcome: <?= ucfirst($_SESSION['user_data']['title']) . ' ' . ucfirst($_SESSION['user_data']['first_name']) . ' ' . ucfirst($_SESSION['user_data']['middle_name']) . ' ' . ucfirst($_SESSION['user_data']['last_name']) ?> </h2><br />
        <?php } ?>

    </div>
</div>

<div class="intro py-5 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-6 my-1">Time</h2><br />
        <h2 class="text-primary display-6 my-1 countdown"></h2>
    </div>
</div>

<!--Result section-->
<div class="result py-4 d-none bg-light text-center">
    <div class="container lead">
        <p>You Scored<span class="text-primary display-4 p-3">0%</span></p>
    </div>
</div>

<!--Quiz section-->
<div class="quiz py-4 bg-primary">
    <div class="container">
        <h3 class="my-5 text-white">On with the questions...</h3>
        <form id="test-form-submit">
            <input type="hidden"  name="action" id="action" value="user/test-submit">
            <div class="quiz-html">
                <style>
                    /* @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap'); */

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        font-family: 'Roboto', sans-serif
                    }

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

                <?php
                $countQuest = 1;
                foreach ($data['data']  as $key => $qesData) {
                ?>
                    <style>
                        #one<?= $countQuest; ?>:checked~label.first,
                        #two<?= $countQuest; ?>:checked~label.second,
                        #three<?= $countQuest; ?>:checked~label.third,
                        #four<?= $countQuest; ?>:checked~label.forth,
                        #five<?= $countQuest; ?>:checked~label.fifth,
                        #six<?= $countQuest; ?>:checked~label.sixth,
                        #seven<?= $countQuest; ?>:checked~label.seveth,
                        #eight<?= $countQuest; ?>:checked~label.eighth {
                            border-color: #8e498e
                        }

                        #one<?= $countQuest; ?>:checked~label.first .circle,
                        #two<?= $countQuest; ?>:checked~label.second .circle,
                        #three<?= $countQuest; ?>:checked~label.third .circle,
                        #four<?= $countQuest; ?>:checked~label.forth .circle,
                        #five<?= $countQuest; ?>:checked~label.fifth .circle,
                        #six<?= $countQuest; ?>:checked~label.sixth .circle,
                        #seven<?= $countQuest; ?>:checked~label.seveth .circle,
                        #eight<?= $countQuest; ?>:checked~label.eighth .circle {
                            border: 6px solid #8e498e;
                            background-color: #fff
                        }

                        #one<?= $countQuest; ?>:checked~label.first .checkbox,
                        #two<?= $countQuest; ?>:checked~label.second .checkbox,
                        #three<?= $countQuest; ?>:checked~label.third .checkbox,
                        #four<?= $countQuest; ?>:checked~label.forth .checkbox,
                        #five<?= $countQuest; ?>:checked~label.fifth .checkbox,
                        #six<?= $countQuest; ?>:checked~label.sixth .checkbox,
                        #seven<?= $countQuest; ?>:checked~label.seveth .checkbox,
                        #eight<?= $countQuest; ?>:checked~label.eighth .checkbox {
                            border: 6px solid #8e498e;
                            background-color: #fff
                        }
                    </style>

                    <?php
                    if ($qesData['questionData']->question_type  == 1 || $qesData['questionData']->question_type  == 2) {
                        $questionOptionArr1 = unserialize(htmlspecialchars_decode($qesData['optionData']->q_option));
                       ?>

                        <div class="card mt-2 ck-content">
                            <div class="card-header">
                                <input type="hidden" name="question_id[]" value="<?= $qesData['questionData']->q_id ?>">
                                <input type="hidden" name="options_id[<?= $qesData['questionData']->q_id ?>][]" value="<?= $qesData['optionData']->options_id ?>">
                                <div class="font-weight-bold d-flex flex-row bd-highlight"><?= $countQuest . ".  &nbsp;" ?> <?= htmlspecialchars_decode($qesData['questionData']->question) ?></div>
                            </div>
                            <div class="card-body ">
                                <div>
                                    <input type="<?php if ($qesData['questionData']->question_type  == 1) {
                                                        echo "radio";
                                                    } else if ($qesData['questionData']->question_type  == 2) {
                                                        echo "checkbox";
                                                    } ?>" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="one<?= $countQuest ?>" value="1">
                                    <input type="<?php if ($qesData['questionData']->question_type  == 1) {
                                                        echo "radio";
                                                    } else if ($qesData['questionData']->question_type  == 2) {
                                                        echo "checkbox";
                                                    } ?>" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="two<?= $countQuest ?>" value="2">
                                    <input type="<?php if ($qesData['questionData']->question_type  == 1) {
                                                        echo "radio";
                                                    } else if ($qesData['questionData']->question_type  == 2) {
                                                        echo "checkbox";
                                                    } ?>" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="three<?= $countQuest ?>" value="3">
                                    <input type="<?php if ($qesData['questionData']->question_type  == 1) {
                                                        echo "radio";
                                                    } else if ($qesData['questionData']->question_type  == 2) {
                                                        echo "checkbox";
                                                    } ?>" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="four<?= $countQuest ?>" value="4">
                                    <label for="one<?= $countQuest ?>" class="box first">
                                        <div class="course">
                                            <span class="<?php if ($qesData['questionData']->question_type  == 1) {
                                                                echo "circle";
                                                            } else if ($qesData['questionData']->question_type  == 2) {
                                                                echo "checkbox";
                                                            } ?>"></span>
                                            <span class="subject"><?= (isset($questionOptionArr1[0])) ? $questionOptionArr1[0] : ''  ?> </span>
                                        </div>
                                    </label>
                                    <label for="two<?= $countQuest ?>" class="box second">
                                        <div class="course">
                                            <span class="<?php if ($qesData['questionData']->question_type  == 1) {
                                                                echo "circle";
                                                            } else if ($qesData['questionData']->question_type  == 2) {
                                                                echo "checkbox";
                                                            } ?>"></span>
                                            <span class="subject"> <?= (isset($questionOptionArr1[1])) ? $questionOptionArr1[1] : ''  ?> </span>
                                        </div>
                                    </label>
                                    <label for="three<?= $countQuest ?>" class="box third">
                                        <div class="course">
                                            <span class="<?php if ($qesData['questionData']->question_type  == 1) {
                                                                echo "circle";
                                                            } else if ($qesData['questionData']->question_type  == 2) {
                                                                echo "checkbox";
                                                            } ?>"></span>
                                            <span class="subject"> <?= (isset($questionOptionArr1[2])) ? $questionOptionArr1[2] : ''  ?> </span>
                                        </div>
                                    </label>
                                    <label for="four<?= $countQuest ?>" class="box forth">
                                        <div class="course">
                                            <span class="<?php if ($qesData['questionData']->question_type  == 1) {
                                                                echo "circle";
                                                            } else if ($qesData['questionData']->question_type  == 2) {
                                                                echo "checkbox";
                                                            } ?>"></span>
                                            <span class="subject"> <?= (isset($questionOptionArr1[3])) ? $questionOptionArr1[3] : ''  ?> </span>
                                        </div>
                                    </label>
                                </div>
                                <a href="javascript:void(0);" class="clear-response">Clear response</a>
                            </div>
                        </div>
                    <?php } else if ($qesData['questionData']->question_type  == 3) {
                        $questionOptionArr1 = unserialize(htmlspecialchars_decode($qesData['optionData']->q_option));
                    ?>
                        <div class="card mt-2 ck-content">
                            <div class="card-header">
                                <input type="hidden" name="question_id[]" value="<?= $qesData['questionData']->q_id ?>">
                                <input type="hidden" name="options_id[<?= $qesData['questionData']->q_id ?>][]" value="<?= $qesData['optionData']->options_id ?>">
                                <div class="font-weight-bold d-flex flex-row bd-highlight"><?= $countQuest . ".  &nbsp;" ?> <?= htmlspecialchars_decode($qesData['questionData']->question) ?></div>
                            </div>
                            <div class="card-body ">
                                <div>
                                    <input type="radio" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="one<?= $countQuest ?>" value="<?= $questionOptionArr1[0] ?>" value="True">
                                    <input type="radio" name="answerAll[<?= $qesData['questionData']->q_id ?>][]" id="two<?= $countQuest ?>" value="<?= $questionOptionArr1[1] ?>" value="False">

                                    <label for="one<?= $countQuest ?>" class="box first">
                                        <div class="course">
                                            <span class="circle"></span>
                                            <span class="subject"><?= (isset($questionOptionArr1[0])) ? $questionOptionArr1[0] : ''  ?> </span>
                                        </div>
                                    </label>
                                    <label for="two<?= $countQuest ?>" class="box second">
                                        <div class="course">
                                            <span class="circle"></span>
                                            <span class="subject"> <?= (isset($questionOptionArr1[1])) ? $questionOptionArr1[1] : ''  ?> </span>
                                        </div>
                                    </label>

                                </div>
                                <a href="javascript:void(0);" class="clear-response">Clear response</a>
                            </div>
                        </div>
                <?php  }
                    $countQuest++;
                } ?>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-light btn-lg submit-test">
                </div>
            </div>
        </form>
    </div>
</div>
<!---->
<div class="di-htmlll"></div>

<?php include('../user/snippet/footer.php'); ?>