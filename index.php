<!DOCTYPE html>
<tbody>
<?php error_reporting(0);

$msg = "";

if ( isset( $_POST['upload']) ) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder   = $filename;

    if ( move_uploaded_file( $tempname, $folder ) ) {
        $msg = "Image uploaded successfully";
    } else{
        $msg = "Failed to upload image";
	}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
    <h2><?php echo $msg; ?></h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" onchange="loadFile(event)"/>
        <button type="submit" name="upload">UPLOAD</button>
    </form>
    </body>
        <h1 class="heading">Hash Tag Generator</h1>
        <div class="card" style="width: 40%;">
        <img id="output"/>
      <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
      </script>
            <div class="card-body">
              <h2>Hash Tags</h2>
              <p id="card_tags" class="card-text">
                <?php
                echo "Running";
                shell_exec('python tag.py asdadasdada https://static.pexels.com/photos/248797/pexels-photo-248797.jpeg tags.txt');
                $myfile = fopen("tags.txt", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("tags.txt"));
                fclose($myfile);
                ?>
              </p>
            </div>
          </div>
        <script src="" async defer></script>
    </body>
</html>