function validateLogin() {
    var username = document.getElementById('username');
    var pword = document.getElementById('passwd');
    if(username.value == ""){
        document.getElementById("error-usr").style.color = 'red';
        document.getElementById("error-usr").innerHTML=("Username is required");
        username.focus();
        return false;
    }
    else {
        document.getElementById('error-usr').style.display = 'none';
    }
    if(pword.value == ""){
        document.getElementById("error-pwd").style.color = 'red';
        document.getElementById("error-pwd").innerHTML=("Password is required");
        pword.focus();
        return false;
    }
    if(pword.value.length < 4){
        document.getElementById("error-pwd").style.color = '#ffe100';
        document.getElementById("error-pwd").innerHTML=("Password must be at list 4 characters");
        pword.focus();
        return false;
    }
    return true;
}

function printError(elemID, hintMsg) {
    document.getElementById(elemID).innerHTML = hintMsg;
}

function validateRegistration() {
    var fname = document.getElementById('FirstName');
    var lname = document.getElementById('LastName');
    var user = document.getElementById('username');
    var gender = document.getElementById('gender');
    var birthDate = document.getElementById('DoB');
    var role = document.getElementById('rolePlayed');
    var password = document.getElementById('FormPassword');

    // Defining error variables with a default values
    var fnError = lnError = usrError = pwdError = genderError = rolError = birthError = true;
    var regex;

    // Validating first name
    if(fname.value === ''){
        printError('error-fn','First name is required!');
        // fname.focus();
    }else {
        regex = /^[a-zA-Z\s]+$/;
        if (regex.test(fname.value) === false) {
            printError('error-fn', 'Please enter a valid name!');
            // fname.focus();
        }else {
            printError("error-fn","");
            fnError = false;
        }
    }

    // Validating last name
    if(lname.value === ''){
        printError('error-ln','Last name is required!');
        // lname.focus();
    }else {
        regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lname.value) === false) {
            printError('error-fn', 'Please enter a valid name!');
            // lname.focus();
        }else {
            printError("error-ln","");
            lnError = false;
        }
    }

    //validating username
    if (user.value === ''){
        printError('error-usr','Username is required!');
        // user.focus();
    } else {
        regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        if(regex.test(user.value) === false){
            printError('error-usr', 'Enter a valid username!');
            // user.focus();
        } else {
            printError('error-usr', '');
            usrError = false;
        }
    }

    // Validating password
    if (password.value === ''){
        printError('error-pswd','Password is required!');
        // password.focus();
    }else {
        if (password.value.length < 4){
            printError('error-pswd', 'Password should contain atleast 6 characters!');
            // password.focus();
        } else {
            printError('error-pswd', '');
            pwdError = false;
        }
    }

    //birth of date validation
    if(birthDate.value === ''){
        printError('error-birth', 'Birth of date is required!');
        // birthDate.focus();
    } else {
        printError('error-birth', '');
        birthError = false;
    }

    // Validating gender
    if (gender.value === ''){
        printError('error-gnd', 'You need to select your gender!');
        // gender.focus();
    } else {
        printError('error-gnd', '');
        genderError = false;
    }

    // validating the role
    if(role.value === ''){
        printError('error-rol', 'Role is required!');
        // role.focus();
    }else {
        regex = /^[a-zA-Z\s]+$/;
        if (regex.test(role.value) === false){
            printError('error-rol', 'Enter a valid role');
            // role.focus();
        }else {
            printError('error-rol', '');
            rolError = false;
        }
    }
    // Prevent submission of error leased form
    if ((fnError || lnError || usrError || pwdError || genderError || rolError || birthDate) === true) {
        return false;
    } else {
        var txt = "Name: "+fname.value+" "+lname.value+"\nUsername: "+user.value+"\nGender: "+gender.value+"\nDoB: "+birthDate.value+"\nRole: "+role.value;
        if (confirm(txt)){
            alert("Hello!");
            return true;
        } else {
            return false;
        }
    }

}