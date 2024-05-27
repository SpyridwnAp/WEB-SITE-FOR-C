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
    table_q.innerHTML = "<table class='questions_tb' id='question_table_id'><tr><th>Question</th><th>Answers</th><th>Correct Answers</th><th>Type</th></tr>";
    console.log(json.length);
    for (let i = 0; i < json.length; i++) 
    {
        var answers = "";
        var correctAnswers = "";
        var answerslen = json[i].answers;
        if(answerslen == 0)
        {
            correctAnswers = "<input type='text' name='answer' id='answer_" + i + "_id' value=\"" + json[i].correctAnswers + "\">" + "</br>";
        }
        else
        {
            for(letter in json[i].answers)
            {
                
                if(json[i].answers[letter] == 'True' || json[i].answers[letter] == 'False')
                {
                    answers += letter + ". " + "<input type='text' name='answer' id='answer_" + i + letter + "_id' value=\"" + json[i].answers[letter] + "\"disabled >" + "</br>";
                    correctAnswers = json[i].correctAnswers;
                }
                else
                {
                    answers += letter + ". " + "<input type='text' name='answer' id='answer_" + i + letter + "_id' value=\"" + json[i].answers[letter] + "\">" + "</br>";
                    correctAnswers = json[i].correctAnswers;
                }
                // console.log(letter + " " + json[i].answers[letter]);
                
            }
        }
        
        document.getElementById("question_table_id").innerHTML +="<tr><td><input type='text' name='question' id='q_" + i + "_id' value=\"" + json[i].question + "\">" + "</td><td>" + answers + "</td><td>" + correctAnswers + "</td><td>" + json[i].type + "</td></tr>";
    }
    table_q.innerHTML += "</table> <button name = 'sub_button' id ='submit_btn' onclick = 'sendModify()'>Submit</button>";
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

function sendModify()
{
    var type = document.getElementById('question_table_id').rows;
    var difficulty = document.getElementById('quiz_dif_id').value;
    var answers = document.querySelectorAll('[id*="answer_"]');
    var questions = document.querySelectorAll('[id*="q_"]');

    var types = [];
    var q = [];
    var q_a = [[]]; 
    for (let i = 1; i < type.length; i++) {
        types[i-1] = type[i].cells[3].innerHTML;
    }
    // // var j = 0;
    // for (let i = 0; i < answers.length; i++) 
    // {
    //     console.log(answers[i].value);
    // }

    var pos = 0;
    var j;
    for (let i = 0; i < questions.length; i++) 
    {
        q_a[i] = [];
        var k = 0;
        q_a[i][k] = questions[i].value;
        k++;
        for (j = pos; j < answers.length; j++) 
        {
            
            if(answers[j].value == 'True')
            {
                q_a[i][k] = answers[j].value;
            }
            else if(answers[j].value == 'False')
            {
                q_a[i][k] = answers[j].value;
                pos = j+1;
                break;
            }
            else if(type[i+1].cells[3].innerHTML == 'text_free' || type[i+1].cells[3].innerHTML == 'text_strict')
            {
                q_a[i][k] = answers[j].value;
                pos = j+1;
                break;
            }
            else
            {
                q_a[i][k] = answers[j].value;
            }
            if(k == 4)
            {
                pos = j+1;
                break;
            }
            k++;
        }
    }

    console.table(q_a);

    q_a.forEach((q)=>{
        q.forEach((a)=>{
            console.log(a);
        });
    });
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
        window.location.href = "modify_questions.php";
    };
    xmlhttp.open("POST", "Scripts/modifyquestion.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("q_a=" + q_a + "&difficulty="+ difficulty + "&types=" + types);
}