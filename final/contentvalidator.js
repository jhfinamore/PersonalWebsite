/**
 * Created by paulfinamore on 4/19/17.
 */

function contentvalidate()
{
    var errorno = 0;
    var errormsg = "";

    if(document.getElementById("creator").value == "" || document.getElementById("creator").value == null )
    {
       /* window.alert("Creater is required");*/
        errormsg = errormsg + "Creater is required. \n";
        /*window.alert(errormsg);*/
        errorno = 1;
    }

    if(document.getElementById("title").value == "" || document.getElementById("title").value == null )
    {
        /*window.alert("Title is requied");*/
        errormsg = errormsg + "Title is required \n";
        /*window.alert(errormsg);*/
        errorno = 1;
    }

    if(document.getElementById("content").value == "" || document.getElementById("content").value == null || document.getElementById("content").value == "<p></p>"
    || document.getElementById("content").value == "\n")
    {

        /*window.alert("Content is required");*/
        errormsg = errormsg + "Content is required";
        /*window.alert(errormsg);*/
        errorno = 1;
    }

    /*window.alert(errormsg);*/
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