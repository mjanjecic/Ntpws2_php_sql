<?php
/**
 * @var Object $conn
 */

require 'DB/db.inc.php';

#Show all render
#Approved
$allApprovedRenders=mysqli_query($conn, "SELECT * FROM news WHERE approved = 'Y' AND archive = 'N';");

print '<main>';
print '<nav class="navbar">
            <a href="index.php?menu=editRender&createRenders=true" class="createRenders">Add a Render</a>
        </nav>';
if(mysqli_num_rows($allApprovedRenders) != 0) {
    print '<h1>Approved Renders</h1>
        <ul class="renderContainer">';
    while ($row = mysqli_fetch_assoc($allApprovedRenders)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="renderButtons">
                <a href="index.php?menu=editRender&id='.$row['id'].'">EDIT</a>';
        if($_SESSION['user']['role'] == 'ADMIN') {
            print '<a href="index.php?menu=editRender&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>';
        }
            print '</div>
            <li>
                <div class="grid-1">
                    <a href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
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
}

#Archived
$allArchivedRenders=mysqli_query($conn, "SELECT * FROM news WHERE archive = 'Y';");

if(mysqli_num_rows($allArchivedRenders) != 0) {
    print '<h1>Archived Renders</h1>
        <ul class="renderContainer">';
    while ($row = mysqli_fetch_assoc($allArchivedRenders)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="renderButtons">
                <a href="index.php?menu=editRender&id='.$row['id'].'">EDIT</a>';
        if($_SESSION['user']['role'] == 'ADMIN') {
            print '<a href="index.php?menu=editRender&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>';
        }
        print '</div>
            <li>
                <div class="grid-1">
                    <a href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
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
}

#Unapproved
$allUnapprovedRenders=mysqli_query($conn, "SELECT * FROM news WHERE approved = 'N';");

if(mysqli_num_rows($allUnapprovedRenders) != 0) {
    print '<h1>Unapproved Renders</h1>
        <ul class="renderContainer">';
    while ($row = mysqli_fetch_assoc($allUnapprovedRenders)) {
        $imageQuery = mysqli_query($conn, "SELECT * FROM images WHERE id = ".$row['image_id'].";");
        $image = "";
        if(mysqli_num_rows($imageQuery) != 0) {
            $imageInfo = mysqli_fetch_assoc($imageQuery);
            $image = $imageInfo['image_name'];
        }
            print '
            <div class="renderButtons">
                <a href="index.php?menu=editRender&id='.$row['id'].'">EDIT</a>';
        if($_SESSION['user']['role'] == 'ADMIN') {
            print '<a href="index.php?menu=editRender&delete=true&id='.$row['id'].'" style="background: #6c0000">DELETE</a>';
        }
        print '</div>
            <li>
                <div class="grid-1">
                    <a href=href="index.php?menu=renderDetails&id='. $row['id'] .'" class="renderImage">
                        <img src="renders/'.$image.'">
                    </a>
                    <time datetime="2021-10-24">24.10.2021.</time>
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
}

print '</main>';