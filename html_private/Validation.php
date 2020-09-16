<?php
 
function ValidateTextField($element)
{
    global $errorMessages;

    $value = trim($_POST[$element]);

    switch ($element) {
        case 'fname':
            if (!empty($value)) {
                if (!ctype_alpha($value)) {
                    $errorMessages['Name'] = 'Can only contain alphabetic characters.';
                }
            } else {
                $errorMessages['Name'] = 'Cannot be empty.';
            }
            break;
        case 'lname':
            if (!empty($value)) {
                if (!ctype_alpha($value)) {
                    $errorMessages['Surname'] = 'Can only contain alphabetic characters.';
                }
            } else {
                $errorMessages['Surname'] = 'Cannot be empty.';
            }
            break;
        case 'mname':
            if (!empty($value)) {
                if (!ctype_alpha($value)) {
                    $errorMessages['Middle Name'] = 'Can only contain alphabetic characters.';
                }
            }
            break;
        case 'idNum':
            if (!empty($value)) {
                if (!ctype_digit($value) || strlen($value) != 13) {
                    $errorMessages['ID Number'] = 'Invalid phone number.';
                }
            } else {
                $errorMessages['ID Number'] = 'Cannot be empty.';
            }
            break;
        case 'cell':
            if (!empty($value)) {
                if (!ctype_digit($value) || strlen($value) != 10) {
                    $errorMessages['Cell'] = 'Invalid phone number.';
                }
            } else {
                $errorMessages['Cell'] = 'Cannot be empty.';
            }
            break;
        case 'email':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errorMessages['Email'] = 'Invalid email address.';
                }
            } else {
                $errorMessages['Email'] = 'Cannot be empty.';
            }
            break;
        case 'txaComments':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Comments'] = 'Cannot contain special characters.';
                }
            }
            break;
        case 'username':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Username'] = 'Cannot contain special characters.';
                }
            } else {
                $errorMessages['Username'] = 'Cannot be empty.';
            }
            break;
        case 'heading':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Heading'] = 'Cannot contain special characters.';
                }
            } else {
                $errorMessages['Heading'] = 'Cannot be empty.';
            }
            break;
        case 'comments':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Comments'] = 'Cannot contain special characters.';
                }
            } else {
                $errorMessages['Comments'] = 'Cannot be empty.';
            }
            break;
        case 'pwd':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Password'] = 'Cannot contain special characters.';
                }
            } else {
                $errorMessages['Password'] = 'Cannot be empty.';
            }
            break;
        case 'pwd1':
            if (!empty($value)) {
                if (!filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
                    $errorMessages['Password Confirm'] = 'Cannot contain special characters.';
                }
            } else {
                $errorMessages['Password Confirm'] = 'Cannot be empty.';
            }
            break;
        case 'Dqualification':
            if (!empty($value)) {
                if (substr($value, 0, 1) === '-') {
                    $errorMessages['Qualification'] = 'Select a qualification.';
                }
            }
            break;
    }
}