function deleteUser()
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
        document.getElementById('users_del').innerHTML=xmlhttp.responseText;
        //window.location.href = "user_modify.php";
    };
    xmlhttp.open("GET", "Scripts/deleteuser.php", true);
    xmlhttp.send();
}

function submitChanges()
{
    var users = [];
    var usernames = document.getElementById('table_id').rows;
    var selects = document.querySelectorAll('[id*=del_]');
    var deletes = [];
    for(var i =0 ; i < selects.length ; i++ )
    {
        deletes[i] = selects[i].checked; 
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
        window.location.href = "user_delete.php";
    };
    xmlhttp.open("POST", "Scripts/delete.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("deletes=" + deletes + "&users=" + users);
}