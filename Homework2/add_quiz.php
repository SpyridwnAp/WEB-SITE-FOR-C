<?php
require_once "Scripts/session.php";
if($_userName == "World")
{
    header("Location: login.html");
}
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
    <script src="Scripts/loadadd.js"></script>

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
            <div class="menu" id="navbar"></div>
        </nav>
        <main>
            <h2>
                Add Quiz
            </h2>
            <form name="form_add" id="form_add_id">
                <div id="div_select">
                    <select name="quiz_dif" id="quiz_dif_id" class='text_field' required no autocomplete>
                        <option value="select" selected>
                            Select
                        </option>
                        <option value="easy">
                            Easy
                        </option>
                        <option value="medium">
                            Medium
                        </option>
                        <option value="hard">
                            Hard
                        </option>
                    </select>
                </div>
                <div>
                    <select name="quiz_type" id="quiz_type_id" class='text_field' onchange="loadAddQuiz()" required no autocomplete>
                        <option value="select" selected>
                            Select
                        </option>
                        <option value="T/F">
                            True/False
                        </option>
                        <option value="Option">
                            Option
                        </option>
                        <option value="Multiple_Option">
                            Multiple Option
                        </option>
                        <option value="FreeText">
                            Free Text
                        </option>
                        <option value="Blanks">
                            Fill The Blanks
                        </option>
                    </select>
                </div>
                <div id="form_add_q">

                </div>
            </form>
        </main>
        <footer>
            <a href="aboutus.php">About Us</a>
            &copy;2021 All rights reserved
        </footer>
    </div>
</body>

</html>