function checkCompleteness()
{
    var form = document.getElementById("add_form");

    var warning="You must enter";
     if( form.new_id.value.length != 0 && form.new_first.value.length != 0 && form.new_last.value.length != 0) { 
        return true;
    }  
    if( form.new_id.value.length == 0 ) { 
        warning=warning+" ID"
	   setWarning("error1_label","Please Enter am ID");
    }        
    if( form.new_first.value.length == 0 ) { // password entered
	       warning=warning+", firstname "
            setWarning("error2_label","Please Enter a First Name");
        }
     if(form.new_last.value.length ==0 ) { // passwords agree
	       warning=warning+", lastname "
            setWarning("error3_label","Please Enter a Last Name");
    }
    alert(warning);
                 
    return false;
}
function setWarning(elementName, msg)
{
    document.getElementById(elementName).innerHTML = msg;
   
}