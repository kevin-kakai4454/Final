<?php

include("db.php");
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $video = json_decode($data, true);
    // echo json_encode($video);

    // echo $video;



    try {
        $servername = "localhost";
        $dbname = "youtube";
        $username = "root";
        $password = "";

        $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connect->query("SELECT * FROM youtube_videos WHERE title LIKE '%$video%' ");
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
}
$connect = null;

   /* $query = "INSERT INTO youtube_videos(video_id, title,description,thumbnail_url,channel_id, channel_name,publish_date,duration,keywords,category,created_at)";
    $query .= "VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($connect);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "sssssssssss", $video_id, $title, $description, $thumbnail_url, $channel_id,  $channel_name, $publish_date, $duration, $keywords, $category, $created_at);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(["Message" => "Video added to database successfuly"]);
        } else {
            echo json_encode(["Message" => "Error Video not added to database" . $stmt->error]);
        }
        // $result = mysqli_stmt_get_result($stmt);

    } else {
        echo json_encode(["Message" => "Error Video not added  database" . $stmt->error]);
    }
}
*/