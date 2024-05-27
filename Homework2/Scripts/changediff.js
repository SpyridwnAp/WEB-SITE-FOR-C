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
        createTable(json,difficulty);
    };
    xmlhttp.open("GET", "JSON/" + difficulty + ".json", true);
    xmlhttp.send();
}

function createTable(json,difficulty)
{
    console.log(difficulty);
    var table_q = document.getElementById("questions_id");
    table_q.innerHTML = "<table class='questions_tb' id='question_table_id'><tr><th>Question</th><th>Answers</th><th>Correct Answers</th><th>Type</th><th>Difficulty</th></tr>";
    console.log(json.length);
    for (let i = 0; i < json.length; i++) 
    {
        var diffoption = "";
        var answers = "";
        var correctAnswers = "";
        var answerslen = json[i].answers;
        if(answerslen == 0)
        {
            correctAnswers = json[i].correctAnswers;
        }
        else
        {
            for(letter in json[i].answers)
            {
                
                if(json[i].answers[letter] == 'True' || json[i].answers[letter] == 'False')
                {
                    answers += letter + ". " + json[i].answers[letter] + "</br>";
                    correctAnswers = json[i].correctAnswers;
                }
                else
                {
                    answers += letter + ". " + json[i].answers[letter] + "</br>";
                    correctAnswers = json[i].correctAnswers;
                }
                // console.log(letter + " " + json[i].answers[letter]);
                
            }
        }
        diffoption = "<select name = 'diff' id= 'diff_"+ i +"_id'>";
        if(difficulty == 'Easy')
        {
            diffoption += "<option value = 'easy' selected>Easy</option>";
            diffoption += "<option value = 'medium' >Medium</option>";
            diffoption += "<option value = 'hard' >Hard</option>";
        }
        else if(difficulty == 'Medium')
        {
            diffoption += "<option value = 'easy' >Easy</option>";
            diffoption += "<option value = 'medium' selected>Medium</option>";
            diffoption += "<option value = 'hard' >Hard</option>";
        }
        else
        {
            diffoption += "<option value = 'easy' >Easy</option>";
            diffoption += "<option value = 'medium' >Medium</option>";
            diffoption += "<option value = 'hard' selected>Hard</option>";
        }
        diffoption +="</select>";
        document.getElementById("question_table_id").innerHTML +="<tr><td>" + json[i].question + "</td><td>" + answers + "</td><td>" + correctAnswers + "</td><td>" + json[i].type + "</td><td>" + diffoption +"</td></tr>" ;
    }
    table_q.innerHTML += "</table> <button name = 'sub_button' id ='submit_btn' onclick = 'sendModifiedDiff()'>Submit</button>";
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

function sendModifiedDiff()
{
    var diffs = [];
    var difficulty = document.getElementById('quiz_dif_id').value;
    var newdiff = document.querySelectorAll('[id*="diff_"]');
    for (var i = 0; i < newdiff.length; i++) 
    {
        console.log(newdiff[i].value);
        diffs[i] = newdiff[i].value;
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
        console.log(xmlhttp.responseText);
        window.location.href = "change_diff.php";
    };
    xmlhttp.open("POST", "Scripts/changediff.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("diffs=" + diffs + "&difficulty="+ difficulty);
}