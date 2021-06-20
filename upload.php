<?php

$con = mysqli_connect("localhost", "root", "", "Drag&drop");

if ($con) {

    if ($_FILES['file']['name'] != "") {

        $filenames = "";

        $total_files = count($_FILES['file']['name']);

        for ($i = 0; $i < $total_files; $i++) {
            $name = $_FILES['file']['name'][$i];
            $file_ext = pathinfo($name, PATHINFO_EXTENSION);
            $valid_exttensions = array("png", "jpg", "jpeg");

            if (in_array($file_ext, $valid_exttensions)) {

                // codes For Upload Image in Directory
                $tmpname = $_FILES['file']['tmp_name'][$i];
                $insertname = rand() . "." . $file_ext;
                $path = "Images/" . $insertname;
                move_uploaded_file($tmpname, $path);

                $filenames .= $insertname . ",";
            } else {
                echo "File Must Be In jpg,jpeg or PNG Formate";
            }
        }

        // codes For Upload Image in Database

        $sql = "INSERT INTO `m1`(`Image`) values('{$filenames}')";
        if (mysqli_query($con, $sql)) {
            echo true;
        } else {
            // echo "Upload Error";
            echo $sql;
        }
    } else {
        echo "File Not Uploadede Succesfully";
    }
} else {
    die("Connection Failed :" . mysqli_connect_error());
}
