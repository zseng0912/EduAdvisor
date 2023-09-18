<!-- Programmer Name: Voon Jin Hui
Program Name: scholarships.php
Description: View Scholarship (User)
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include "dbConn.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarships</title>
    <link rel="stylesheet" href="scholarships.css">
    <link rel="stylesheet" href="button.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">

    <style>
        .privateUni {
            width: 1075px;
            height: 550px;
            border-radius: 38px;
            /* background: #f2eded; */
            background: #ffffff;
            box-sizing: border-box;
            box-shadow:  -14px 14px 40px #dcd8d8,
             /* 14px -14px 40px #ffffff; */
             14px -14px 40px #f2eded;
            /* overflow:auto; */
            margin-top:80px;
            
        }

        .public {
            width: 1075px;
            height: 500px;
            margin-top: 60px;
            margin-bottom: 100px;
            border-radius: 38px;
            background: #ffffff;
            box-shadow:  -14px 14px 40px #dcd8d8,
             14px -14px 40px #f2eded;
            /* overflow: auto; */

        }

        table {
            margin-top: 15px;
            margin-left: 175px;
            border-collapse: collapse;
            /* width: 100%; */
            justify-content: center;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #DDD;
            width: 75%;
            /* text-align: center; */
        }

        tr:hover {background-color: #D6EEEE;}

        .class{
            justify-content: center;
        }

        .public .government{
            font-family: sans-serif;
            font-size: 20px;
            line-height: 2.0;
            margin-left: 100px;
            color: black;
            text-decoration: none;
        }

        .public .government:hover{
            background-color: #D6EEEE;
        }

    </style>
    <script>
        function fetchTable(tabName) {
            var table = document.getElementById('scholarshipTable');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    table.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'fetch_table.php?tabs=' + tabName, true);
            xhr.send();
        }

        function showTable() {
            var radioButtons = document.getElementsByName('tabs');
            var selectedTab;

            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    selectedTab = radioButtons[i].value;
                    break;
                }
            }

            var table = document.getElementById('scholarshipTable');
            var paragraphs = document.getElementsByTagName('p');

            if (selectedTab === 'SPM' || selectedTab === 'STPM' || selectedTab === 'A-Levels' || selectedTab === 'Foundation / Diploma' || selectedTab === 'Matriculation' ||selectedTab === 'IGCSE' || selectedTab === 'UEC') {
            // if (selectedTab === 'radio-1' || selectedTab === 'radio-2' || selectedTab === 'radio-3' || selectedTab === 'radio-4' || selectedTab === 'radio-5' || selectedTab === 'radio-6' || selectedTab === 'radio-7') {
                table.style.display = 'block';
                for (var j = 0; j < paragraphs.length; j++) {
                    paragraphs[j].style.display = 'none';
                }

                // Send an AJAX request to retrieve the table data
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        table.innerHTML = xhr.responseText;
                    }
                };
                xhr.open('GET', 'fetch_table.php?tabs=' + selectedTab, true);
                xhr.send();
            } 
            else {
                table.style.display = 'none';
                for (var k = 0; k < paragraphs.length; k++) {
                    paragraphs[k].style.display = 'block';
                }
            }
        }
        
    </script>
</head>
<body>
    <div class="container">
        <div class="privateUni">
            <!-- <p style="text-align: center;font-family: sans-serif; font-size: 1.25rem; font-weight: 700;">Private University Scholarships</p> -->
            <h3 style="text-align: center;font-family: sans-serif; font-size: 1.25rem; font-weight: 700;padding-top:15px; padding-bottom:15px;">Private University Scholarships</h3>

            <form action="#" method="post">
                <div class="tabs">
                    <input type="radio" id="radio-1" name="tabs" value="SPM" checked onclick="showTable()">
                    <label class="tab" for="radio-1">SPM</label>
                    
                    <input type="radio" id="radio-2" name="tabs" value="STPM" onclick="showTable()">
                    <label class="tab" for="radio-2">STPM</label>
        
                    <input type="radio" id="radio-3" name="tabs" value="A-Levels" onclick="showTable()">
                    <label class="tab" for="radio-3">A-level</label>
                    
                    <input type="radio" id="radio-4" name="tabs" value="Foundation / Diploma" onclick="showTable()">
                    <label class="tab" for="radio-4" style="text-align: center;">Foundation <br> Diploma</label>
        
                    <input type="radio" id="radio-5" name="tabs" value="Matriculation" onclick="showTable()">
                    <label class="tab" for="radio-5">Matriculation</label>
        
                    <input type="radio" id="radio-6" name="tabs" value="IGCSE" onclick="showTable()">
                    <label class="tab" for="radio-6">IGCSE</label>
        
                    <input type="radio" id="radio-7" name="tabs" value="UEC" onclick="showTable()">
                    <label class="tab" for="radio-7">UEC</label>
        
                    <span class="glider"></span>
                </div>
            </form>

            
            <div class="table">
                <table id="scholarshipTable" style="display: none;">
                <!-- <table id="scholarshipTable" style="display: none;" border="2"> -->

                </table>
            </div>
        </div>

        <div class="public">
        <h3 style="text-align: center;font-family: sans-serif; font-size: 1.25rem; font-weight: 700;padding-top: 30px;color:red;">Government & Corporate Scholarship</h3>
        <br>
        <?php
        $query = "SELECT * FROM `scholarship_t` WHERE `scholarship_category` = 'Government'";
        $results = mysqli_query($connection, $query);
        $counter = 1;

        while($row = mysqli_fetch_assoc($results)){
            $scholarshipName = $row['criteria'];
            $scholarshipLink = $row['percentage_offered'];

            echo '<a class="government" href=" '. $scholarshipLink .'"> ' . $counter. '. ' .$scholarshipName.'</a><br>';
            $counter++;
        }

        $query = "SELECT * FROM `scholarship_t` WHERE `criteria` = 'PTPTN Online Guidelines'";
        $results = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($results);
        $ptptnOnlineLink = $row['percentage_offered'];

        $query = "SELECT * FROM `scholarship_t` WHERE `criteria` = 'PTPTN Application Link'";
        $results = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($results);
        $ptptnApplyLink = $row['percentage_offered'];

        echo '<button class="button" onclick="window.location.href=\'' . $ptptnOnlineLink . '\'">PTPTN Online Guidelines</button>';
        echo '<button class="button" onclick="window.location.href=\'' . $ptptnApplyLink . '\'">PTPTN Application Form</button>';
        ?>

        <!-- <button class="button"> PTPTN Online Guidelines </button> -->
        <!-- <button class="button"> PTPTN Application Form </button> -->

        </div>

        <img src="images/scholarshipMap.png" alt="Scholarship" style="margin:20px; width:80%;margin-bottom:120px;">
    </div>

    <script>
        showTable();
    </script>
</body>
<?php
include "footer.php";
?>
</html>



