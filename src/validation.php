<?php

function validateTextInput($input): string|false {
    if (!preg_match_all("/[а-яА-Я .ё?,!0-9]+/m", $input) ) {  
        return false; 
    }
    if (strlen($input) < 4) {
        return false;
    }
    $result = trim($input);
    return $result;
}
?>