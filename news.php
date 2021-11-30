<?php
/**
 * @var Object $conn
 */

require 'DB/db.inc.php';
#$allNews=mysqli_query($conn, "SELECT * FROM news WHERE approved = 1 AND archive = 0;");


$allApprovedNews=mysqli_query($conn, "SELECT * FROM news WHERE approved = 1 AND archive = 0;");

print '<main>';

    if(mysqli_num_rows($allApprovedNews) != 0) {
    print '
    <ul class="newsContainer">';
        while ($row = mysqli_fetch_assoc($allApprovedNews)) {
            $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
            $image = "";
            if(mysqli_num_rows($imageQuery) != 0) {
                $imageInfo = mysqli_fetch_assoc($imageQuery);
                $image = $imageInfo['image_name'];}
        print '
        <li>
            <div class="grid-1">
                <a href="index.php?menu=newsDetails&id='. $row['id'] .'" class="newsImage">
                    <img src="renders/'.$image.'">
                </a>
                <time datetime="2021-10-24">24.10.2021.</time>
            </div>
            <div class="grid-2">
                <a href="index.php?menu=newsDetails&id='. $row['id'] .'">
                    <h1>' . $row['title'] . '</h1>
                </a>
                <p>
                    ' . $row['description'] . '
                    <a href="index.php?menu=newsDetails&id='. $row['id'] .'">More...</a>
                </p>
            </div>
        </li>';
        }
        print '</ul>';
    } else {

        print '<h1>There are no news';
    }
