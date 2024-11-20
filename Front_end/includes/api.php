<?php

include("db.php");
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $video = json_decode($data, true);
    echo json_encode($video);

    $video_id = $video['video_id'];
    $title = $video['title'];
    $description = $video['description'];
    $channel_id = $video['channel_id'];
    $thumbnail_url = $video['thumbnail_url'];
    $channel_name = $video['channel_name'];
    $publish_date = $video['publish_date'];
    $duration = $video['duration'];
    $keywords = $video['keywords'];
    $category = "Technology";
    $created_at = date("Y-m-d H:i:s");



    $query = "INSERT INTO youtube_videos(video_id, title,description,thumbnail_url,channel_id, channel_name,publish_date,duration,keywords,category,created_at)";
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
