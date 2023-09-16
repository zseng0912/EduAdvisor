<!-- Programmer Name: Tan Zu Seng
Program Name: interest_test_Main.php
Description: Interest Test Main
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Test</title>
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <style>
        /* width */
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

      body{
        width:100%;
        height:100%;
      }

      #quiz-header{
        padding:70px;
      }
      #quiz-header p{
        width:700px;
        margin-top:20px;
        line-height:1.5;
        letter-spacing:2px;
      }
      .quiz-image{
        font-family: Khula;
        font-size: 4em;
        text-align: center;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        position: relative;
        color: white;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin-top: 50px;
        background-image: url(images/interestTest.png);
        background-size: cover;
        height: 70vh;
        }

        button {
            display: flex;
            align-items: center;
            font-family: inherit;
            font-weight: 500;
            font-size: 17px;
            padding: 0.8em 1.3em 0.8em 0.9em;
            color: white;
            background: #ad5389;
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
            border: none;
            letter-spacing: 0.05em;
            border-radius: 16px;
            }

            button svg {
            margin-right: 3px;
            transform: rotate(30deg);
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
            }

            button span {
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
            }

            button:hover svg {
            transform: translateX(5px) rotate(90deg);
            }

            button:hover span {
            transform: translateX(7px);
            }

    </style>
</head>
<body>
<div class='quiz-image'>
    <div id='text-container'>
      <h2>Interest Test</h2>
    </div>
  </div>
<div id="quiz" style="text-align:center;justify-content:center;align-items:center;display:flex;flex-direction:column; margin:40px;">
  <div id="quiz-header">
    <h1>Know About Yourself</h1>
    <p class="faded">You will be more successful doing what you like and what you are good at. Come
    identify your passion and strength using this test. It'll even suggest courses that you
    might be interested in.</p>
  </div>
  <div id="quiz-start-screen">
    <a href="interest_test.php">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path></svg>
            <span>Start Test</span>
        </button>
    </a>
</div>
</div>
</body>
<?php
  include "footer.php";
?>
</html>