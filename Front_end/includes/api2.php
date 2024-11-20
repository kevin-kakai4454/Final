
<?php

// include("db.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json; Charset=UTF-8");

try {
    $servername = "localhost";
    $dbname = "youtube";
    $username = "root";
    $password = "";

    $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $connect->query("SELECT * FROM youtube_videos");
    $videos_arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($videos_arr) {
        http_response_code(200);
        echo json_encode($videos_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("Message" => "No Videos found in database"));
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
}


$connect = null;
