<?php
    require_once "Scripts/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/form.css">

    <script src="Scripts/navbar_function.js"></script>
    <script src="Scripts/loadmenu.js"></script>

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
            <div class="menu" id="navbar">
                <a href="index.php">Home</a>
                <a href="basics.php">Basics</a>
                <a href="more.php">More</a>
                <a href="quiz.php">Quiz</a>
                <a href="signup.html">Signup</a>
                <a href="login.html">Login</a>
                <a href="logout.php">Logout</a>
                <a href="javascript:void(0);" class="icon" onclick="showNavbar()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </nav>
        <main>
            <article class="article">
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;Η σελίδα υλοποιήθηκε στα πλαίσια της εργασίας στο μάθημα «Σχεδίαση Εφαρμογών & Υπηρεσιών Διαδικτύου» που βρίσκεται στο πρόγραμμα σπουδών
                    της σχολής «Πληροφορικής & Τηλεπικοινωνιών» και συγκεκριμένα στο τρίτο εαρινό της εξάμηνο, συνολικά στ’ εξάμηνο. Με τον
                    κύριο Τσελίκα Νικόλαο να είναι ο επιβλέπων καθηγητής του μαθήματος το διδακτικό έτος 2020-2021.
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;Η σελίδα δημιουργήθηκε από τρείς προπτυχιακούς:
                    <br>Αποστολόπουλος Σπυρίδων // A.M. : 2022201800016
                    <br>Καράλης Σπυρίδων // Α.Μ. : 2022201800070
                    <br>Χατζηβασιλείου Παναγιώτης // Α.Μ. : 2022201800219
                </p>
            </article>
        </main>
        <footer>
            <a href="aboutus.php">About Us</a>
            &copy;2021 All rights reserved
        </footer>
    </div>
</body>

</html>