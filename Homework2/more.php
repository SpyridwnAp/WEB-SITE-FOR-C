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
                More
            </h2>
            <div>
                <video muted controls>
                    <source src="Media\video.mp4" type="video/mp4">
                </video>
            </div>
        </main>
        <section>
            <article class="article">
                <p>&nbsp;&nbsp;&nbsp;&nbsp; Παραθέτουμε έναν τυπικό κώδικα ταξινόμησης(Τρόπος Bubblesort)
                <pre class="aside_links_list">
#include <stdio.h>
int main()
{
    int array[100], n, c, d, swap;
    printf("Enter number of elements\n");
    scanf("%d", &n);
    printf("Enter %d integers\n", n);
    for (c = 0; c < n; c++) 
    {
        scanf("%d", &array[c]); 
    }
    for (c=0 ; c < n - 1; c++) 
    { 
        for (d=0 ; d < n - c - 1; d++) 
        { 
            if (array[d]> array[d+1]) /* For decreasing order use '<' instead of '>' */ 
            { 
                swap=array[d]; 
                array[d]=array[d+1];
                array[d+1]=swap; 
            } 
        } 
    }
    printf("Sorted list in ascending order:\n"); 
    for (c=0; c < n; c++)
    {
        printf("%d\n",array[c]); 
    }
    return 0; 
}
                    </pre>
                </p>
            </article>
        </section>
        <aside class="aside_links_list">
            <ul>
                <h3>
                    Λίστα συνδέσμων:
                </h3>
                <li>
                    Περισσότερες πληροφορίες για την C:
                    <a href="Media\more.pdf#toolbar=0" target="_blank">PDF</a>
                </li>
                <li>
                    Γιατί η C έχει μεγάλη επιρροή:
                    <a href="https://www.youtube.com/watch?v=ci1PJexnfNE" target="_blank">YouTube</a>
                </li>
                <li>
                    Σελίδα της Wikipedia για την C:
                    <a href="https://en.wikipedia.org/wiki/C_(programming_language)" target="_blank">Wikipedia</a>
                </li>
                <h4>
                    Σελίδες εκμάθησης:
                </h4>
                <li>
                    <a href="https://www.sololearn.com/learning/1089" target="_blank">Sololearn</a>
                </li>
                <li>
                    <a href="https://www.programiz.com/c-programming" target="_blank">Programiz</a>
                </li>
                <li>
                    <a href="https://www.tutorialspoint.com/cprogramming/index.htm" target="_blank">Tutorialspoint</a>
                </li>
                <li>
                    <a href="https://www.geeksforgeeks.org/c-programming-language/?ref=leftbar" target="_blank">Geeksforgeeks</a>
                </li>
            </ul>
            <ul>
                <h3>
                    Παρεμφερής Γλώσσες:
                </h3>
                <li>
                    <a href="https://www.w3schools.com/java/" target="_blank">Java</a>
                </li>
                <li>
                    <a href="https://www.w3schools.com/cpp/default.asp" target="_blank">C++</a>
                </li>
                <li>
                    <a href="https://www.w3schools.com/cs/default.asp" target="_blank">C#</a>
                </li>
            </ul>
        </aside>
        <footer>
            <a href="aboutus.php">About Us</a>
            &copy;2021 All rights reserved
        </footer>
    </div>
</body>

</html>