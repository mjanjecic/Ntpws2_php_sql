<?php

/**
 * @var Object $conn
 */

require 'DB/db.inc.php';


if(isset($_GET['id'])) {
    $article = mysqli_query($conn, "SELECT * FROM news WHERE id = " . $_GET['id'] . ";");
    if(mysqli_num_rows($article) != 0) {
        $row = mysqli_fetch_assoc($article);
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
        print '
<main >
<div class="imageGallery">
      <img src="renders/'.$image.'" alt="'.$image.'">
    </div>
  <div class="articleContent">
  
    <h1>'.$row['title'].'</h1>
    <h3>'.$row['description'].'</h3>
    <p>'.$row['content'].'</p>
    <a href="index.php?menu=renders" class="renderLink">See other renders</a>
  </div>
</main>';
    }
} else {
    print "OOPS. Something went wrong.";
}
