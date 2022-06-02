<?php
session_start();
include_once "config.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (!empty($name) && !empty($email) && !empty($password)) {
    //E-mail Validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //check if the email is already in the database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) == 0) {
            //check if the password is correct
            if (strlen($password) >= 8) {
                //Check if the image is uploaded
                if (file_exists($_FILES['image']['tmp_name'])) {
                    $image_name = $_FILES['image']['name'];
                    $image_tmp_name = $_FILES['image']['tmp_name'];

                    $image_explode = explode('.', $image_name);
                    $image_ext = end($image_explode);
                    $supported_ext = ['jpg', 'png', 'gif', 'jpeg'];

                    //image format validation
                    if (in_array($image_ext, $supported_ext)) {

                        $new_image_name = md5(time() . $image_name) . '.' . $image_ext;
                        if (move_uploaded_file($image_tmp_name, '../storage/' . $new_image_name)) {
                            $status = 'Active';
                            $random_id = rand(time(), 1000000000);
                            //insert data into the table
                            $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id,name, email, password, img) VALUES('{$random_id}','{$name}','{$email}','{$password}','{$new_image_name}')");
                            if ($sql2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {

                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo 'success';
                                    //print_r($_SESSION);
                                }
                            } else {
                                echo 'Error uploading data';
                            }
                        } else {
                            echo 'something went wrong';
                        }
                    } else {
                        echo "Upload your image in .jpg .png or .gif format";
                    }
                } else {
                    echo "Please upload an image";
                }
            } else {
                echo "Password is too short";
            }
        } else {
            echo "Email is already in the database";
        }
    } else {
        echo "Enter a valid email address";
    }
} else {
    echo "All fields are required";
}
