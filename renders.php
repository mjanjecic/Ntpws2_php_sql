<?php
/**
 * @var Object $conn
 */

require 'DB/db.inc.php';
#$allrender=mysqli_query($conn, "SELECT * FROM render WHERE approved = 1 AND archive = 0;");


$allApprovedrender=mysqli_query($conn, "SELECT * FROM news WHERE approved = 'Y' AND archive = 'N';");

print '<main>';
print '<nav class="navbar">
            <a href="index.php?menu=editRender&createRenders=true" class="createRenders">Add a Render</a>
        </nav>';
    if(mysqli_num_rows($allApprovedrender) != 0) {
    print '
    <ul class="renderContainer">';
        while ($row = mysqli_fetch_assoc($allApprovedrender)) {
            $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
            $image = "";
            if(mysqli_num_rows($imageQuery) != 0) {
                $imageInfo = mysqli_fetch_assoc($imageQuery);
                $image = $imageInfo['image_name'];
            }
            $strDate = $row['upload_date'];
            $date = strtotime($strDate);
            $date = date('d/M/Y', $date);
        print '
        <li>
            <div class="grid-1">
                <a href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderImage">
                    <img src="renders/'.$image.'">
                </a>
                <time datetime="2021-10-24">Upload date: '. $date .'</time>
            </div>
            <div class="grid-2">
                <a href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderLink">
                    <h2>' . $row['title'] . '</h2>
                </a>
                <p>
                    ' . $row['description'] . '
                    <a href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderLink">More...</a>
                </p>
            </div>
        </li>';
        }
        print '</ul>';
    } else {

        print '<h1>There are no renders';
    }
