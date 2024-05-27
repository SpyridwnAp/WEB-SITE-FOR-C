function changeRole()
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
        document.getElementById('users_role').innerHTML=xmlhttp.responseText;
        //window.location.href = "user_modify.php";
    };
    xmlhttp.open("GET", "Scripts/getrole.php", true);
    xmlhttp.send();
}

function submitChanges()
{
    var users = [];
    var usernames = document.getElementById('table_id').rows;
    var selects = document.querySelectorAll('[id*=reg_]');
    var roles = [];
    for(var i =0 ; i < selects.length ; i++ )
    {
        roles[i] = selects[i].value; 
    } 
    for(var i =1 ; i < usernames.length ; i++ )
    {
        users[i-1] = usernames[i].cells[0].innerHTML;
    } 
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
        //alert(xmlhttp.responseText);
        window.location.href = "user_modify.php";
    };
    xmlhttp.open("POST", "Scripts/changerole.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("roles=" + roles + "&users=" + users);
}