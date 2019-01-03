<?php
    // change user for apache
    // https://www.google.de/search?q=how+to+run+xampp+as+normal+user+not+daemon+mac+windows&rlz=1C5CHFA_enDE729DE729&oq=how+to+run+xampp+as+normal+user+not+daemon+mac+windows&aqs=chrome..69i57.19263j0j7&sourceid=chrome&ie=UTF-8
    // https://stackoverflow.com/questions/25821536/xampp-on-mac-osx-why-running-as-daemon

    function rearrangeFilesArray($fa, $nested = false){
        // http://php.net/manual/de/features.file-upload.multiple.php
        $ret = array();
        if (isset($fa['name']) && is_array($fa['name'])) {
            $file_count = count($fa['name']);
            $file_keys = array_keys($fa);
            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $k) {
                    $ret[$i][$k] = $fa[$k][$i];
                }
            }
        }
        else {
            foreach($fa as $key => $val) {
                $arr = array();
                if (is_array($val['name'])) {
                    $tmp = array();
                    $file_count = count($val['name']);
                    $file_keys = array_keys($val);

                    for ($i = 0; $i < $file_count; $i++) {
                        foreach ($file_keys as $k) {
                            $tmp[$i][$k] = $val[$k][$i];
                        }
                    }
                    if ($nested === true) {
                        $arr[$key] = $tmp;
                    }
                    else {
                        $arr = array_merge($arr, $tmp);
                    }
                }
                else {
                    if ($nested === true) {
                        $arr[$key] = $val;
                    }
                    else {
                        $arr[] = $val;
                    }
                }
                $ret = array_merge($ret, $arr);
            }
        }
        return $ret;
    }

    function createDir($path, $dirname) {
        $ret = false;
        $pathanddirectory = $path.'/'.$dirname;
        if (!file_exists($pathanddirectory)) {
            echo "- Der Ordner \"$dirname\" existiert nicht.<br>";
            mkdir($pathanddirectory);
            if (file_exists($pathanddirectory)) {
                echo "- Der Ordner \"$dirname\" wurde erstellt.<br>";
                $ret = true;
            }
            else {
                echo "- Der Ordner \"$dirname\" konnte nicht erstellt werden.<br>";
            }
        }
        else {
            echo "- Der Ordner \"$dirname\" existiert bereits.<br>";
            $ret = true;
        }
        return $ret;
    }

    $send = (isset($_POST['send']) && !empty($_POST['send'])) ? $_POST['send'] : NULL;
    if ($send) {
        if (count($_FILES) > 0) {
            $fies = rearrangeFilesArray($_FILES['myfile']);
            $uplstatus = createDir(__DIR__, 'uploads');
            if ($uplstatus) {
                $docstat  = createDir(__DIR__, 'uploads/docs/');
                if ($docstat) {
                    foreach($fies as $file) {
                        move_uploaded_file($file['tmp_name'],__DIR__.'/uploads/docs'.'/'.$file['name']);
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <title>UploadsTest 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {background:#eee}
        input.file::shadow * {
            color:red;
        }
    </style>
</head>
<body>
<div class="topnav navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="height:40px;">
  </div>  
</div>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                    </div>
                </div>
            </div>

            <div class="row myheader">
                <div class="col">
                    <h1>Upload Test 2</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="file" type="file" name="myfile[]" multiple="multiple">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" name="send" value="Absenden"></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
<!--                         <p>$_FILES</p> -->
                        <?php
//                             echo "<pre>";
//                             print_r($_FILES);
//                             echo "</pre>";
                        ?>
<!--                         <p>$_POST</p> -->
                        <?php
//                             echo "<pre>";
//                             print_r($_POST);
//                             echo "</pre>";
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
