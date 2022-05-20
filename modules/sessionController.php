<?php

function checkSession()
{
    session_start();


    $path = basename($_SERVER['REQUEST_URI'], "?" . $_SERVER['QUERY_STRING']);

    if ($path == "php-sessions" || $path == "index.php") {
        if (isset($_SESSION["email"])) {
            header("Location: dashboard.php");
        } else {
            if (isset($_GET["loginerror"])) {
                return ["message" => "Please, isert a valid email/password", "type" => "alert"];
            }

            if(isset($_GET["logout"])){
                return ["message" => "You have sucessfully logged out", "type" => "success"];
            }
        }
    } else {
        if (!isset($_SESSION["email"])) {
            header("Location: ../index.php");
        }
    }
}

function userAuthorization()
{

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (validateUser($email, $password)) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../index.php?loginerror=true");
    }
}

// User's vallidation function
function validateUser(string $email, string $password)
{
    $emailDb = "aliciacembranos@gmail.com";
    $passwordDb = "assemblerstudent";

    $passEncrypted = password_hash($passwordDb, PASSWORD_DEFAULT);

    if (($email === $emailDb) && password_verify($password, $passEncrypted)) return true;
    else return false;
}

function logout()
{
    session_start();

    //unset array session
    unset($_SESSION);

    // destroy session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    //destroy the session
    session_destroy();

    header("Location: ../index.php?logout=true");
}

//getname from email
function getName($email)
{
    return ucfirst(explode("@", $email)[0]);
}
