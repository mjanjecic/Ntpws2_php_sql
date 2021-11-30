<form action="createNewsSubmit.php" method="post" enctype="multipart/form-data">
    <label name="title" for="title">Title</label>
    <input type="text" required name="title" id="title">
    <label name="description" for="description">Description</label>
    <input type="text" required name="description" id="description">
    <label name="content" for="content">Content</label>
    <input type="textarea" required name="content" id="content">
    <label name="image" for="main_image">Image</label>
    <input type="file" required name="main_image" id="main_image">
    <label name="username" for="images">Title</label>
    <input type="file" name="images" id="images" multiple>
    <button type="submit">Submit</button>
</form>