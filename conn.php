<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
set_exception_handler(function($exception) {
    header("Location: /error.php");
    exit();
});
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== NULL && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        header("Location: /error.php");
        exit();
    }
});
$serverName = "sql302.infinityfree.com";
$username = "if0_38877069";
$password = "Ahmet4560";
$database = "if0_38877069_dusunce";
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası" . $e->getMessage();
}
?>
