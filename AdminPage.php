<!-- Programmer Name: Tan Zu Seng
Program Name: AdminPage.php
Description: Admin Page
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>EduAdvisor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="AdminPage.css" />
<link rel="shortcut icon" href="images/EduAdvisor.png">
<style>
  /* Custom scrollbar styles */
  /* Width */
  ::-webkit-scrollbar {
    width: 8px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555;
  } 

  .logo-container img {
    padding: 0px; 
}

  #navigation ul li img{
    margin-top:-5px;
  }

a{
      text-decoration: none;
      color: black;
    }
  
#navigation ul li{
  padding:10px 20px;
}

</style>
</head>
<body>
<main class="wrapper" style="margin-top:30px;">
  <div class="pt-table desktop-768">
    <div class="pt-tablecell page-home relative" style="background-color:#f89b29;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
            <div class="page-title home text-center">
              <span class="heading-page">Welcome to Admin Page</span>
              <p class="mt20">EduAdvisor is the most reliable and useful system in Malaysia</p>
            </div>
            <div class="hexagon-menu clear">
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-universal-access"></i>
                    </span>
                    <span class="title">Home</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="manageCourses.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-bullseye"></i>
                    </span>
                    <span class="title">Edit Courses</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="viewUni.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-braille"></i>
                    </span>
                    <span class="title">Edit University</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="viewApplication.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-id-badge"></i>
                    </span>
                    <span class="title">View User Profile</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="article.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-life-ring"></i>
                    </span>
                    <span class="title">Edit Course Video</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="addReview.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-clipboard"></i>
                    </span>
                    <span class="title">Add Alumni Review</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
              <div class="hexagon-item">
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="hex-item">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <a class="hex-content" href="updateScholarship.php">
                  <span class="hex-content-inner">
                    <span class="icon">
                      <i class="fa fa-map-signs"></i>
                    </span>
                    <span class="title">Update Scholarship</span>
                  </span>
                  <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
<?php
  include "footer.php";
?>
</html>
