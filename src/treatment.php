<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20/04/18
 * Time: 20:40
 */

$options = ['Question', 'Contact', 'Aftersale', 'Other'];
// some char error filter //
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// LASTNAME //
function lastnameValidator(string $data): string
{
    if (empty($data)){
        return "Lastname is required";
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$data)) {
        return "Only letters and white space allowed";
    }
    return '';
}

function lastname(string $data): string
{
    return $data = strtoupper($data);
}

// FIRSTNAME //

function firstnameValidator(string $data): string
{
    if (empty($data)){
        return "Firstname is required";
    }
    if (!preg_match("/^[a-zA-Z \-]*$/",$data)) {
        return "Only letters, white space and hyphen allowed";
    }
    return '';
}

function firstname(string $data): string
{
    return $data = strtolower(ucfirst($data));
}

// EMAIL //

function emailValidator(string $data): string
{
    if (empty($data)){
        return "email is required";
    }

    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return '';
}

function email(string $data): string/*todo???*/
{

}

// PHONE //
function phoneValidator(string $data): string
{
    if (empty($data)){
        return "Phone number is required";
    }
    if (!preg_match("/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/",$data)) {
        return "Invalid phone number format. Use French format : +33605040302 or 0605040302";
    }
    return '';
}

function phone(string $data): string
{
    if(strpos($data, "+33") === 0){
        return $data = "(+33)" . substr($data , -9);
    }
    return $data;
}

// SELECT //
function selectValidator(string $data, array $options): string
{
    if (empty($data)){
        return "Message type is required";
    }
    if(!in_array($data, $options)) {
        return "You have to select one of message type.";
    }
    return '';
}

// MESSAGE //
function messageValidator(string $data): string
{
    if (empty($data || strlen($data) < 25)){
        return "message content is required";
    }
    if(strlen($data) > 450 ){
        return "You have to select one of message type.";
    }
    return '';
}

function errorsCheck(array $errors): bool
{
    foreach($errors as $error){
        if(!empty($error)){
        return false;
        }
    }
    return true;
}
