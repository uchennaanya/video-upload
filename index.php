<?php
    $target_dir = "uploaded/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["file"]["size"] > 50000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4" && $imageFileType != "3GPP") {
        echo "Sorry, only wmv, mp4 & avi files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else
    $vidname = $_FILES["file"]["name"] . "";
    $vidsize = $_FILES["file"]["size"] . "";
    $vidtype = $_FILES["file"]["type"] . "";
    $sql = "INSERT INTO video (name, size, type) VALUES ('$vidname','$vidsize','$vidtype')";
    if ($conn->query($sql) === TRUE) {} 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <label for="file"><span>Filename:</span></label>
            <input type="file" name="file" id="file" /> 
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
		<h1> I tried making some changes here... </h1>
    </body>
</html>