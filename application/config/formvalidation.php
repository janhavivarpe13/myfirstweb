<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
$config = array(
    'form_rule'=> array(
        array(
            'field'=> 'birthday',
            'label'=> 'BirthDate',
            'rules'=> 'required|callback_age_over_18',
        )

    )
);

$config['callbacks']['age_over_18'] = function($str) {
    // Calculate the age from the birthdate
    $birthday = new DateTime($str);
    $today = new DateTime();
    $age = $today->diff($birthday)->y;

    // Check if age is 18 or older
    return ($age >= 18);
};


$config['error_message']['age_over_18'] = 'You must be at least 18 years old to register.';

return $config;
*/