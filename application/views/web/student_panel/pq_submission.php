<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Think Champ Programming Quiz Panel</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/pqq.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body {
        overflow-x: hidden;
    }

    .ques-cont {
        overflow-y: scroll;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-cl">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-white" href="<?= base_url("Challenges") ?>"><img src="<?= base_url('') ?>assets2/images/logo2.png" style="height:50px;" alt=""></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url("Programming/quiz_panel?id=").$_GET['id'] ?>&pqc_m=<?=$_GET['pqc_m'] ?>&pq=<?= $_GET['pq'] ?>">Panel</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-danger"
                        href="<?= base_url("Programming/submission?id=").$_GET['id'] ?>&pqc_m=<?=$_GET['pqc_m'] ?>&pq=<?= $_GET['pq'] ?>">Submission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url("Programming/leaderboard?id=").$_GET['id'] ?>&pqc_m=<?=$_GET['pqc_m'] ?>&pq=<?= $_GET['pq'] ?>">Leaderboard</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <br>
        <h1 class="text-center">Submission</h1>
    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
    <table class="table table-responsive-lg">
        <thead>
            <tr>
                <td class="text-center">Result</td>
                <td class="text-center">Score</td>
                <td class="text-center">Course</td>
                <td class="text-center">Date</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($submitssions as $s){ ?>
            <tr>
                <td class="text-center">
                    <?php if($s['corr_incc']==1){ ?>
                    <span class="text-success"> <i class="fa fa-check-circle" aria-hidden="true"></i>
                        Accepted</span>
                    <?php } ?>
                    <?php if($s['corr_incc']==2){ ?>
                    <span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i> Wrong
                        Answer</span>
                    <?php } ?>
                </td>
                <td class="text-center"><?= $s['marks_obtained'] ?></td>
                <td class="text-center"><?= $s['course_name'] ?></td>
                <td class="text-center"><?= date('d M, y h:i A',strtotime($s['submited_at'])) ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</blockquote><!-- END -->
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.15.0/ace.js"
        integrity="sha512-vgArOyW+sdp69qm3025hO1uoxhMZ7rzc2NZbaC/0eUD92rYIx4YSI/NdQ1+oINXb8tXoFQJyQqpfV9KxoPGuCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url("assets2/assets/js/pqq.js") ?>"></script>
</body>

</html>
