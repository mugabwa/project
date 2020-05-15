function printError(elemID, hintMsg) {
    document.getElementById(elemID).innerHTML = hintMsg;
}


function validateLogin() {
    var username = document.getElementById('username');
    var pword = document.getElementById('passwd');
    var regex;

    let pwdError;
    let userError = pwdError = true;

    if(username.value == ""){
        printError('error-usr', 'Username is required!');
    }else {
        regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        if(regex.test(username.value) === false){
            printError('error-usr', 'Enter a valid username!');
        } else {
            printError('error-usr', '');
            userError = false;
        }
    }
    if(pword.value == ""){
        printError('error-pwd', 'Password is required!');
    } else {
        if (pword.value.length < 4){
            printError('error-pwd', 'Password should contain at least 4 characters!');
        } else {
            printError('error-pwd', '');
            pwdError = false;
        }
    }
    return !(userError || pwdError === true);
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
 //todo  a function to validate student form
function validateStudent() {
    let firstName = document.getElementById('fname');
    let lastName = document.getElementById('lname');
    let username = document.getElementById('uname');
    let password = document.getElementById('pword');
    let birthDate = document.getElementById('DoB');
    let regDate = document.getElementById('admindate');
    let gender = document.getElementById('gender');
    let stdClass = document.getElementById('class');

    let fnameErr, lnameErr, unameErr, pwdErr, birthErr, regErr, gendErr, classErr;
    fnameErr = lnameErr = unameErr = pwdErr = regErr = gendErr = birthErr = classErr = true;
    let regex;

    if (firstName.value === ''){
        printError('fnErr', 'First name is required!');
    } else {
        regex = /^[a-zA-Z\s]+$/;
        if (regex.test(firstName.value) === false) {
            printError('fnErr', 'Please enter a valid name!');
        }else {
            printError("fnErr","");
            fnameErr = false;
        }
    }

    if (lastName.value === ''){
        printError('lnErr','Last name is required!');
    } else {
        regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lastName.value) === false) {
            printError('lnErr', 'Please enter a valid name!');
        }else {
            printError("lnErr","");
            lnameErr = false;
        }
    }

    if (username.value === ''){
        printError('unErr', 'Username is required!');
    } else {
        regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        if(regex.test(username.value) === false){
            printError('unErr', 'Enter a valid username!');
        } else {
            printError('unErr', '');
            unameErr = false;
        }
    }

    if (password.value === ''){
        printError('pwdErr', 'Password is required!');
    } else {
        if (password.value.length < 6){
            printError('pwdErr', 'Password should contain atleast 6 characters!');
        } else {
            printError('pwdErr', '');
            pwdErr = false;
        }
    }

    if (birthDate.value === ''){
        printError('birthErr', 'Birth of date is required!');
    } else {
        printError('birthErr', '');
        birthErr = false;
    }

    if (regDate.value === ''){
        printError('adminDateErr', 'Admission date is required');
    } else {
        printError('adminDateErr', '');
        regErr = false;
    }

    if (gender.value === ''){
        printError('genderErr', 'You need to select your gender!');
    } else {
        printError('genderErr', '');
        gendErr = false;
    }

    if (stdClass.value === ''){
        printError('classErr', 'You need to select the class!');
    } else {
        printError('classErr', '');
        classErr = false;
    }

    // Prevent submission of error leased form
    if ((fnameErr || lnameErr || unameErr || pwdErr || regErr || gendErr || birthErr || classErr) === true) {
        return false;
    } else {
        let txt = "Name: "+firstName.value+" "+lastName.value+"\nUsername: "+username.value+"\nGender: "
            +gender.value+"\nDoB: "+birthDate.value+"\nAdmission date: "+regDate.value+"\nClass: 1"+stdClass.value;
        if (confirm(txt)){
            alert('Recorded');
            return true;
        } else {
            return false;
        }
    }
}

//todo display date and time for homepage
function displayDate() {
    var date;
    date = Date();
    return date;
}
var date = 0;
date=displayDate();
document.getElementById('dateViewRev').innerHTML = date;

// todo validation for exam details
function validateExamDetails() {
    let form = document.getElementById('myLevel');
    let myclass = document.getElementById('myclass');
    let subject = document.getElementById('mySubject');
    let termDate = document.getElementById('term');
    let examType = document.getElementById('exam_type');
    let examDate = document.getElementById('examdate');

    let formErr,classErr,subjectErr,termErr,typeErr,dateErr;
    formErr = classErr = subjectErr = termErr = typeErr = dateErr = true;
    let regex;
    if (form.value === ''){
        printError('levelErr', 'Select your form');
    }else {
        printError('levelErr','');
        formErr = false;
    }
    if (myclass.value === ''){
        printError('myclassErr', 'You need to select your class');
    } else{
        printError('myclassErr', '');
        classErr = false;
    }
    if (subject.value === ''){
        printError('subjectErr', 'You need to select your subject');
    } else {
        printError('subjectErr', '');
        subjectErr = false;
    }
    if (termDate.value === ''){
        printError('termErr', 'Select a term period');
    } else {
        printError('termErr', '');
        termErr = false;
    }
    if (examType.value === ''){
        printError('typeErr', 'Select the exam type');
    } else {
        printError('typeErr', '');
        typeErr = false;
    }
    if (examDate.value === ''){
        printError('dateErr', 'Date is required!');
    }else {
        printError('dateErr', '');
        dateErr = false
    }

    // Prevent submission of error leased form
    if ((formErr || classErr || subjectErr || termErr || typeErr || dateErr) === true) {
        return false;
    } else {
        let txt = "Form: "+form.options[form.selectedIndex].getAttribute('data-id')+ myclass.options[myclass.selectedIndex].getAttribute('data-id')+
            "\nSubject: " +subject.options[subject.selectedIndex].getAttribute('data-id')+ "\nTerm: "
            +termDate.options[termDate.selectedIndex].getAttribute('data-id')+"\nDate: "+examDate.value+"\nExam type: "+examType.value;
        return confirm(txt);  //return true if accepted else false
    }
}

//todo validation for the teacher's form
function validateTeacherForm() {
    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let phone = document.getElementById('phoneNo');
    let birth = document.getElementById('birthDate');
    let gender = document.getElementById('sex');
    let subject = document.getElementById('subj');
    let form = document.getElementById('formSelector');

    let fnameErr, lnameErr, unameErr, pswordErr, phoneErr, DoBErr, genderErr, subjectErr, formErr;
    fnameErr = lnameErr = unameErr = pswordErr = phoneErr = DoBErr = genderErr = subjectErr = formErr = false;



    return false;
}