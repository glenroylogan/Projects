function Validate(form)
{
    var formInputData = {fName: form.fName.value, lName: form.lName.value, Constituency: form.Constituency.value, emailAddress: form.emailAddress.value, yearsOfService: form.yearsOfService.value,
                         password: form.password.value, passConfirm: form.passConfirm.value, hiddenField: form.hiddenField.value };
    
    checkEmptyFields(formInputData);
    checkEmailAddress(formInputData["emailAddress"]);
    checkPasswordMatch(formInputData);
    checkPassword(formInputData["password"]);
    if(!(allFieldsValid()))
    {
        return false;
    }
    return true;



    function checkEmptyFields(fields)
    {
        for (var key in fields) 
        {
            if (fields[key] == "" || fields[key] == null)
            {
                document.getElementById(key).classList.remove("txtBoxValid");
                document.getElementById(key).classList.add("txtBoxError");
            }
            else
            {
                document.getElementById(key).classList.remove("txtBoxError");
                document.getElementById(key).classList.add("txtBoxValid");
            }
            
        }

    }
    function checkEmailAddress(email)
    {
        if (email != "" && email != null)
        {
            
            var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ 
            if(!(emailPattern.test(email)))
            {
                document.getElementById("emailAddress").classList.remove("txtBoxValid");
                document.getElementById("emailAddress").classList.add("txtBoxError");
            }
            else if (email != "")
            {
                document.getElementById("emailAddress").classList.remove("txtBoxError");
                document.getElementById("emailAddress").classList.add("txtBoxValid");
            }
        }
    }

    function checkYearsOfService(yearsOfService)
    {
        if (yearsOfService != "" && yearsOfService != "null") {
            document.getElementById("yearsOfService").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("yearsOfService").classList.remove("txtBoxValid");
        }
    }

    function checkPassword(password)
    {
        if (password != "")
        {
            var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/; // To be Reviewed            
            if(!(passwordPattern.test(password)))
            {
                document.getElementById("password").classList.remove("txtBoxValid");
                document.getElementById("password").classList.add("txtBoxError");
                document.getElementById("passConfirm").classList.remove("txtBoxValid");
                document.getElementById("passConfirm").classList.add("txtBoxError");
            }
            else if (password != "")
            {
                document.getElementById("password").classList.remove("txtBoxError");
                document.getElementById("password").classList.add("txtBoxValid");
                document.getElementById("passConfirm").classList.remove("txtBoxError");
                document.getElementById("passConfirm").classList.add("txtBoxValid");
            }
        }    
    }
    function checkPasswordMatch(formInputData)
    {
        if ((formInputData["password"] != "") && (formInputData["passConfirm"] != ""))
        {
            if (!(formInputData["password"] == formInputData["passConfirm"]))
            {
                document.getElementById("password").classList.remove("txtBoxValid");
                document.getElementById("password").classList.add("txtBoxError");
                document.getElementById("passConfirm").classList.remove("txtBoxValid");
                document.getElementById("passConfirm").classList.add("txtBoxError");            
            }
            else 
            {
                document.getElementById("password").classList.remove("txtBoxError");
                document.getElementById("password").classList.add("txtBoxValid");
                document.getElementById("passConfirm").classList.remove("txtBoxError");
                document.getElementById("passConfirm").classList.add("txtBoxValid");            
            }
        }
    }

    function allFieldsValid()
    {
        var allFieldsValid = document.getElementsByClassName('txtBoxError');
        if (allFieldsValid.length > 0) 
        {
            return false;
        }
        else
        {
            return true;
            
        }
    }
}


