<?php


$db = new DB($ENV->DB_HOST, $ENV->DB_NAME, $ENV->DB_USER, $ENV->DB_PASS);

$query = 'SELECT * FROM blogs';


$result = $db->getData($query);


// Output pagination links
$pagination = $result['pagination'];

links($pagination);