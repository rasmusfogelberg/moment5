<?php

header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$database = new Database(); 