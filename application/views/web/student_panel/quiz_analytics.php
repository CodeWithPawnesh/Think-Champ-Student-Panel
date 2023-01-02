<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .body{
        background-color: #0cb2f4;
    }
    .table{
        position:relative;
        top:150px;
    }
    h2{
        position: relative;
        top:100px
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz analytics</title>
    <link rel="stylesheet" href="<?= base_url("assets/dashboard/css/bootstrap1.min.css") ?>" />
</head>

<body class="body">
    <div class="container text-white">
        <h2 class="text-center">Quiz Analytics</h2>
        <a href="<?= base_url("Quiz") ?>" class="btn btn-sm btn-success">Back</a>
        <table class=" table table-bordered text-white">
            <tbody>
                <tr>
                    <td class="col-sm-6 text-center">Quiz Name</td>
                    <td class="col-sm-6 text-center"><?= $quiz_result['quiz_title'] ?></td>
                <tr>
                    <td class="col-sm-6 text-center">Student Name</td>
                    <td class="col-sm-6 text-center"><?= $quiz_result['student_name'] ?></td>
                </tr>
                <tr>
                    <td class="col-sm-6 text-center">Total Questions</td>
                    <td class="col-sm-6 text-center"><?= sizeof($quiz_questions) ?></td>
                </tr>
                <tr>
                    <td class="col-sm-6 text-center">Questions Attempted</td>
                    <td class="col-sm-6 text-center"><?= sizeof(json_decode($quiz_result['question_answers'])) ?></td>
                </tr>
                <tr>
                    <td class="col-sm-6 text-center">Total Marks</td>
                    <td class="col-sm-6 text-center"><?= $msum ?></td>
                </tr>
                <tr>
                    <td class="col-sm-6 text-center">Marks Obtained</td>
                    <td class="col-sm-6 text-center"><?= $quiz_result['marks_obtained'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>