<?php
    include "header.php";
    include "dbConn.php";
    $query = "SELECT * FROM university_t";
    $results = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
<title>University</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/EduAdvisor.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="university.css" />
</head>
<body>
<h1 class="uniTitle">University</h1>
    <div class="card-container">
<?php 
    if (mysqli_num_rows($results) > 0)
        while ($row = mysqli_fetch_assoc($results)) { ?>
            <article class="card card--1">
            <div class="card__img"></div>
            <a href="uniDetail.php?id=<?php echo $row['university_id']; ?>" class="card_link">
                <div class="card__img--hover">
                    <img class="uniLogo" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['logo']); ?>" alt="university_image" height="280px" width="300px"/> 
                </div>
            </a>
            <div class="card__info">
                <span class="card__category"> University</span>
                <h4 class="card__title"><?php echo $row['university_name']; ?></h4>
                <span class="card__by"><i class="fa-solid fa-location-crosshairs"></i><a href="#" class="card__author" title="author">&nbsp <?php echo $row['location']; ?></a></span>
            </div>
            </article>
          
<?php }?>
</div>
</body>
<?php
include "footer.php";
?>
</html>