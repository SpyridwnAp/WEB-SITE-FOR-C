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
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/form.css">
    <link rel="stylesheet" href="Styles/profile.css">

    <script src="Scripts/navbar_function.js"></script>
    <script src="Scripts/loadmenu.js"></script>
    <script src="Scripts/prof_gender.js"></script>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SuperApp</title>
</head>

<body onload="loadMenu('<?php echo $_userRole?>');">
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
            <form action="Scripts/update_prof_info.php" id="form_signup" method="post" enctype="multipart/form-data" autocomplete="off"> 
                <img id="prof_photo" src="<?php echo $_photo; ?>"><br>
                <label>First Name: <input type="text" name="user_fname" id="user_fname_id" class="text_field"  value="<?php echo $_fName;?>"></label>
                <label>Last Name: <input type="text" name="user_lname" id="user_lname_id" class="text_field"  value="<?php echo $_lName;?>"></label>
                <label>Email: <input type="text" name="user_email" id="user_email_id" class="text_field"  value="<?php echo $_email;?>"></label>
                <label>Password: <input type="password" name="password" id="password_id" placeholder="Password" class="text_field" value=""> </label>
                <label>Repeat password: <input type="password" name="repeat_password" id="repeat_password_id" placeholder="Repeat Password" class="text_field" value=""></label>
                <label>Gender: <select name="user_gender" id="user_gender_id" class="text_field" no autocomplete>
                    <option value="male">
                        Male
                    </option>
                    <option value="female">
                        Female
                    </option>
                    <option value="other">
                        Other
                    </option>
                </select></label>
                <label>Birth date: <input type="date" name="user_date" id="user_date_id" class="text_field"  value="<?php echo $_date;?>"></label>
                <label>Change profile picture: <input type="file" name="user_photo" id="user_photo_id" class="text_field" value="<?php echo $_photo; ?>"></label>
                <input type="hidden" name="user_name" value="<?php echo $_userName; ?>" id="user_name_id">
                <input type="submit" name="submit" value="Submit Changes" id="submit_btn">
            </form>
        </main>
        <footer>
            <a href="aboutus.php">About Us</a>
            &copy;2021 All rights reserved
        </footer>
    </div> 
    <script>
        getGender('<?php echo $_gender;?>');
    </script>   
</body>
</html>