<?php require '../../include/init.php';

if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}
$id = $_SESSION['id'];
if (Survey::checkStudent($id)) {
    $session->message('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>OOPS!</strong> Your account has been already take the teacher evaluation.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>');
    redirect_to('../login.php');
}

$name = $_SESSION['name'];
$knowledge_one = $knowledge_two = $knowledge_three = $knowledge_four = $knowledge_five = '';
$commitment_one = $commitment_two = $commitment_three = $commitment_four = '';
$teacher_skills_one = $teachers_skills_two = $teacher_skills_three = $teacher_skills_four = $teacher_skills_five = $teacher_skills_six = $teacher_skills_seven = $teacher_skills_eight = $teacher_skills_nine = '';
$classroom_management_one = $classroom_management_two = $classroom_management_three = $classroom_management_four = $classroom_management_five = $classroom_management_six = '';
$personal_social_one = $personal_social_two = $personal_social_three = $personal_social_four = $personal_social_five = $personal_social_six = $personal_social_seven = $personal_social_eight = $personal_social_nine = $personal_social_ten = '';
$comments = $suggestions = '';
$subId = '';

function displayCurrentDate()
{
    $date = new DateTime();
    return $date->format('Y-m-d');
}

$survey = new Survey();
$subjects = Subjects::find_all();
$teachers = Teacher::find_all();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['knowledge_one']) || empty($_POST['knowledge_two']) || empty($_POST['knowledge_three']) || empty($_POST['knowledge_four']) || empty($_POST['knowledge_five']) ||
        empty($_POST['teacher_skills_one']) ||
        empty($_POST['teacher_skills_two']) ||
        empty($_POST['teacher_skills_three']) ||
        empty($_POST['teacher_skills_four']) ||
        empty($_POST['teacher_skills_five']) ||
        empty($_POST['teacher_skills_six']) ||
        empty($_POST['teacher_skills_seven']) ||
        empty($_POST['teacher_skills_eight']) ||
        empty($_POST['teacher_skills_nine']) ||
        empty($_POST['classroom_management_one']) ||
        empty($_POST['classroom_management_two']) ||
        empty($_POST['classroom_management_three']) ||
        empty($_POST['classroom_management_four']) ||
        empty($_POST['classroom_management_five']) ||
        empty($_POST['classroom_management_six']) ||
        empty($_POST['personal_social_one']) ||
        empty($_POST['personal_social_two']) ||
        empty($_POST['personal_social_three']) ||
        empty($_POST['personal_social_four']) ||
        empty($_POST['personal_social_five']) ||
        empty($_POST['personal_social_six']) ||
        empty($_POST['personal_social_seven']) ||
        empty($_POST['personal_social_eight']) ||
        empty($_POST['personal_social_nine']) ||
        empty($_POST['personal_social_ten']) ||
        empty($_POST['commitment_one']) ||
        empty($_POST['commitment_two']) ||
        empty($_POST['commitment_three']) ||
        empty($_POST['commitment_four']) ||
        empty($_POST['comments']) ||
        empty($_POST['suggestions'])) {
        $session->message = '<div style="display: block;width: 100%;background-color: crimson;color: white;font-weight: bold;padding:20px;border-radius: 8px;">Please filled up all the forms</div>';

    } else {
        $knowledge_one = $_POST['knowledge_one'];
        $knowledge_two = $_POST['knowledge_two'];
        $knowledge_three = $_POST['knowledge_three'];
        $knowledge_four = $_POST['knowledge_four'];
        $knowledge_five = $_POST['knowledge_five'];

        $teacher_skills_one = $_POST['teacher_skills_one'];
        $teacher_skills_two = $_POST['teacher_skills_two'];
        $teacher_skills_three = $_POST['teacher_skills_three'];
        $teacher_skills_four = $_POST['teacher_skills_four'];
        $teacher_skills_five = $_POST['teacher_skills_five'];
        $teacher_skills_six = $_POST['teacher_skills_six'];
        $teacher_skills_seven = $_POST['teacher_skills_seven'];
        $teacher_skills_eight = $_POST['teacher_skills_eight'];
        $teacher_skills_nine = $_POST['teacher_skills_nine'];

        $classroom_management_one = $_POST['classroom_management_one'];
        $classroom_management_two = $_POST['classroom_management_two'];
        $classroom_management_three = $_POST['classroom_management_three'];
        $classroom_management_four = $_POST['classroom_management_four'];
        $classroom_management_five = $_POST['classroom_management_five'];
        $classroom_management_six = $_POST['classroom_management_six'];

        $personal_social_one = $_POST['personal_social_one'];
        $personal_social_two = $_POST['personal_social_two'];
        $personal_social_three = $_POST['personal_social_three'];
        $personal_social_four = $_POST['personal_social_four'];
        $personal_social_five = $_POST['personal_social_five'];
        $personal_social_six = $_POST['personal_social_six'];
        $personal_social_seven = $_POST['personal_social_seven'];
        $personal_social_eight = $_POST['personal_social_eight'];
        $personal_social_nine = $_POST['personal_social_nine'];
        $personal_social_ten = $_POST['personal_social_ten'];

        $commitment_one = $_POST['commitment_one'];
        $commitment_two = $_POST['commitment_two'];
        $commitment_three = $_POST['commitment_three'];
        $commitment_four = $_POST['commitment_four'];

        $comments = $_POST['comments'];
        $suggestions = $_POST['suggestions'];
        $subId = $_POST['subject'];
        $teacherId = $_POST['teacher_id'];
        $studId = $_SESSION['id'];

        $result = $survey->SaveSurvey($teacherId, $subId, $studId,
            $knowledge_one, $knowledge_two, $knowledge_three, $knowledge_four, $knowledge_five, $teacher_skills_one, $teacher_skills_two, $teacher_skills_three, $teacher_skills_four, $teacher_skills_six, $teacher_skills_six, $teacher_skills_seven, $teacher_skills_eight, $teacher_skills_nine,
            $classroom_management_one, $classroom_management_two, $classroom_management_three, $classroom_management_four, $classroom_management_five, $classroom_management_six,
            $personal_social_one, $personal_social_two, $personal_social_three, $personal_social_four, $personal_social_five, $personal_social_six, $personal_social_seven, $personal_social_eight, $personal_social_nine, $personal_social_ten,
            $commitment_one, $commitment_two, $commitment_three, $commitment_four, $comments, $suggestions);

        if ($result) {
            redirect_to('thank_you.php');
        }

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teachers Evaluation System - Students Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .text-capitalize {
            text-transform: capitalize;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>TEACHERS EVALUATION BY STUDENTS</h2>
            <h5>(Evaluators: <?= ucwords($name) ?>) | <a href="logout.php">Log out</a></h5>
            <br>
            <form action="" method="post">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 31%"><p style="font-weight: bold">Name of the Teacher Evaluated:</p></td>
                        <td>
                            <!--<input type="text" class="form-control" name="teacher_name" value="Ms. Margareta"
                                   id="teacher_name">-->
                            <select name="teacher_id" id="teacher_id" class="form-control">
                                <?php foreach($teachers as $teacher) : ?>
                                    <option value="<?= $teacher->id ?>"><?= ucwords($teacher->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table style="width:100%;">
                                <tr>
                                    <td>
                                        <span style="font-weight: bold" id="subject">Subject: </span>

                                        <select name="subject" id="subject" class="form-control-md">
                                            <?php foreach($subjects as $subject) : ?>
                                                <option value="<?= $subject->id ?>"><?= $subject->subject ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td><span style="font-weight: bold">Date Of Evaluation:</span> <input
                                                class="form-control-sm" type="text" name="eval_date"
                                                value="<?= displayCurrentDate() ?>"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 10px;">
                        <strong>DIRECTIONS:</strong>
                    </div>
                    <div>
                        <p style="text-align: justify">
                            This questionnaire is designed to give constructive feedback to your teacher to
                            improve instruction. Please accomplish this <strong>HONESTY</strong> and
                            <strong>SINCERELY</strong>.
                            Encircle the number that best represents your evaluation. The description for each rating is
                            stated
                            below. You need not write your name. Please feel free to make additional comments and &amp;
                            suggestions
                            on the space provided for.
                        </p>
                    </div>
                </div>
                <br>
                <ol>
                    <li><strong>RATINGS:</strong></li>
                    <li>5 - Excellent</li>
                    <li>4 - Above Average</li>
                    <li>3 - Average</li>
                    <li>2 - Below Average</li>
                    <li>1 - Unsatisfactory</li>
                </ol>

                <br>
                <br>
                <?= $session->message() ?: '' ?>
                <br>
                <table style="width: 100%;text-align: left;" border="1">
                    <tr>
                        <th class="pl-1">I. EFFECTIVENESS OF TEACHING</th>
                        <th class="center">5</th>
                        <th class="center">4</th>
                        <th class="center">3</th>
                        <th class="center">2</th>
                        <th class="center">1</th>
                    </tr>
                    <tr>
                        <th class="pl-1">A. Knowledge of the subject-matter</th>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="pl-1">1. Has ample understanding/grasp of the subject matter.</td>
                        <td class="center">
                            <input type="radio"
                                   name="knowledge_one"
                                   value="5" <?= (isset($knowledge_one) && (int)$knowledge_one === 5) ? 'checked' : '' ?>
                                   id="knowledge_one">
                        </td>
                        <td class="center"><input type="radio" name="knowledge_one" value="4"
                                                  id="knowledge_one" checked <?= (isset($knowledge_one) && (int)$knowledge_one === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_one" value="3"
                                                  id="knowledge_one" <?= (isset($knowledge_one) && (int)$knowledge_one === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_one" value="2"
                                                  id="knowledge_one" <?= (isset($knowledge_one) && (int)$knowledge_one === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_one" value="1"
                                                  id="knowledge_one" <?= (isset($knowledge_one) && (int)$knowledge_one === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">2. Shows interest in the subject matter.</td>
                        <td class="center"><input type="radio" checked name="knowledge_two" value="5"
                                                  id="knowledge_two" <?= (isset($knowledge_two) && (int)$knowledge_two === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_two" value="4"
                                                  id="knowledge_two" <?= (isset($knowledge_two) && (int)$knowledge_two === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_two" value="3"
                                                  id="knowledge_two" <?= (isset($knowledge_two) && (int)$knowledge_two === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_two" value="2"
                                                  id="knowledge_two" <?= (isset($knowledge_two) && (int)$knowledge_two === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_two" value="1"
                                                  id="knowledge_two" <?= (isset($knowledge_two) && (int)$knowledge_two === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">3. Welcomes questions/request/clarification.</td>
                        <td class="center"><input type="radio" name="knowledge_three" value="5"
                                                  id="knowledge_three" <?= (isset($knowledge_three) && (int)$knowledge_three === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_three" value="4"
                                                  id="knowledge_three" <?= (isset($knowledge_three) && (int)$knowledge_three === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_three" value="3"
                                                  id="knowledge_three" checked <?= (isset($knowledge_three) && (int)$knowledge_three === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_three" value="2"
                                                  id="knowledge_three" <?= (isset($knowledge_three) && (int)$knowledge_three === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_three" value="1"
                                                  id="knowledge_three" <?= (isset($knowledge_three) && (int)$knowledge_three === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">4. Organizes subject matter well.</td>
                        <td class="center"><input type="radio" name="knowledge_four" value="5"
                                                  id="knowledge_four" <?= (isset($knowledge_four) && (int)$knowledge_four === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_four" value="4"
                                                  id="knowledge_four" <?= (isset($knowledge_four) && (int)$knowledge_four === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_four" value="3"
                                                  id="knowledge_four" checked <?= (isset($knowledge_four) && (int)$knowledge_four === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_four" value="2"
                                                  id="knowledge_four" <?= (isset($knowledge_four) && (int)$knowledge_four === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_four" value="1"
                                                  id="knowledge_four" <?= (isset($knowledge_four) && (int)$knowledge_four === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">5. Selects relevant materials effectively.</td>
                        <td class="center"><input type="radio" checked name="knowledge_five" value="5"
                                                  id="knowledge_five" <?= (isset($knowledge_five) && (int)$knowledge_five === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_five" value="4"
                                                  id="knowledge_five" <?= (isset($knowledge_five) && (int)$knowledge_five === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_five" value="3"
                                                  id="knowledge_five" <?= (isset($knowledge_five) && (int)$knowledge_five === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="knowledge_five" value="2"
                                                  id="knowledge_five" <?= (isset($knowledge_five) && (int)$knowledge_five === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="knowledge_five" value="1"
                                                  id="knowledge_five" <?= (isset($knowledge_five) && (int)$knowledge_five === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <th class="pl-1">B. Teaching Skills</th>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="pl-1">1. Speaks clearly and distinctly.</td>
                        <td class="center">
                            <input
                                    type="radio"
                                    name="teacher_skills_one"
                                    value="5"
                                    id="teacher_skills_one" <?= (isset($teacher_skills_one) && (int)$teacher_skills_one === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="teacher_skills_one" value="4"
                                                  id="teacher_skills_one" <?= (isset($teacher_skills_one) && (int)$teacher_skills_one === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_one" value="3"
                                                  id="teacher_skills_one" <?= (isset($teacher_skills_one) && (int)$teacher_skills_one === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_one" value="2"
                                                  id="teacher_skills_one" <?= (isset($teacher_skills_one) && (int)$teacher_skills_one === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_one" value="1"
                                                  id="teacher_skills_one" <?= (isset($teacher_skills_one) && (int)$teacher_skills_one === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">2. Speaks English/Filipino correctly.</td>
                        <td class="center"><input type="radio" name="teacher_skills_two" value="5"
                                                  id="teacher_skills_two" <?= (isset($teacher_skills_two) && (int)$teacher_skills_two === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_two" value="4"
                                                  id="teacher_skills_two" <?= (isset($teacher_skills_two) && (int)$teacher_skills_two === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_two" value="3"
                                                  id="teacher_skills_two" <?= (isset($teacher_skills_two) && (int)$teacher_skills_two === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_two" value="2"
                                                  id="teacher_skills_two" <?= (isset($teacher_skills_two) && (int)$teacher_skills_two === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="teacher_skills_two" value="1"
                                                  id="teacher_skills_two" <?= (isset($teacher_skills_two) && (int)$teacher_skills_two === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-1">3. Explains subject matter clearly.</td>
                        <td class="center"><input type="radio" name="teacher_skills_three" value="5"
                                                  id="teacher_skills_three" <?= (isset($teacher_skills_three) && (int)$teacher_skills_three === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="teacher_skills_three" value="4"
                                                  id="teacher_skills_three" <?= (isset($teacher_skills_three) && (int)$teacher_skills_three === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_three" value="3"
                                                  id="teacher_skills_three" <?= (isset($teacher_skills_three) && (int)$teacher_skills_three === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_three" value="2"
                                                  id="teacher_skills_three" <?= (isset($teacher_skills_three) && (int)$teacher_skills_three === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_three" value="1"
                                                  id="teacher_skills_three" <?= (isset($teacher_skills_three) && (int)$teacher_skills_three === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">4. Makes lesson interesting.</td>
                        <td class="center"><input type="radio" name="teacher_skills_four" value="5"
                                                  id="teacher_skills_four" <?= (isset($teacher_skills_four) && (int)$teacher_skills_four === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_four" value="4"
                                                  id="teacher_skills_four" <?= (isset($teacher_skills_four) && (int)$teacher_skills_four === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_four" value="3"
                                                  id="teacher_skills_four" checked <?= (isset($teacher_skills_four) && (int)$teacher_skills_four === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_four" value="2"
                                                  id="teacher_skills_four" <?= (isset($teacher_skills_four) && (int)$teacher_skills_four === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_four" value="1"
                                                  id="teacher_skills_four" <?= (isset($teacher_skills_four) && (int)$teacher_skills_four === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">5. Subject matter relevant/practical to current needs</td>
                        <td class="center"><input type="radio" name="teacher_skills_five" value="5"
                                                  id="teacher_skills_five" <?= (isset($teacher_skills_five) && (int)$teacher_skills_five === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="teacher_skills_five" value="4"
                                                  id="teacher_skills_five" <?= (isset($teacher_skills_five) && (int)$teacher_skills_five === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_five" value="3"
                                                  id="teacher_skills_five" <?= (isset($teacher_skills_five) && (int)$teacher_skills_five === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_five" value="2"
                                                  id="teacher_skills_five" <?= (isset($teacher_skills_five) && (int)$teacher_skills_five === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_five" value="1"
                                                  id="teacher_skills_five" <?= (isset($teacher_skills_five) && (int)$teacher_skills_five === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">6. Uses techniques to student's participation.</td>
                        <td class="center"><input type="radio" name="teacher_skills_six" value="5"
                                                  id="teacher_skills_six" <?= (isset($teacher_skills_six) && (int)$teacher_skills_six === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_six"  checked value="4"
                                                  id="teacher_skills_six" <?= (isset($teacher_skills_six) && (int)$teacher_skills_six === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_six" value="3"
                                                  id="teacher_skills_six" <?= (isset($teacher_skills_six) && (int)$teacher_skills_six === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_six" value="2"
                                                  id="teacher_skills_six" <?= (isset($teacher_skills_six) && (int)$teacher_skills_six === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_six" value="1"
                                                  id="teacher_skills_six" <?= (isset($teacher_skills_six) && (int)$teacher_skills_six === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">7. Encourage critical thinking.</td>
                        <td class="center"><input type="radio" name="teacher_skills_seven" value="5"
                                                  id="teacher_skills_seven" <?= (isset($teacher_skills_seven) && (int)$teacher_skills_seven === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="teacher_skills_seven" value="4"
                                                  id="teacher_skills_seven" <?= (isset($teacher_skills_seven) && (int)$teacher_skills_seven === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_seven" value="3"
                                                  id="teacher_skills_seven" <?= (isset($teacher_skills_seven) && (int)$teacher_skills_seven === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_seven" value="2"
                                                  id="teacher_skills_seven" <?= (isset($teacher_skills_seven) && (int)$teacher_skills_seven === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_seven" value="1"
                                                  id="teacher_skills_seven" <?= (isset($teacher_skills_seven) && (int)$teacher_skills_seven === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">8. Makes subject matter relevant to course objectives.</td>
                        <td class="center"><input type="radio" checked name="teacher_skills_eight" value="5"
                                                  id="teacher_skills_eight" <?= (isset($teacher_skills_eight) && (int)$teacher_skills_eight === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_eight" value="4"
                                                  id="teacher_skills_eight" <?= (isset($teacher_skills_eight) && (int)$teacher_skills_eight === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_eight" value="3"
                                                  id="teacher_skills_eight" <?= (isset($teacher_skills_eight) && (int)$teacher_skills_eight === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_eight" value="2"
                                                  id="teacher_skills_eight" <?= (isset($teacher_skills_eight) && (int)$teacher_skills_eight === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_eight" value="1"
                                                  id="teacher_skills_eight" <?= (isset($teacher_skills_eight) && (int)$teacher_skills_eight === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">9. Provides appropriate drills/seat works/assignments.</td>
                        <td class="center"><input type="radio"  checked name="teacher_skills_nine" value="5"
                                                  id="teacher_skills_nine" <?= (isset($teacher_skills_nine) && (int)$teacher_skills_nine === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_nine" value="4"
                                                  id="teacher_skills_nine" <?= (isset($teacher_skills_nine) && (int)$teacher_skills_nine === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_nine" value="3"
                                                  id="teacher_skills_nine" <?= (isset($teacher_skills_nine) && (int)$teacher_skills_nine === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_nine" value="2"
                                                  id="teacher_skills_nine" <?= (isset($teacher_skills_nine) && (int)$teacher_skills_nine === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="teacher_skills_nine" value="1"
                                                  id="teacher_skills_nine" <?= (isset($teacher_skills_nine) && (int)$teacher_skills_nine === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <th class="pl-1">C. Classroom Management</th>
                        <td colspan="5"></td>
                    </tr>

                    <tr>
                        <td class="pl-1">1. Commands student's respect.</td>
                        <td class="center"><input type="radio" name="classroom_management_one" value="5"
                                                  id="classroom_management_one" <?= (isset($classroom_management_one) && (int)$classroom_management_one === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_one" value="4"
                                                  id="classroom_management_one" <?= (isset($classroom_management_one) && (int)$classroom_management_one === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="classroom_management_one" value="3"
                                                  id="classroom_management_one" <?= (isset($classroom_management_one) && (int)$classroom_management_one === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_one" value="2"
                                                  id="classroom_management_one" <?= (isset($classroom_management_one) && (int)$classroom_management_one === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_one" value="1"
                                                  id="classroom_management_one" <?= (isset($classroom_management_one) && (int)$classroom_management_one === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">2. Return graded papers/projects.</td>
                        <td class="center"><input type="radio" name="classroom_management_two" value="5"
                                                  id="classroom_management_two" <?= (isset($classroom_management_two) && (int)$classroom_management_two === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="classroom_management_two" value="4"
                                                  id="classroom_management_two" <?= (isset($classroom_management_two) && (int)$classroom_management_two === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_two" value="3"
                                                  id="classroom_management_two" <?= (isset($classroom_management_two) && (int)$classroom_management_two === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_two" value="2"
                                                  id="classroom_management_two" <?= (isset($classroom_management_two) && (int)$classroom_management_two === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_two" value="1"
                                                  id="classroom_management_two" <?= (isset($classroom_management_two) && (int)$classroom_management_two === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">3. Fair in dealing with students.</td>
                        <td class="center"><input type="radio" name="classroom_management_three" value="5"
                                                  id="classroom_management_three" <?= (isset($classroom_management_three) && (int)$classroom_management_three === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_three" value="4"
                                                  id="classroom_management_three" <?= (isset($classroom_management_three) && (int)$classroom_management_three === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="classroom_management_three" value="3"
                                                  id="classroom_management_three" <?= (isset($classroom_management_three) && (int)$classroom_management_three === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_three" value="2"
                                                  id="classroom_management_three" <?= (isset($classroom_management_three) && (int)$classroom_management_three === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_three" value="1"
                                                  id="classroom_management_three" <?= (isset($classroom_management_three) && (int)$classroom_management_three === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">4. Handles individual/group discipline tactfully.</td>
                        <td class="center"><input type="radio" name="classroom_management_four" value="5"
                                                  id="classroom_management_four" <?= (isset($classroom_management_four) && (int)$classroom_management_four === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="classroom_management_four" value="4"
                                                  id="classroom_management_four" <?= (isset($classroom_management_four) && (int)$classroom_management_four === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_four" value="3"
                                                  id="classroom_management_four" <?= (isset($classroom_management_four) && (int)$classroom_management_four === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_four" value="2"
                                                  id="classroom_management_four" <?= (isset($classroom_management_four) && (int)$classroom_management_four === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_four" value="1"
                                                  id="classroom_management_four" <?= (isset($classroom_management_four) && (int)$classroom_management_four === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">5. Explains grading system.</td>
                        <td class="center"><input type="radio" checked name="classroom_management_five" value="5"
                                                  id="classroom_management_five" <?= (isset($classroom_management_five) && (int)$classroom_management_five === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_five" value="4"
                                                  id="classroom_management_five" <?= (isset($classroom_management_five) && (int)$classroom_management_five === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_five" value="3"
                                                  id="classroom_management_five" <?= (isset($classroom_management_five) && (int)$classroom_management_five === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_five" value="2"
                                                  id="classroom_management_five" <?= (isset($classroom_management_five) && (int)$classroom_management_five === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_five" value="1"
                                                  id="classroom_management_five" <?= (isset($classroom_management_five) && (int)$classroom_management_five === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">6. Follows grading system.</td>
                        <td class="center"><input type="radio" name="classroom_management_six" value="5"
                                                  id="classroom_management_six" <?= (isset($classroom_management_six) && (int)$classroom_management_six === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_six" value="4"
                                                  id="classroom_management_six" <?= (isset($classroom_management_six) && (int)$classroom_management_six === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_six" value="3"
                                                  id="classroom_management_six" <?= (isset($classroom_management_six) && (int)$classroom_management_six === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="classroom_management_six" value="2"
                                                  id="classroom_management_six" <?= (isset($classroom_management_six) && (int)$classroom_management_six === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="classroom_management_six" value="1"
                                                  id="classroom_management_six" <?= (isset($classroom_management_six) && (int)$classroom_management_six === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>


                    <tr>
                        <th class="pl-1">II. PERSONAL AND SOCIAL TRAITS</th>
                        <td colspan="5"></td>
                    </tr>

                    <tr>
                        <td class="pl-1">1. Creates an atmosphere of easy/security.</td>
                        <td class="center"><input type="radio" name="personal_social_one" value="5"
                                                  id="personal_social_one" <?= (isset($personal_social_one) && (int)$personal_social_one === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_one" value="4"
                                                  id="personal_social_one" <?= (isset($personal_social_one) && (int)$personal_social_one === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="personal_social_one" value="3"
                                                  id="personal_social_one" <?= (isset($personal_social_one) && (int)$personal_social_one === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_one" value="2"
                                                  id="personal_social_one" <?= (isset($personal_social_one) && (int)$personal_social_one === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_one" value="1"
                                                  id="personal_social_one" <?= (isset($personal_social_one) && (int)$personal_social_one === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">2. Firm and consistent with students..</td>
                        <td class="center"><input type="radio" name="personal_social_two" value="5"
                                                  id="personal_social_two" <?= (isset($personal_social_two) && (int)$personal_social_two === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="personal_social_two" value="4"
                                                  id="personal_social_two" <?= (isset($personal_social_two) && (int)$personal_social_two === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_two" value="3"
                                                  id="personal_social_two" <?= (isset($personal_social_two) && (int)$personal_social_two === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_two" value="2"
                                                  id="personal_social_two" <?= (isset($personal_social_two) && (int)$personal_social_two === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_two" value="1"
                                                  id="personal_social_two" <?= (isset($personal_social_two) && (int)$personal_social_two === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">3. Discipline class.</td>
                        <td class="center"><input type="radio" checked name="personal_social_three" value="5"
                                                  id="personal_social_three"<?= (isset($personal_social_three) && (int)$personal_social_three === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_three" value="4"
                                                  id="personal_social_three"<?= (isset($personal_social_three) && (int)$personal_social_three === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_three" value="3"
                                                  id="personal_social_three"<?= (isset($personal_social_three) && (int)$personal_social_three === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_three" value="2"
                                                  id="personal_social_three"<?= (isset($personal_social_three) && (int)$personal_social_three === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_three" value="1"
                                                  id="personal_social_three"<?= (isset($personal_social_three) && (int)$personal_social_three === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">4. Respect student's ideas and opinions.</td>
                        <td class="center"><input type="radio" checked name="personal_social_four" value="5"
                                                  id="personal_social_four"<?= (isset($personal_social_four) && (int)$personal_social_four === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_four" value="4"
                                                  id="personal_social_four"<?= (isset($personal_social_four) && (int)$personal_social_four === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_four" value="3"
                                                  id="personal_social_four"<?= (isset($personal_social_four) && (int)$personal_social_four === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_four" value="2"
                                                  id="personal_social_four"<?= (isset($personal_social_four) && (int)$personal_social_four === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_four" value="1"
                                                  id="personal_social_four"<?= (isset($personal_social_four) && (int)$personal_social_four === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">5. Available to students for assistance.</td>
                        <td class="center"><input type="radio" checked name="personal_social_five" value="5"
                                                  id="personal_social_five" <?= (isset($personal_social_five) && (int)$personal_social_five === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_five" value="4"
                                                  id="personal_social_five" <?= (isset($personal_social_five) && (int)$personal_social_five === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_five" value="3"
                                                  id="personal_social_five" <?= (isset($personal_social_five) && (int)$personal_social_five === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_five" value="2"
                                                  id="personal_social_five" <?= (isset($personal_social_five) && (int)$personal_social_five === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_five" value="1"
                                                  id="personal_social_five" <?= (isset($personal_social_five) && (int)$personal_social_five === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">6. Possesses sense of humor.</td>
                        <td class="center"><input type="radio" checked name="personal_social_six" value="5"
                                                  id="personal_social_six" <?= (isset($personal_social_six) && (int)$personal_social_six === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_six" value="4"
                                                  id="personal_social_six" <?= (isset($personal_social_six) && (int)$personal_social_six === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_six" value="3"
                                                  id="personal_social_six" <?= (isset($personal_social_six) && (int)$personal_social_six === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_six" value="2"
                                                  id="personal_social_six" <?= (isset($personal_social_six) && (int)$personal_social_six === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_six" value="1"
                                                  id="personal_social_six" <?= (isset($personal_social_six) && (int)$personal_social_six === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">7. Accepts criticism.</td>
                        <td class="center"><input type="radio" name="personal_social_seven" value="5"
                                                  id="personal_social_seven" <?= (isset($personal_social_seven) && (int)$personal_social_seven === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="personal_social_seven" value="4"
                                                  id="personal_social_seven" <?= (isset($personal_social_seven) && (int)$personal_social_seven === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_seven" value="3"
                                                  id="personal_social_seven" <?= (isset($personal_social_seven) && (int)$personal_social_seven === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_seven" value="2"
                                                  id="personal_social_seven" <?= (isset($personal_social_seven) && (int)$personal_social_seven === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_seven" value="1"
                                                  id="personal_social_seven" <?= (isset($personal_social_seven) && (int)$personal_social_seven === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">8. Has rapport with students.</td>
                        <td class="center"><input type="radio" name="personal_social_eight" value="5"
                                                  id="personal_social_eight" <?= (isset($personal_social_eight) && (int)$personal_social_eight === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_eight" value="4"
                                                  id="personal_social_eight" <?= (isset($personal_social_eight) && (int)$personal_social_eight === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_eight" value="3"
                                                  id="personal_social_eight" <?= (isset($personal_social_eight) && (int)$personal_social_eight === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="personal_social_eight" value="2"
                                                  id="personal_social_eight" <?= (isset($personal_social_eight) && (int)$personal_social_eight === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_eight" value="1"
                                                  id="personal_social_eight" <?= (isset($personal_social_eight) && (int)$personal_social_eight === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">9. Adapts to classroom situations.</td>
                        <td class="center"><input type="radio" checked name="personal_social_nine" value="5"
                                                  id="personal_social_nine" <?= (isset($personal_social_nine) && (int)$personal_social_nine === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_nine" value="4"
                                                  id="personal_social_nine" <?= (isset($personal_social_nine) && (int)$personal_social_nine === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_nine" value="3"
                                                  id="personal_social_nine" <?= (isset($personal_social_nine) && (int)$personal_social_nine === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_nine" value="2"
                                                  id="personal_social_nine" <?= (isset($personal_social_nine) && (int)$personal_social_nine === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_nine" value="1"
                                                  id="personal_social_nine" <?= (isset($personal_social_nine) && (int)$personal_social_nine === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">10. Carries self well with confidence.</td>
                        <td class="center"><input type="radio"  checked name="personal_social_ten" value="5"
                                                  id="personal_social_ten" <?= (isset($personal_social_ten) && (int)$personal_social_ten === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_ten" value="4"
                                                  id="personal_social_ten" <?= (isset($personal_social_ten) && (int)$personal_social_ten === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_ten" value="3"
                                                  id="personal_social_ten" <?= (isset($personal_social_ten) && (int)$personal_social_ten === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_ten" value="2"
                                                  id="personal_social_ten" <?= (isset($personal_social_ten) && (int)$personal_social_ten === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="personal_social_ten" value="1"
                                                  id="personal_social_ten" <?= (isset($personal_social_ten) && (int)$personal_social_ten === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>


                    <tr>
                        <th class="pl-1">III. SENSE OF COMMITMENT</th>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="pl-1">1. Comes to class prepared.</td>
                        <td class="center"><input type="radio" checked name="commitment_one" value="5"
                                                  id="commitment_one" <?= (isset($commitment_one) && (int)$commitment_one === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_one" value="4"
                                                  id="commitment_one" <?= (isset($commitment_one) && (int)$commitment_one === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_one" value="3"
                                                  id="commitment_one" <?= (isset($commitment_one) && (int)$commitment_one === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_one" value="2"
                                                  id="commitment_one" <?= (isset($commitment_one) && (int)$commitment_one === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_one" value="1"
                                                  id="commitment_one" <?= (isset($commitment_one) && (int)$commitment_one === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">2. Reports to class regularly to teach.</td>
                        <td class="center"><input type="radio" name="commitment_two" value="5"
                                                  id="commitment_two" <?= (isset($commitment_two) && (int)$commitment_two === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="commitment_two" value="4"
                                                  id="commitment_two" <?= (isset($commitment_two) && (int)$commitment_two === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_two" value="3"
                                                  id="commitment_two" <?= (isset($commitment_two) && (int)$commitment_two === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_two" value="2"
                                                  id="commitment_two" <?= (isset($commitment_two) && (int)$commitment_two === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_two" value="1"
                                                  id="commitment_two" <?= (isset($commitment_two) && (int)$commitment_two === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">3. Comes to class punctually..</td>
                        <td class="center"><input type="radio" name="commitment_three" value="5"
                                                  id="commitment_three" <?= (isset($commitment_three) && (int)$commitment_three === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_three" value="4"
                                                  id="commitment_three" <?= (isset($commitment_three) && (int)$commitment_three === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" checked name="commitment_three" value="3"
                                                  id="commitment_three" <?= (isset($commitment_three) && (int)$commitment_three === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_three" value="2"
                                                  id="commitment_three" <?= (isset($commitment_three) && (int)$commitment_three === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_three" value="1"
                                                  id="commitment_three" <?= (isset($commitment_three) && (int)$commitment_three === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>

                    <tr>
                        <td class="pl-1">4. Cares/Concerned for students.</td>
                        <td class="center"><input type="radio" checked name="commitment_four" value="5"
                                                  id="commitment_four" <?= (isset($commitment_four) && (int)$commitment_four === 5) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_four" value="4"
                                                  id="commitment_four" <?= (isset($commitment_four) && (int)$commitment_four === 4) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_four" value="3"
                                                  id="commitment_four" <?= (isset($commitment_four) && (int)$commitment_four === 3) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_four" value="2"
                                                  id="commitment_four" <?= (isset($commitment_four) && (int)$commitment_four === 2) ? 'checked' : '' ?>>
                        </td>
                        <td class="center"><input type="radio" name="commitment_four" value="1"
                                                  id="commitment_four" <?= (isset($commitment_four) && (int)$commitment_four === 1) ? 'checked' : '' ?>>
                        </td>
                    </tr>


                </table>

                <br>
                <br>
                <h3>COMMENTS:</h3>
                <br>
                <p class="m1"><label for="comment">1. What do you like / do not like about your
                        teacher?</label></p>
                <textarea placeholder="Leave your comment here..." name="comments" id="comments" rows="7"
                          class="form-textarea"><?= $comments ?: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem commodi deleniti dignissimos dolore dolorem eius et odit praesentium quod. Consequuntur, cumque esse magnam minima qui sapiente voluptatibus? Consectetur, velit.' ?></textarea>

                <br>
                <br>
                <h3>SUGGESTIONS:</h3>
                <br>
                <p class="m1"><label for="suggestions">2. Give your suggestions (if any) for the
                        improvement of your teacher?</label></p>
                <textarea placeholder="Leave your suggestions here..." name="suggestions" id="suggestions" rows="7"
                          class="form-textarea"><?= $suggestions?:'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi commodi cumque esse hic iure, nemo officia quae quasi quis vel veritatis voluptatem, voluptatibus. Aperiam beatae facere fugiat illo sint.' ?></textarea>
                <input type="submit" name="submit" value="Submit" style="margin-top: 10px;">
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
