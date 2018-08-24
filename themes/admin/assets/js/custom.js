
// on key press allow numbers only (with decimal point)
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    //alert(charCode);
    //if (charCode > 31 && (charCode < 48 || charCode > 57)) // for only numbers
    if (charCode != 46 && charCode!=37 && charCode!=39 && charCode > 31 && (charCode < 48 || charCode > 57)) // for only decimal numbers and forward, backward arrows 
    {
        return false;
    }    
    return true;
}

// on key press allow numbers only (without decimal point)
function isNumberKeyDecimal(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    //alert(charCode);
    //if (charCode > 31 && (charCode < 48 || charCode > 57)) // for only numbers
    if (charCode!=37 && charCode!=39 && charCode > 31 && (charCode < 48 || charCode > 57)) // for only numbers and forward, backward arrows 
    {
        return false;
    }    
    return true;
}