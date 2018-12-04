function validate()
{
    var errorno = 0;
    var errormsg = "";

    if (document.getElementById('firstname').value == "" ||  document.getElementById('firstname').value == null)
    {
        errormsg = errormsg + "First name is required! \n";
        errorno = 1;
        /*window.alert(errormsg);
        alert("First name is required!");*/
    }
    if(document.getElementById('lastname').value == "" || document.getElementById('lastname').value == null)
    {
        errormsg = errormsg + "Last name is required! \n";
        errorno = 1;
        /*window.alert(errormsg);
        alert("Last name is required!");*/
    }
    if(document.getElementById('jhf-cauc').checked == "" || document.getElementById('jhf-afam').checked == "" || document.getElementById('jhf-asian').checked == "" || document.getElementById('jhf-natam').checked == "" )
        if(document.getElementById('dob').value == "")
        {
            errormsg = errormsg + "Ethnicity name is required! \n";
            errorno = 1;
            /*window.alert(errormsg);
            alert("Ethnicity is required!");*/
        }
    if(document.getElementById('addinfo').value == "" || document.getElementById('addinfo').value == null)
    {
        errormsg = errormsg + "Additional personal information is required! \n";
        errorno = 1;
       /*window.alert(errormsg);
        alert("Addtional information are required!");*/
    }
    if(document.getElementById('useremail').value == "" || document.getElementById('useremail').value == null)
    {
        errormsg = errormsg + "Email is required! \n";
        errorno = 1;
        /*window.alert(errormsg);
        alert("Email is required!");*/
    }
    if(document.getElementById('userpassword').value == ""|| document.getElementById('userpassword').value == null)
    {
        errormsg = errormsg + "Password is required! \n";
        errorno = 1;
        /*window.alert(errormsg);
        alert("Password is required!");*/
    }
    if(document.getElementById('school').value == ""|| document.getElementById('school').value == null)
    {
        errormsg = errormsg + "School Year is required! \n";
        errorno  = 1;
        /*window.alert(errormsg);*/
        /*alert("School year is required");*/
    }

    if(errorno != 0)
    {
        window.alert(errormsg);
        return false;
    }
    else
    {
        return true;
    }

}
