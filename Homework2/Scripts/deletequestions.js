function getJSON(difficulty) 
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
        var json = JSON.parse(xmlhttp.responseText);
    
        createTable(json);
    };
    xmlhttp.open("GET", "JSON/" + difficulty + ".json", true);
    xmlhttp.send();
}

function createTable(json)
{
    var table_q = document.getElementById("questions_id");
    table_q.innerHTML = "<table class='questions_tb' id='question_table_id'><tr><th>Question</th><th>Answers</th><th>Correct Answers</th><th>Type</th><th>Delete</th></tr>";
    console.log(json.length);
    for (let i = 0; i < json.length; i++) 
    {
        var checkbox = "";
        var answers = "";
        for(letter in json[i].answers)
        {
            answers += " " + letter;
        }
        checkbox = "<input type = 'checkbox' name = 'delete' id = 'delete_"+ i +"_id'></input>";
        document.getElementById("question_table_id").innerHTML +="<tr><td>" + json[i].question + "</td><td>" + answers + "</td><td>" + json[i].correctAnswers + "</td><td>" + json[i].type + "</td><td>" + checkbox +"</td></tr>";
    }
    table_q.innerHTML += "</table> <button name = 'sub_button' id ='submit_btn' onclick = 'sendDeletes()'>Submit</button>";
}

function loadQuestions() 
{
    var difficulty = document.getElementById("quiz_dif_id").value;
    if(difficulty == "select")
    {
        document.getElementById("questions_id").innerHTML = "";
    }
    else if(difficulty == "easy")
    {
        json = getJSON("Easy");
    }
    else if(difficulty == "medium")
    {
        getJSON("Medium");
    }
    else
    {
        json = getJSON("Hard");
    }
}

function sendDeletes()
{
    var arr = [];
    var json;
    var difficulty = document.getElementById('quiz_dif_id').value;
    var checks = document.querySelectorAll('[id*="delete_"]');
    for(var i = 0;i<checks.length;i++)
    {
        arr[i] = checks[i].checked;
        console.log(arr[i]);
    }
    json = JSON.stringify(arr);
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
        console.log(xmlhttp.responseText);
        window.location.href = "delete_questions.php";
    };
    xmlhttp.open("POST", "Scripts/removequestions.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("json=" + json + "&difficulty="+ difficulty);
}
