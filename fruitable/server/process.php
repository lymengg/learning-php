<?php

session_start();
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/classes/Database.php');
require_once(__ROOT__ . '/vendor/autoload.php');

use Ramsey\Uuid\Rfc4122\UuidV4;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_name = $_POST['form_name'];

    $mydb = Database::getConnection();

    if ($form_name == 'login_form') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $redirect_url = "";

        if (isset($_POST['redirect_url'])) {
            $redirect_url = $_POST['redirect_url'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mydb::getConnection()->prepare("SELECT user_id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hash_password_from_db);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hash_password_from_db)) {
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                $response = array();

                if ($redirect_url != '') {
                    $response['redirect_url'] = $redirect_url;
                }
                exit;
            } else {
                $error = "Invalid username or password!";
            }
        } else {
            $error = "Invalid username or password!";
        }
    } else if ($form_name == 'register_form') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        $familyName = $_POST['family_name'];
        $firstName = $_POST['first_name'];
        $dateOfBirth = $_POST['date_of_birth'];
        $email = $_POST['email'];
        $user_uuid = UuidV4::uuid4()->toString();

        $error_message = "";

        if (empty($username) || empty($password) || empty($familyName) || empty($firstName) || empty($dateOfBirth) || empty($email)) {
            $error_message = "All fields are required.";
            echo $error_message;
            exit;
        }

        if ($password !== $confirmPassword) {
            $error_message = "Passwords do not match.";
            echo $error_message;
            exit;
        }

        // Check if the username or email already exists
        $stmt = $mydb->prepare("SELECT user_id FROM user WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "Username or email already exists.";
            $response_body = new ResponseBody(400, false, $error_message);
            echo json_encode($response_body);
            $stmt->close();
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mydb->prepare("INSERT INTO user (username, user_unique_id, password, family_name, first_name, date_of_birth, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $user_uuid,  $hashedPassword, $familyName, $firstName, $dateOfBirth, $email);

        if ($stmt->execute()) {
            $error_message = "Registration successful!";
            $_SESSION['user_id'] = $user_uuid;
            $_SESSION['loggedIn'] = true;
            echo $error_message;
        } else {
            echo $stmt->error;
        }

        $stmt->close();
        exit;
    } else if ($form_name == 'add_to_cart_form') {
        $product_id = $_POST['product_id'];

        if (isset($_SESSION['user_id']) && isset($_SESSION['loggedIn'])) {
            $stmt = $mydb->prepare("INSERT INTO cart (fruit_id, user_id) VALUES (?, ?)");
            $stmt->bind_param("ss", $product_id, $_SESSION['user_id']);
            exit();
        } else {
            $response = array();
            $response['redirect_url'] = 'http://localhost:81/php-projects/fruitable/login.php?redirect_url=index.php';
            echo json_encode($response);
            exit();
        }
    }
}
