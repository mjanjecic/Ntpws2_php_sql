<?php
/**
 * @var Object $conn
 */

require 'DB/db.inc.php';

#Show all news
#Approved
$allApprovedNews=mysqli_query($conn, "SELECT * FROM news WHERE approved = 1 AND archive = 0;");

print '<main>';
print '<nav class="navbar">
            <a href="index.php?menu=editNews&createNews=true" class="createNews">Create News</a>
        </nav>';
if(mysqli_num_rows($allApprovedNews) != 0) {
    print '<h1>Approved News</h1>
        <ul class="newsContainer">';
    while ($row = mysqli_fetch_assoc($allApprovedNews)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="newsButtons">
                <a href="index.php?menu=editNews&id='.$row['id'].'">EDIT</a>
                <a href="index.php?menu=editNews&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>
            </div>
            <li>
                <div class="grid-1">
                    <a href="index.php?menu=news1" class="newsImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
                </div>
                <div class="grid-2">

                    <a href="index.php?menu=news1">
                        <h1>' . $row['title'] . '</h1>
                    </a>
                    <p>
                        ' . $row['description'] . '
                        <a href="index.php?menu=news1">More...</a>
                    </p>
                </div>
            </li>';
    }
    print '</ul>';
}

print "<p>TEST</p>";

#Archived
$allArchivedNews=mysqli_query($conn, "SELECT * FROM news WHERE archive = 1;");

if(mysqli_num_rows($allArchivedNews) != 0) {
    print '<h1>Archived News</h1>
        <ul class="newsContainer">';
    while ($row = mysqli_fetch_assoc($allArchivedNews)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="newsButtons">
                <a href="index.php?menu=editNews&id='.$row['id'].'">EDIT</a>
                <a href="index.php?menu=editNews&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>
            </div>
            <li>
                <div class="grid-1">
                    <a href="index.php?menu=news1" class="newsImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
                </div>
                <div class="grid-2">
                    <a href="index.php?menu=news1">
                        <h1>' . $row['title'] . '</h1>
                    </a>
                    <p>
                        ' . $row['description'] . '
                        <a href="index.php?menu=news1">More...</a>
                    </p>
                </div>
            </li>';
    }
    print '</ul>';
}

print "<p>TEST</p>";
#Unapproved
$allUnapprovedNews=mysqli_query($conn, "SELECT * FROM news WHERE approved = 0;");

if(mysqli_num_rows($allUnapprovedNews) != 0) {
    print '<h1>Unapproved News</h1>
        <ul class="newsContainer">';
    while ($row = mysqli_fetch_assoc($allUnapprovedNews)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="newsButtons">
                <a href="index.php?menu=editNews&id='.$row['id'].'">EDIT</a>
                <a href="index.php?menu=editNews&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>
            </div>
            <li>
                <div class="grid-1">
                    <a href="index.php?menu=news1" class="newsImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
                </div>
                <div class="grid-2">
                    <a href="index.php?menu=news1">
                        <h1>' . $row['title'] . '</h1>
                    </a>
                    <p>
                        ' . $row['description'] . '
                        <a href="index.php?menu=news1">More...</a>
                    </p>
                </div>
            </li>';
    }
    print '</ul>';
}

print '</main>';



#Show info for 1 news