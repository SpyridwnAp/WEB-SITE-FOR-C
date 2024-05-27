/**
 * 
 * Περνουμε μεσα απο το Document το Item που εχει id ισο με #navbar
 * Ελεγχουμε αν η κλαση ειναι ιδια με το .menu αν ειναι 
 * προσθετουμε το responsive αλλιως βαζουμε απλα το .menu.
 * Σε ολα τα html αρχεια εχει γινει αυτο, ειναι jQuery και ειναι online αν θελετε να δειτε τι ακριβως παιζει.
 * Link : https://www.w3schools.com/howto/howto_js_topnav_responsive.asp
 * Κλητε μονο οταν ειναι ενεργο το icon. Δειτε index.css->responsive για περισσοτερα.
 */

function showNavbar() {
    var x = document.getElementById("navbar");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}