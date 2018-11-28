<html>
<head>
</head>
<body>
 
<SCRIPT LANGUAGE="JavaScript1.2"> <!--
 
function myAgeValidation() {
 
    var lre = /^\s*/;
    var datemsg = "";
    
    var inputDate = document.as400samplecode.myDate.value;
    inputDate = inputDate.replace(lre, "");
    document.as400samplecode.myDate.value = inputDate;
    datemsg = isValidDate(inputDate);
        if (datemsg != "") {
            alert(datemsg);
            return;
        }
        else {
            //Now find the Age based on the Birth Date
            getAge(new Date(inputDate));
        }
 
}
 
function getAge(birth) {
 
    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth();
    var nowday = today.getDate();
 
    var birthyear = birth.getFullYear();
    var birthmonth = birth.getMonth();
    var birthday = birth.getDate();
 
    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;
    
    if(age_month < 0 || (age_month == 0 && age_day <0)) {
            age = parseInt(age) -1;
        }
   // alert(age);
   document.getElementById("age").value=age;
    
    if ((age == 18 && age_month <= 0 && age_day <=0) || age < 18) {
    }
    else {
        alert("You have crossed your 18th birthday !");
    }
 
}
 
function isValidDate(dateStr) {
 
    
    var msg = "";
    // Checks for the following valid date formats:
    // MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY
    // Also separates date into month, day, and year variables
 
    // To require a 2 & 4 digit year entry, use this line instead:
    //var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/;
    // To require a 4 digit year entry, use this line instead:
    var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
 
    var matchArray = dateStr.match(datePat); // is the format ok?
    if (matchArray == null) {
        msg = "Date is not in a valid format.";
        return msg;
    }
 
    month = matchArray[1]; // parse date into variables
    day = matchArray[3];
    year = matchArray[4];
 
    
    if (month < 1 || month > 12) { // check month range
        msg = "Month must be between 1 and 12.";
        return msg;
    }
 
    if (day < 1 || day > 31) {
        msg = "Day must be between 1 and 31.";
        return msg;
    }
 
    if ((month==4 || month==6 || month==9 || month==11) && day==31) {
        msg = "Month "+month+" doesn't have 31 days!";
        return msg;
    }
 
    if (month == 2) { // check for february 29th
    var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
    if (day>29 || (day==29 && !isleap)) {
        msg = "February " + year + " doesn't have " + day + " days!";
        return msg;
    }
    }
 
    if (day.charAt(0) == '0') day= day.charAt(1);
    
    //Incase you need the value in CCYYMMDD format in your server program
    //msg = (parseInt(year,10) * 10000) + (parseInt(month,10) * 100) + parseInt(day,10);
    
    return msg;  // date is valid
}
 
// --> </SCRIPT>
 
<form name="as400samplecode">
Enter Birth Date:  <input type="text" name="myDate" size=10 maxlength=10  > (in MM/DD/YYYY format)
<input type="text" name="age" id="age" onfocus="Javascript:myAgeValidation()"/>
<input type="button" value="Find Age" >
</form>
 
</body>
 
</html>