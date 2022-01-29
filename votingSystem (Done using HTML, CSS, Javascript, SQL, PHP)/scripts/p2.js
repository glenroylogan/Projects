function Validate(form)
{
    var form_Input_Data = {clerk_id: form.clerk_id.value, constituency_id: form.constituency_id.value, poll_division_id: form.poll_division_id.value,
                         polling_station_code: form.polling_station_code.value, candidate1Votes: form.candidate1Votes.value,
                         candidate2Votes: form.candidate2Votes.value, rejectedVotes: form.rejectedVotes.value,
                         totalVotes: form.totalVotes.value, hiddenField: form.hiddenField.value};                     

   
    
    verifyEmptyFields(form_Input_Data);
    verifyClerkID(form_Input_Data["clerk_id"]);
    verifyConstituencyID(form_Input_Data["constituency_id"]); 
    verifyPollingDivisionID(form_Input_Data["poll_division_id"]);
    verifyPollingStation(form_Input_Data["polling_station_code"]);
    verifyVoteForCandidates1(form_Input_Data["candidate1Votes"]);
    verifyVoteForCandidates2(form_Input_Data["candidate2Votes"]);
    verifyRejectedBallots(form_Input_Data["rejectedVotes"]);
    verifyTotalNumberOfVotes(form_Input_Data["totalVotes"]);
    verifyHiddenField(form_Input_Data["hiddenField"]);

    //verifyAddTotalVotes(form_Input_Data["submitform"]);
        

    if(!(isAllFieldsValid()))
    {
        return false;
    }
    return true;

    function verifyEmptyFields(fields)
    {
        for (var checkBox in fields) 
        {
            if (fields[checkBox] == "" || fields[checkBox] == null)
            {
                document.getElementById(checkBox).classList.remove("txtBoxValid");
                document.getElementById(checkBox).classList.add("txtBoxError");
            }
            else
            {
                document.getElementById(checkBox).classList.remove("txtBoxError");
                document.getElementById(checkBox).classList.add("txtBoxValid");
            }
            
        }

    }

    function verifyClerkID(clerk_id)
    {
        if (clerk_id != "" && clerk_id != "null") {
            document.getElementById("clerk_id").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("clerk_id").classList.remove("txtBoxValid");
        }
    }

    function verifyConstituencyID(constituency_id)
    {
        if (constituency_id != "" && constituency_id != "null") {
            document.getElementById("constituency_id").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("constituency_id").classList.remove("txtBoxValid");
        }
    }

    function verifyPollingDivisionID(poll_division_id)
    {
        if (poll_division_id != "" && poll_division_id != "null") {
            document.getElementById("poll_division_id").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("poll_division_id").classList.remove("txtBoxValid");
        }
    }

    function verifyPollingStation(polling_station_code)
    {
        if (polling_station_code != "" && polling_station_code != "null") {
            document.getElementById("polling_station_code").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("polling_station_code").classList.remove("txtBoxValid");
        }
    }

    function verifyVoteForCandidates1(candidate1Votes)
    {
        if (candidate1Votes != "" && candidate1Votes != "null") {
            document.getElementById("candidate1Votes").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("candidate1Votes").classList.remove("txtBoxValid");
        }
    }

    function verifyVoteForCandidates2(candidate2Votes)
    {
        if (candidate2Votes != "" && candidate2Votes != "null") {
            document.getElementById("candidate2Votes").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("candidate2Votes").classList.remove("txtBoxValid");
        }
    }

    function verifyRejectedBallots(rejectedVotes)
    {
        if (rejectedVotes != "" && rejectedVotes != "null") {
            document.getElementById("rejectedVotes").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("rejectedVotes").classList.remove("txtBoxValid");
        }
    }

    function verifyTotalNumberOfVotes(totalVotes)
    {
        if (totalVotes != "" && totalVotes != "null") {
            document.getElementById("totalVotes").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("totalVotes").classList.remove("txtBoxValid");
        }
    }

    function verifyHiddenField(hiddenField)
    {
        if (hiddenField != "" && hiddenField != "null") {
            document.getElementById("hiddenField").classList.remove("txtBoxError");
        }
        else {
            document.getElementById("hiddenField").classList.remove("txtBoxValid");
        }
    }    

    function isAllFieldsValid()
    {
        var isAllFieldsValid = document.getElementsByClassName('txtBoxError');
        if (isAllFieldsValid.length > 0) 
        {
            return false;
        }
        else
        {
            return true;
            
        }
    }

    
    function addTotalVotes() {
        var num1 = document.getElementById("candidate1Votes").value;
        var num2 = document.getElementById("candidate2Votes").value;
        var result;
    
        result = Number(num1) + Number(num2);
        document.getElementById("submit").value = result;
    
    }
    
    
}


