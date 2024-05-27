// Ισως να μην χρειαζεται
var menu;

function loadMenu(usrRole)
{
    console.log(usrRole);
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onload = function(){

        /**
         * Περναμε το responseText μεσα στο menu 
         * μετα καλουμε την showActive(ορισμα το menu)
         * και οτι επιστρεψει το βαζουμε στο navbar που εχουμε 
         * το console ειναι για check
         */
        menu = xmlhttp.responseText;
        document.getElementById("navbar").innerHTML = showActive(menu);
        // console.log(document.getElementById("navbar").innerHTML);
    };
    if (usrRole == "user")
    {
        // console.log("user");
        xmlhttp.open("GET", "../menu.html", true);
        xmlhttp.send();
        return;
    }
    else if(usrRole == "mod")
    {
        // console.log("user");
        xmlhttp.open("GET", "../modmenu.html", true);
        xmlhttp.send();
        return;
    }
    else if(usrRole == "admin")
    {
        // console.log("user");
        xmlhttp.open("GET", "../adminmenu.html", true);
        xmlhttp.send();
        return;
    }
    else
    {
        // console.log("visitor");
        xmlhttp.open("GET", "../visitormenu.html", true);
        xmlhttp.send();
        return;
    }   
}


/**
 * Περνουμε το URL που ειναι ο χρηστης και το κανουμε split("/") 
 * περνουμε το τελευταιο στοιχειο που ειναι το file.php
 * μετα κανουμε split("\")(ειναι ετσι πιο κατω λογο regex) το menu
 * και αρχικοποιουμε το menu με κενο string
 * ελεγχουμε 1-1 τα στοιχεια το menuSplit αν ειναι ιδιο με το lastElement
 * και τοτε περναμε το active
 * επισης αν ειναι το fa fa-bars απλα το βαζουμε ολο σε ενα string αλλιως ειχε bug 
 * και μετα περναμε ολο το menuSplit στο menu 
 * και το επιστρεφουμε
 * @param {string} menu 
 * @returns menu
 */
function showActive(menu)
{
    var splitURL = document.URL.split("/");
    var lastElement = splitURL[splitURL.length-1];
    // console.log(lastElement);

    var menuSplit = menu.split("\"");
    menu = "";

    for (let i = 0; i < menuSplit.length; i++) {
        if(menuSplit[i] == lastElement)
        {
            menuSplit[i] += " class='active'";
        }
        if(menuSplit[i] == "fa fa-bars")
        {
            menuSplit[i] = "'" + menuSplit[i] + "'";
        }
        if(menuSplit[i] == "fa fa-caret-down")
        {
            menuSplit[i] = "'" + menuSplit[i] + "'";
        }
        menu += menuSplit[i];
    }

    return menu;
}