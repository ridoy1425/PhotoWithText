<?php

if (isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    move_uploaded_file($file_tmp, $file_name);
    header("Content-type: image/jpeg");
    $string = $_POST['caption'];

    $font = 12;

    $width = imagefontwidth($font) * strlen($string);

    $height = imagefontheight($font);

    $im = imagecreatefromjpeg($file_name);
    // $x = imagesx($im) - $width;
    $x = 433;

    // $y = imagesy($im) - $height;
    $y = 332;

    $textColor = imagecolorallocate($im, 255, 255, 255);;

    imagestring($im, $font, $x, $y, $string, $textColor);

    //save the picture
    imagejpeg($im);
    unlink($file_name);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Text Add With Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        .container {
            margin: 100px;
            width: 400px;
            padding: 50px;
            background-color: #000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <input type="caption" class="form-control" name="caption" id="caption">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>