function getGender(gender)
{
    var objSelect = document.getElementById("user_gender_id");
    for (var i = 0; i < objSelect.options.length; i++)
    {
        if (objSelect.options[i].value == gender)
        {
            console.log(objSelect.options[i] + " " + gender);
            objSelect.options[i].selected = true;
            return;
        }
    }
}