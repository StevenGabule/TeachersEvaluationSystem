<?php require '../../include/init.php';

if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}

$name = $_SESSION['name'];

function displayCurrentDate()
{
    $date = new DateTime();
    return $date->format('Y-m-d');
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>TEACHERS EVALUATION BY STUDENTS</h2>
            <h5>(Evaluators: <?= ucwords($name) ?>)</h5>
            <br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 26%"><p>Name of the Teacher Evaluated:</p></td>
                    <td><input type="text" class="form-control" name="teacher_name" value="Ms. Margareta"
                               id="teacher_name" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width:100%;">
                            <tr>
                                <td>Subject: <input type="text" class="form-control-md" name="subject"></td>
                                <td>Date Of Evaluation: <input class="form-control-sm" type="text" name="eval_date"
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
            <table style="width: 100%;text-align: left;" border="1">
                <tr>
                    <th>I. EFFECTIVENESS OF TEACHING</th>
                    <th class="center">5</th>
                    <th class="center">4</th>
                    <th class="center">3</th>
                    <th class="center">2</th>
                    <th class="center">1</th>
                </tr>
                <tr>
                    <th>A. Knowledge of the subject-matter</th>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>1. Has ample understanding/grasp of the subject matter.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>2. Shows interest in the subject matter.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>3. Welcomes questions/request/clarification.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>4. Organizes subject matter well.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>5. Selects relevant materials effectively.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td class="average-text">AVERAGE</td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <th>B. Teaching Skills</th>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>1. Speaks clearly and distinctly.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>2. Speaks English/Filipino correctly.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>
                <tr>
                    <td>3. Explains subject matter clearly.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>4. Makes lesson interesting.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>5. Subject matter relevant/practical to current needs</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>6. Uses techniques to student's participation.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>7. Encourage critical thinking.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>8. Makes subject matter relevant to course objectives.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>9. Provides appropriate drills/seat works/assignments.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td class="average-text">AVERAGE</td>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <th>C. Classroom Management</th>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <td>1. Commands student's respect.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>2. Return graded papers/projects.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>3. Fair in dealing with students.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>4. Handles individual/group discipline tactfully.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>5. Explains grading system.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>6. Follows grading system.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td class="average-text">AVERAGE</td>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <th>II. PERSONAL AND SOCIAL TRAITS</th>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <td>1. Creates an atmosphere of easy/security.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>2. Firm and consistent with students..</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>3. Discipline class.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>4. Respect student's ideas and opinions.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>5. Available to students for assistance.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>6. Possesses sense of humor.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>7. Accepts criticism.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>8. Has rapport with students.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>9. Adapts to classroom situations.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>10. Carries self well with confidence.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td class="average-text">AVERAGE</td>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <th>III. SENSE OF COMMITMENT</th>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>1. Comes to class prepared.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>2. Reports to class regularly to teach.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>3. Comes to class punctually..</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td>4. Cares/Concerned for students.</td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="5" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="4" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="3" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="2" id="knowledge-of_the_subject_matter"></td>
                    <td class="center"><input type="radio" name="knowledge-of_the_subject_matter[]" value="1" id="knowledge-of_the_subject_matter"></td>
                </tr>

                <tr>
                    <td class="average-text">AVERAGE</td>
                    <td colspan="5"></td>
                </tr>

            </table>

            <br>
            <br>
            <h3>COMMENTS:</h3>
            <p class="m1"><label for="comment">1. What do you like / do not like about your
                    teacher?</label></p>
            <textarea placeholder="Leave your comment here..." name="comment" id="comment" rows="7" class="form-textarea"></textarea>

            <br>
            <br>
            <h3>SUGGESTIONS:</h3>
            <p class="m1"><label for="suggestions">2. Give your suggestions (if any) for the
                    improvement of your teacher?</label></p>
            <textarea placeholder="Leave your suggestions here..." name="suggestions" id="suggestions" rows="7" class="form-textarea"></textarea>
            <input type="submit" name="submit" value="Submit" style="margin-top: 10px;">
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

    })
</script>
</body>
</html>
