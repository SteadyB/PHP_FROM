<?php
require "treatment.php";

/* W3S validator // start // */


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ERROR //
    $errors = [];

    // LASTNAME //
    $_POST["user_Lname"] = test_input($_POST["user_Lname"]);
    $errors["lastNameERR"] = lastnameValidator($_POST["user_Lname"]);
    $_POST["user_Lname"] = lastname($_POST["user_Lname"]);

    // FIRSTNAME //
    $_POST["user_Fname"] = test_input($_POST["user_Fname"]);
    $errors["firstNameERR"] = firstnameValidator($_POST["user_Fname"]);
    $_POST["user_Fname"] = firstname($_POST["user_Fname"]);

    // EMAIL //
    $_POST["user_email"] = test_input($_POST["user_email"]);
    $errors["emailERR"] = emailValidator($_POST["user_email"]);

    // PHONE //
    $_POST["user_phone"] = test_input($_POST["user_phone"]);
    $errors["phoneERR"] = phoneValidator($_POST["user_phone"]);
    $_POST["user_phone"] = phone($_POST["user_phone"]);

    // SELECT //
    if (key_exists("msg_type", $_POST)){
        $_POST["msg_type"] = test_input($_POST["msg_type"]);
        $errors["selectERR"] = selectValidator($_POST["msg_type"], $options);
    } else { $errors["selectERR"] = "You have to select one of message type.";
    }
    // MESSAGE //
    $_POST["user_message"] = test_input($_POST["user_message"]);
    $errors["messageERR"] = messageValidator($_POST["user_message"]);
}

