<!-- Programmer Name: Tay Wei Qin
Program Name: article.php
Description: Manage Article Video & Alumni Reviews (Admin)
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
$query = "SELECT * FROM alumni_t";
$results = mysqli_query($connection, $query);

// Array of YouTube video details
$videos = array(
    array("title" => "Accounting & Finance", "url" => "https://www.youtube.com/watch?v=DzFLyW9jfBQ"),
    array("title" => "Creative Art & Design", "url" => "https://www.youtube.com/watch?v=o5JcQiQDmq0"),
    array("title" => "Engineering", "url" => "https://www.youtube.com/watch?v=zoHm5AXeYYQ"),
    array("title" => "Information Technology", "url" => "https://www.youtube.com/watch?v=XZrckLYqdys"),
    array("title" => "Medical & Health Science", "url" => "https://www.youtube.com/watch?v=pTHFU7oxeQs")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edu Advisor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="article.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <script src="https://kit.fontawesome.com/ed7a464247.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Insert your content here -->
    <div class="title">
        <h1>Article</h1><br>
    </div>

    <!-- Video boxes -->
    <div class="row">
        <?php
        // Loop through the videos array
        foreach ($videos as $video) {
            echo '<div class="box videoBox">';
            echo '<iframe width="100%" height="200" src="' . getEmbeddedUrl($video['url']) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
            echo '<p class="videoTitle">' . $video['title'] . '</p>';
            echo '</div>';
        }

        // Function to convert YouTube URL to embedded URL
        function getEmbeddedUrl($url) {
            $videoId = getYouTubeVideoId($url);
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        // Function to extract YouTube video ID from URL
        function getYouTubeVideoId($url) {
            $queryString = parse_url($url, PHP_URL_QUERY);
            parse_str($queryString, $params);
            return isset($params['v']) ? $params['v'] : '';
        }
        ?>
    </div>

    <div class="Atitle">
        <h1>Alumni Reviews</h1><br>
        <h3><a href="addReview.php">Add more  <i class="fa-regular fa-square-plus fa-beat"></i></a></h3>
    </div>

    <div class="row">
        <?php 
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                echo "<div class='uniAbox'>";
                echo "<img class='uniLogo' src='data:image/jpg;charset=utf8;base64," . base64_encode($row['photo']) . "' alt='university_image' height='300px' width='300px'/>"; 
                echo "<h2>" . $row["alumni_name"]. "</h2>";
                echo "<p>Current Organization: " . $row["current_organization"]. "</p>";
                echo "<p>University name: " . $row["university_name"]. "</p>";
                echo "<p>Course name: " . $row["course_name"]. "</p>";
                echo "<p>Review: " . $row["review"]. "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <?php
    include "footer.php";
    ?>
</body>
</html>
