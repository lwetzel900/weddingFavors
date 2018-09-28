<?php

require_once('database.php');

function hashPassword($password) {
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_DEFAULT, $options);
}

function adminPassword($password) {
    $isGood = false;
    $adminPass = "Password123";
    if ($password == $adminPass) {
        $isGood = true;
    }

    return $isGood;
}

//functions for validation
function isValidName($name) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9\s]{0,24}$/"/* taken from course website */, $name)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidState($state) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z]{2}$/", $state)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidAddress($address) {
    $isGood = false;
    if (preg_match("/^[0-9][a-zA-Z0-9\s]{0,30}$/", $address)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidZip($zip) {
    $isGood = false;
    if (preg_match("/^\d{5}$/"/* taken from javascript lecture */, $zip)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidSearch($search) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z0-9][a-zA-Z0-9\s]{0,24}$/"/* taken from javascript assignment */, $search)) {
        $isGood = true;
    }
    return $isGood;
}
function isValidPhone($phone) {
    $isGood = false;
    if (preg_match("/^\d{3}-\d{3}-\d{4}$/"/* taken from javascript assignment */, $phone)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidEmail($email) {
    $isGood = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidPassword($password) {
    /* 10 chars? */
    $minAcceptableValue = 3;
    $minPasswordLength = 10;
    $counter = 0;

    if (hasOneUppercase($password)) {
        $counter++;
    }
    if (hasOneLowercase($password)) {
        $counter++;
    }
    if (hasOneDigit($password)) {
        $counter++;
    }
    if (hasOneSpecialChar($password)) {
        $counter++;
    }
    if ($counter >= $minAcceptableValue && strlen($password) >= $minPasswordLength) {
        return true;
    } else {
        return false;
    }
}

/* * ***************************************** */
/* password specific functions */
/* * ***************************************** */

function hasOneUppercase($password) {
    $isGood = false;
    //$checker = preg_match("/[A-Z]/"/* taken from course website */, $password);
    if (preg_match("/[A-Z]/"/* taken from course website */, $password) === 1) {
        $isGood = true;
    }
    return $isGood;
}

function hasOneLowercase($password) {
    $isGood = false;
    if (preg_match("/[a-z]/"/* taken from course website */, $password) === 1) {
        $isGood = true;
    }
    return $isGood;
}

function hasOneDigit($password) {
    $isGood = false;
    if (preg_match("/[0-9]/"/* taken from course website */, $password) === 1) {
        $isGood = true;
    }
    return $isGood;
}

function hasOneSpecialChar($password) {
    $isGood = false;
    if (preg_match("/[!@#$%^&*()[\]{}\|;:,<.>\/?\-=_+]/"/* taken from course website */, $password) === 1) {
        $isGood = true;
    }
    return $isGood;
}

//*************************************************************************
//admin validation

function isValidDescription($descript) {
    $isGood = false;
    //$strlength = strlen($state);
    // I'm not sure why I have to but it keeps escaping my ending bracket if I use [\/\\]
    // adding the extra \ makes it work but none of the regex testers agree...
    // My best guess, while it shouldn't be doing it in a character class its translating \\ into \ which is escaping the next character
    if (strlen($$descript) > 2 && strlen($$descript) > 256 &&
            preg_match("/[\/\\\<\>:\"|\?*\.]/", $$descript) === 0 &&
            preg_match("/^\s/", $$descript) === 0 &&
            preg_match("/\s$/", $$descript) === 0) {
        $isGood = true;
    }
    return $isGood;
}