<?php
class FileUpload
{

    public function uploadFile($avatar)
    {
        $target_dir = "../assets/";
        $target_file = $target_dir . basename($_FILES[$avatar]["name"]);
        $uploadOk = 1;

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$avatar]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".<br/>";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES[$avatar]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES[$avatar]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
