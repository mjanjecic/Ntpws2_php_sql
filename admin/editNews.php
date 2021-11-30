<?php

/**
 * @var Object $conn
 */

require 'DB/db.inc.php';

if(isset($_POST['submit'])) {
    print "SUBMIT IS SET!";
}


#SUBMIT
if(isset($_POST['submit'])) {
    if(isset($_POST['edit'])) {
        $query = "UPDATE news SET
            title='" . $_POST['title'] . "', 
            description='" . $_POST['description'] . "', 
            content='" . $_POST['content'] . "', 
            archive='" . $_POST['archived'] . "', 
            approved='" . $_POST['approved'] . "'
            WHERE id=" . $_GET['id'] . ";
            ";
        mysqli_query($conn, $query);
        if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
            header("location: index.php?menu=editNews&id=".$_GET['id']."");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    else if(isset($_POST['addNews'])) {
        $image_id = 0;
        #image
        if($_FILES['image']['error'] == UPLOAD_ERR_OK && $_FILES['image']['name'] != "") {
            $ext = strtolower(strrchr($_FILES['image']['name'], "."));
            $image = $_FILES['image']['name'];
            copy($_FILES['image']['tmp_name'], "renders/".$image);
            print "Image stuff";
            if ($ext == '.jpg') {
            print "Image stuff";
                $query = "INSERT INTO images (image_name)  VALUES ('". $image ."');";
                $result = mysqli_query($conn, $query);
                $image_id = mysqli_insert_id($conn);
                print "<br>IMAGE ID $image_id<br>";
                print $result;
                print "<br>";
                if ($result == 1) {
                    echo "Image uploaded successfully";
                    #header("location: index.php?menu=adminNews");
                } else {
                    print "Error uploading image: " . $conn->error;
                    #header("location: index.php?menu=admin");
                }
            }

            #delete old image
            unlink('renders/1.jpeg');
        }

        #News
        $query = "INSERT INTO news (title, description, content, upload_date, archive, approved, image_id) 
                  VALUES ('".$_POST['title'] ."', '".$_POST['description'] ."', '".$_POST['content']."', NOW(), '". $_POST['archived'] ."', '". $_POST['approved'] ."', ".$image_id.");";
        #mysqli_query($conn, $query);
        if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
            #header("location: index.php?menu=adminNews");
        } else {
            print "Error updating record: " . $conn->error;
            #header("location: index.php?menu=admin");
        }
    }
}

#DELETE NEWS
else if(isset($_GET['delete'])) {
    $query = mysqli_query($conn, "DELETE FROM news WHERE id = " . $_GET['id'] . " ;");
    if ($conn->query($query) == TRUE) {
        echo "Article deleted successfully";
        header("location: index.php?menu=adminNews");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

#CREATE NEWS FORM
else if(isset($_GET['createNews'])) {
    print '
            <main>
            <h1>Create news</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" id="addNews" name="addNews" value="true">
                    <label name="title" for="title">Title</label>
                    <input type="text" name="title" id="title" required" placeholder="Title">
                    <label name="description" for="description">Description</label>
                    <input type="description" name="description" id="description" required  placeholder="Description">
                    <label name="content" for="content">Content</label>
                    <textarea name="content" id="content" required placeholder="Content" style="height: 250px"></textarea>
                    <label name="image" for="image">Image</label>
                    <input type="file" name="image" id="image" required>
                    <label name="archived" for="archived">Archive</label>
                    <span>
                        <label name="archived" for="archived">Yes</label>       
                        <input type="radio" id="archived" name="archived" value="0">
                        <label name="archived" for="archived">No</label>
                        <input type="radio" id="archived" name="archived" value="1" checked>
                    </span>
                    <label name="approved" for="approved">Approve</label>
                    <span>
                        <label name="archived" for="approved">Yes</label>       
                        <input type="radio" id="approved" name="approved" value="1" checked>
                        <label name="archived" for="approved">No</label>
                        <input type="radio" id="approved" name="approved" value="0">
                    </span>
        <button type="submit" name="submit">Submit</button>
    </form>
</main>';
}

#EDIT NEWS
else if(isset($_GET['id'])){
    $newsContent=mysqli_query($conn, "SELECT * FROM news WHERE id = ".$_GET['id'].";");
    if (mysqli_num_rows($newsContent) != 0) {
        $row = mysqli_fetch_assoc($newsContent);
        print $row['archive'];
        print '
            <main>
            <h1>Edit news</h1>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" id="edit" name="edit" value="true">
                    <label name="title" for="title">Title</label>
                    <input type="text" name="title" id="title" required value="' . $row['title'] . '" placeholder="Title">
                    <label name="description" for="description">Description</label>
                    <input type="description" name="description" id="description" required value="' . $row['description'] . '" placeholder="Description">
                    <label name="content" for="content">Content</label>
                    <textarea name="content" id="content" required placeholder="Content" style="height: 250px">' . $row['content'] . '</textarea>
                    <label name="approved" for="approved">Approve</label>
                    <span>
                        <label name="approved" for="approved">Yes</label>       
                        <input type="radio" id="approved" name="approved" value="1"';
                        if ($row['approved'] == 1) {
                            print "checked";
                        }
                        print'>
                                        <label name="archived" for="approved">No</label>
                                        <input type="radio" id="approved" name="approved" value="0"';
                        if ($row['approved'] == 0) {
                            print "checked";
                        }
                        print'>
                    </span>
                    
                    <label name="archived" for="archived">Archive</label>
                    <span>
                        <label name="archived" for="archived">Yes</label>       
                        <input type="radio" id="archived" name="archived" value="1"';
                        if ($row['archive'] == 1) {
                            print "checked";
                        }
                        print'>
                        <label name="archived" for="archived">No</label>
                        <input type="radio" id="archived" name="archived" value="0"';
                        if ($row['archive'] == 0) {
                            print "checked";
                        }
                        print'>
                    </span>
        <button type="submit" name="submit">Submit</button>
    </form>
</main>';
    }
}
