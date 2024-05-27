function loadHistory(username) 
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onload = function()
    {
        document.getElementById("history_div").innerHTML = xmlhttp.responseText;
    };
    xmlhttp.open("GET","Scripts/loadhistory.php?username=" + username, true);
    xmlhttp.send();
}
