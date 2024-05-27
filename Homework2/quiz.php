<?php
require_once "Scripts/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/form.css">

    <script src="Scripts/navbar_function.js"></script>
    <script src="Scripts/loadmenu.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SuperApp</title>
</head>

<body onload="loadMenu('<?php echo $_userRole ?>');">
    <div class="container">
        <header>
            <a href="index.php">
                <img src="Media/transparentlogo.png" alt="logo" class="header_logo">
                <h1>C</h1>
                <p>..a programming language</p>
            </a>
        </header>
        <nav>
            <div class="menu" id="navbar">
            </div>
        </nav>
        <main>
            <h2>
                Quiz
            </h2>
            <div id="div_select" style="display:none">
                <select name="quiz_dif" id="quiz_dif_id">
                    <option value="default" selected></option>
                </select>
            </div>
            <form name="quiz_form">
                <div id="quiz_form"></div>
                <br>
                <button type="button" name="Submit" value="Submit" id="submit_btn" onclick="showResults('visitor')">Submit</button>
                <div id="results"></div>
            </form>
        </main>
        <footer>
            <a href="aboutus.php">About Us</a>
            &copy;2021 All rights reserved
        </footer>

    </div>
</body>
<script src="Scripts/quiz.js"></script>
<script>
    loadJson("visitor");
</script>

</html>