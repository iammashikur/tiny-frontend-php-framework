<?php

$URI = $_SERVER['REQUEST_URI'];
//get rid of query string
$URI = explode('?', $URI)[0];

//get only the first part of the uri
$URI = explode('/', $URI)[1];

//other parts as array
$PRM = array_slice(explode('/', $_SERVER['REQUEST_URI']), 2);

//convert query string to object
$query = (object) $_GET;

//include functions

include 'functions/core.php';

include 'functions/database.php';

include 'functions/pagination.php';

include 'functions/custom.php';

//if file exists include it
if(file_exists('pages/'.$URI.'.php')){

    include 'pages/'.$URI.'.php';

}else if($URI == ''|| $URI == '/'){

    include 'pages/home.php';

}else{
    //if not show 404
    include 'pages/404.php';
}
