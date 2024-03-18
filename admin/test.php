<input type="file" name="image">

<?php if (isset($_FILES['image']['name'])) {
    $image_name = $_FILES['image']['name'];
    if ($image_name != "") {
        $tmp = explode('.', $image_name);
        $extension = end($tmp); // pour avoir l'extension de l'image exp : .jpg

        $image_name = "img-" . rand(0000, 9999) . "." . $extension; // changer le nom de l'image 
        $src = $_FILES['image']['tmp_name'];

        $dst = "../images/" . $image_name; // chemin de dossier + nom d'image

        $upload = move_uploaded_file($src, $dst);
    }
}
?>