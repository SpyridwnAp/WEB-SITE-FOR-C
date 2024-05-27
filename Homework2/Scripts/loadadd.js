var userQuestion = {
        question: "",
        answers:{},
        correctAnswers:{},
        type: "",
        check: ""
    };

var toJSON;

function loadAddQuiz()
{
    var typeChoice = document.getElementById("quiz_type_id").value;
    var onChangeId = document.getElementById("form_add_q");
    console.log(typeChoice);

    onChangeId.innerHTML = '';

    onChangeId.innerHTML += "<input type='text' name='question' id='question_id' class='text_field' placeholder='Question'></input>";

    switch (typeChoice) 
    {
        case "T/F":
            onChangeId.innerHTML += "<br><input type='radio' name='t_f' id='t_id' style='margin:"+ '0px 3.5px 0px 0px' +"' value='True'>True</input><br>";
            onChangeId.innerHTML += "<input type='radio' name='t_f' id='f_id' value='False'>False</input><br>";
            onChangeId.innerHTML += "<input type='submit' value='Submit' onclick='convertToJSON()' id='submit_btn'></input>";
            break;
        case "Option":
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='radio' name='option' id='option1_id' value='a'><input type='text' name='o1' id='o1' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 1'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='radio' name='option' id='option2_id' value='b'><input type='text' name='o2' id='o2'  class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 2'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='radio' name='option' id='option4_id' value='c'><input type='text' name='o3' id='o3' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 3'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='radio' name='option' id='option4_id' value='d'><input type='text' name='o4' id='o4' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 4'></input></input></div>";
            onChangeId.innerHTML += "<div><input type='submit' onclick='convertToJSON()' value='Submit' id='submit_btn'></input>";
            break;
        case "Multiple_Option":
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='checkbox' name='multiple_1' id='multiple_1_id' value='a'><input type='text' name='c1' id='m1' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 1'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='checkbox' name='multiple_2' id='multiple_2_id' value='b'><input type='text' name='c2' id='m2' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 2'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='checkbox' name='multiple_3' id='multiple_3_id' value='c'><input type='text' name='c3' id='m3' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 3'></input></input></div><br>";
            onChangeId.innerHTML += "<div style='margin:"+'0px 21px 0px 0px'+"'><input type='checkbox' name='multiple_4' id='multiple_4_id' value='d'><input type='text' name='c4' id='m4' class='text_field' style='display:"+ 'inline' +"' placeholder='Answer 4'></input></input></div>";
            onChangeId.innerHTML += "<input type='submit' value='Submit' onclick='convertToJSON()' id='submit_btn'></input>";
            break;
        case "FreeText":
            onChangeId.innerHTML += "<div><div><input type='text' name='free' id='free_id' class='text_field' style='display:"+ 'inline' +"' placeholder='Answers separated with space'></input></div>";
            onChangeId.innerHTML += "<input type='submit' value='Submit' onclick='convertToJSON()' id='submit_btn'></input>";
            break;
        case "Blanks":
            onChangeId.innerHTML += "<div><input type='text' name='blank1' id='blank1_id' class='text_field' style='display:"+ 'inline' +"' placeholder='Answers separated with space'></input></div>";
            onChangeId.innerHTML += "<div><input type='text' name='blank2' id='blank2_id' class='text_field' style='display:"+ 'inline' +"' placeholder='Answers separated with space'></input></div>";
            onChangeId.innerHTML += "<input type='submit' value='Submit' onclick='convertToJSON()' id='submit_btn'></input>";
            break;
        default:
            onChangeId.innerHTML = "";
            break;
    }
}

function convertToJSON() 
{
    if(document.getElementById("quiz_dif_id").value == "select" || document.getElementById("quiz_type_id").value == "select")
    {
        alert("Select difficulty");
        location.href = "add_quiz.php";
    }
    var difficulty = document.getElementById("quiz_dif_id").value;
    var typeChoice = document.getElementById("quiz_type_id").value;
    userQuestion.question = document.getElementById("question_id").value;
    userQuestion.check = "False";

    switch (typeChoice) 
    {
        case "T/F":
            userQuestion.answers = {
                a : "True",
                b : "False"
            }
            correctAnswersList = document.getElementsByName("t_f");
            for (let i = 0; i < correctAnswersList.length; i++) 
            {
                console.log(correctAnswersList[i].value + " " + i);
                if(correctAnswersList[i].checked)
                {
                    if(correctAnswersList[i].value == "True")
                    {
                        userQuestion.correctAnswers = "a";
                    }
                    else
                    {
                        userQuestion.correctAnswers = "b";
                    }
                }
            }
            userQuestion.type = "radio";
            toJSON = JSON.stringify(userQuestion);
            sendJSON(difficulty);
            break;
        case "Option":
            userQuestion.answers = {
                a : document.getElementById("o1").value,
                b : document.getElementById("o2").value,
                c : document.getElementById("o3").value,
                d : document.getElementById("o4").value
            }
            correctAnswersList = document.getElementsByName("option");
            // console.log(correctAnswersList.length);
            for (let i = 0; i < correctAnswersList.length; i++) 
            {
                console.log(correctAnswersList[i].value);
                if(correctAnswersList[i].checked)
                {
                    if(correctAnswersList[i].value == "a")
                    {
                        userQuestion.correctAnswers = "a";
                    }
                    else if(correctAnswersList[i].value == "b")
                    {
                        userQuestion.correctAnswers = "b";
                    }
                    else if(correctAnswersList[i].value == "c")
                    {
                        userQuestion.correctAnswers = "c";
                    }
                    else if(correctAnswersList[i].value == "d")
                    {
                        userQuestion.correctAnswers = "d";
                    }
                }
            }
            userQuestion.type = "radio";
            toJSON = JSON.stringify(userQuestion);
            sendJSON(difficulty);
            break;
        case "Multiple_Option":
            userQuestion.answers = {
                a : document.getElementById("m1").value,
                b : document.getElementById("m2").value,
                c : document.getElementById("m3").value,
                d : document.getElementById("m4").value
            }

            correctAnswersList = document.querySelectorAll("[id*='multiple_']");
            // correctAnswersList = document.getElementsById("[id*='form_']");
            userQuestion.correctAnswers = []; 
            var j = 0;
            console.log(correctAnswersList.length);
            for (let i = 0; i < correctAnswersList.length; i++) 
            {
                console.log(correctAnswersList[i].value);
                if(correctAnswersList[i].checked)
                {
                    if(correctAnswersList[i].value == "a")
                    {
                        userQuestion.correctAnswers[j] = "a";
                    }
                    else if(correctAnswersList[i].value == "b")
                    {
                        userQuestion.correctAnswers[j] = "b";
                    }
                    else if(correctAnswersList[i].value == "c")
                    {
                        userQuestion.correctAnswers[j] = "c";
                    }
                    else if(correctAnswersList[i].value == "d")
                    {
                        userQuestion.correctAnswers[j] = "d";
                    }
                    j++;
                }
            }
            userQuestion.type = "checkbox";
            toJSON = JSON.stringify(userQuestion);
            sendJSON(difficulty);
            break;
        case "FreeText":
            userQuestion.answers = {};
            userQuestion.correctAnswers = document.getElementById("free_id").value;
            userQuestion.type = "text_free";
            toJSON = JSON.stringify(userQuestion);
            sendJSON(difficulty);
            break;
        case "Blanks":
            userQuestion.answers = {};
            userQuestion.correctAnswers = document.getElementById("blank1_id").value;
            userQuestion.correctAnswers += " " + document.getElementById("blank2_id").value
            userQuestion.type = "text_strict";
            toJSON = JSON.stringify(userQuestion);
            sendJSON(difficulty);
            break;
    }
    alert("Posted");
}

function sendJSON(difficulty)
{
    var xmlhttp;
    var json = toJSON;
    console.log(json);
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
        window.location.href = "add_quiz.php";
        return;
    };
    xmlhttp.open("POST", "Scripts/addquestion.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("json=" + json + "&difficulty=" + difficulty);
}