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
        <a class="navbar-brand text-white" href="<?= base_url("Challenges") ?>">Think Champ Programming Quiz Panel</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url("Programming/submissions?id=").$_GET['id'] ?>&pqc_m=<?=$_GET['pqc_m'] ?>&pq=<?= $_GET['pq'] ?>">Submission</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-5 ">
                <div class="ques-cont">
                    <?= $code_data['challenge_text'] ?>
                </div>
            </div>
            <div class="col-sm-7 ed-cont">
                <div class="ed-cont">
                    <div class="editor-container">
                        <div class="control-panel">
                            Select Language:
                            &nbsp;&nbsp;
                            <select class="languages " id="languages" onchange="changeLanguage()">
                                <option value="python">Python</option>
                                <option value="c">C</option>
                                <option value="cpp">C++</option>
                                <option value="php">PHP</option>
                                <option value="node">Node JS</option>
                            </select>
                        </div>
                        <div class="editor" id="editor">
                        </div>
                        <div class="editor-bottom">
                        </div>
                    </div>
                    <div class="button-container">
                        <button class=" btn-st" onclick="executeCode()">Run</button>
                    </div>
                    <div class="wrong-ans hide">
                        <h1>Compilation error :(</h1>
                    </div>
                </div>
                <div class="correct-ans hide">
                    <div class="cont-ans">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="text-white">Congratulations</h2>
                                <p class="ans-para">You solved this challenge. Want more Challenges? <br>Click on
                                    Next<strong> Button<strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="output hide">
                    <h5>Compiler Message</h5>
                    <div class="output-text">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.15.0/ace.js"
        integrity="sha512-vgArOyW+sdp69qm3025hO1uoxhMZ7rzc2NZbaC/0eUD92rYIx4YSI/NdQ1+oINXb8tXoFQJyQqpfV9KxoPGuCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url("assets2/assets/js/pqq.js") ?>"></script>
</body>

</html>
<script>
let editor;
window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/python");
    editor.setValue("<?= $code_data['challenge_prog_text'] ?>");
}

function changeLanguage() {
    let language = $("#languages").val();
    if (language == 'c' || language == 'cpp') {
        editor.session.setMode("ace/mode/c_cpp");
    }
    if (language == 'php') {
        editor.session.setMode("ace/mode/php");
    }
    if (language == 'python') {
        editor.session.setMode("ace/mode/python");
    }
    if (language == 'node') {
        editor.session.setMode("ace/mode/javascript");
    }
}

function executeCode() {
    $.ajax({
        url: "compiler",
        method: "POST",
        dataType: "text",
        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },

        success: function(response) {
            var result = $.trim(response);
            if (result == "<?= $code_data['challenge_output']?>") {
                $.ajax({
                   url: "save",
                   method: "POST",
                   dataType: "text",
                   data: {
                    ch_id: <?= $ch_id; ?>,
                    pq: <?= $pq; ?>,
                    pqc_m: <?= $pqc_m ?>,
                    result: result,
                    marks: <?= $code_data['marks']?>,
                    c_in: "1",
                  },
               success: function(response) {
                $(".wrong-ans").hide();
                $(".correct-ans").show();
                $(".output").show()
                $(".output-text").text(response)
                  }
                  });
            } else {
                $.ajax({
                   url: "save",
                   method: "POST",
                   dataType: "text",
                   data: {
                    ch_id: <?= $ch_id; ?>,
                    pq: <?= $pq; ?>,
                    pqc_m: <?= $pqc_m ?>,
                    result: result,
                    marks: "0",
                    c_in: "2",
                  },
               success: function(response) {
                $(".wrong-ans").show();
                $(".correct-ans").hide();
                $(".output").show()
                $(".output-text").text(response)
                  }
                  });
            }
        }
    })
}
</script>