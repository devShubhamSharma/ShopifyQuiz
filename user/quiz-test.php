<?php
session_start();
include('../user/snippet/header.php');
include_once("../admin/Questions.php");
include_once("../user/UserCRUD.php");
$data = $questionsObj->listQuestionForTest();
$testData = $UserObj->listTestByTestcode($_SESSION['test_code']);
$checkTest = $UserObj->checkTestByUser($_SESSION['test_code']);
if(count($checkTest['data']) > 0 && $checkTest['data'][0]['is_allow_retest'] ==0){
    $_SESSION['test_capture'] ="Test already taken.";
    header("Location: " . $config->base_url . "user/login.php");
}

//if($checkTest[0])
$testTime = (isset($testData['data'][0]['test_time']) && $testData['data'][0]['test_time'] != '') ? $testData['data'][0]['test_time'] : 20;
if (count($data['data']) == 0 || !isset($_SESSION['test_code'])) {
    header("Location: " . $config->base_url . "user/login.php");
}
?>
<!--Top Section-->
<div class="intro py-3 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-3 my-4">Liquid Quiz</h2>
        <?php if (isset($_SESSION['email'])) { ?>
            <div class="text-primary display-6 my-1">Welcome: <?= $_SESSION['email'] ?> </div><br />
        <?php } ?>

    </div>
</div>

<div class="intro countdown-timer py-5 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-6 my-1">Time</h2><br />
        <h2 class="text-primary display-6 my-1 countdown" id="countdown"></h2>
    </div>
</div>
<div class="container-fluid">
    <div class="instruction-div">
    <?php if (isset($testData['data'][0]['topic']) && $testData['data'][0]['topic']  != '') { ?>
        <div class="card mb-2">
            <div class="card-header bg-primary text-white">
               Topic : 
            </div>
            <div class="card-body">
               <?=htmlspecialchars_decode($testData['data'][0]['topic'])?>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($testData['data'][0]['test_instruction']) && $testData['data'][0]['test_instruction']  != '') { ?>
        <div class="card mb-2">
            <div class="card-header bg-primary text-white">
                **Instruction
            </div>
            <div class="card-body">
                <?=htmlspecialchars_decode($testData['data'][0]['test_instruction'])?>
            </div>
        </div>
    <?php } ?>
    </div>

    <div class="container test-message d-none">
        <div class="alert alert-success">
            <strong>Success!</strong> Your test submittted successfully.
        </div>
    </div>


    <!--Quiz section-->
    <div class="quiz py-4 bg-primary" id="quiz-div">
        <div class="container">
            <h3 class="my-5 text-white">On with the questions...</h3>
            <form id="test-form-submit">
                <input type="hidden" name="action" id="action" value="user/test-submit">
                <input type="hidden" name="test_id" id="test_id" value="<?= (isset($_SESSION['test_code'])) ? $_SESSION['test_code'] : '0' ?>">
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
</div>
<!---->
<div class="di-htmlll"></div>
<script>
    var testTime = `<?= $testTime ?>`;
</script>
<?php include('../user/snippet/footer.php'); ?>