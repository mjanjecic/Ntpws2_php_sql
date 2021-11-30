<?php

/**
 * @var Object $conn
 */

// Include the database configuration file
require_once 'DB/db.inc.php';

session_start();

$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];
$approved = false;

if($_SESSION['user']['role'] == "ADMIN") {
    $approved = true;
}


$query = "INSERT INTO news (title, description, content, upload_date, approved) VALUES 
          ('$title', '$description', '$content', NOW(), '$approved')";
if (mysqli_query($conn, $query)) {

    echo "News added successfully.";
    #header("location: ./index.php?menu=news");
} else {
    echo "ERROR: Could not execute $query. " . mysqli_error($conn);
    header("location: ./index.php?menu=createNews&error=error");
}

$newsId = mysqli_insert_id( $conn);

// If file upload form is submitted
$status = $statusMsg = '';
$status = 'error';
if(!empty($_FILES["main_image"]["name"])) {
    // Get file info
    $fileName = basename($_FILES["main_image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg');

    if(in_array($fileType, $allowTypes)){
        $image = $_FILES['main_image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Insert image content into database
        $insert = $conn->query("INSERT into images (image, uploaded, news_id) VALUES ('$imgContent', NOW(), $newsId)");
        if($insert){
            $status = 'success';
            $statusMsg = "File uploaded successfully.";
        }else{
            $statusMsg = "File upload failed, please try again.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select an image file to upload.';
}

// Display status message
echo $statusMsg;