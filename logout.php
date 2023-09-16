<!-- Programmer Name: Voon Jin Hui
Program Name: logout.php
Description: Log Out
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>
