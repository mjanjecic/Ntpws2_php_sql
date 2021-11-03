<?php

print '
<main>
    <h1>Gallery</h1>
    <div class="GalleryGrid" id="GalleryGrid">
        <div id="FullImage" onclick="CloseImage()">
            <img id="Test" src="" alt="No Image loaded">
        </div>
        <figure>
            <img src="images/gallery/1.jpeg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 1</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/2.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 2</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/3.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 3</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/4.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 4</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/5.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 5</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/6.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 6</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/7.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 7</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/8.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 8</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/8.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 8</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/3.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 3</figcaption>
        </figure>
        <figure>
            <img src="images/gallery/4.jpg" alt="Image" onclick="OpenImage(this.src)">
            <figcaption>Image 4</figcaption>
        </figure>

    </div>
</main>

<script>
    function OpenImage(imageSrc) {
        let imageName=imageSrc;
        document.getElementById("FullImage").style.display="block";
        console.log(imageSrc)
        document.getElementById("Test").src=imageSrc;
    }

    function CloseImage() {
        document.getElementById("FullImage").style.display="none";
    }
</script>
';