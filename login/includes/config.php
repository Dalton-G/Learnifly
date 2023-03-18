<?php
if (!isset($_SESSION)) {
    session_start();
}

date_default_timezone_set("Asia/Singapore");

try {
    $con = new PDO("mysql:dbname=learnifly;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
    echo '<pre>';
    var_dump($e);
    echo'</pre>';
}