<?php


// Initialize the $ENV array
$ENV = [];

$env = file_get_contents('.env');
$env = explode("\n", $env);

foreach ($env as $e) {
    $e = explode('=', $e);
    if (count($e) == 2) {
        $key = trim($e[0]); // Remove leading and trailing spaces
        $value = $e[1];
        $value = str_replace('"', '', $value);
        $ENV[$key] = trim($value);
    }
}

// Create an object from the $ENV array
$ENV = (object) $ENV;


//include functions

function getTemplate($name, $data = []){
    
    extract($data);

    include 'skeleton/'.$name.'.php';

}