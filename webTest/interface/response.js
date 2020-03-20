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

function validateRegistration() {
    var fname = document.getElementById('FirstName');
    var lname = document.getElementById('LastName');
    var user = document.getElementById('username');
    var gender = document.getElementById('gender');
    var birthDate = document.getElementById('DoB');
    var role = document.getElementById('rolePlayed');


    if(fname.value == ''){
        document.getElementById('error-fn').innerHTML = ('First name is required!');
        fname.focus();
        return false;
    }
    if (lname.value === ''){
        document.getElementById('error-ln').innerHTML = ('Last name is required!');
        lname.focus();
        return false;
    }
    if (user.value ===''){
        document.getElementById('error-usr').innerHTML = ('Username is required!');
        user.focus();
        return false;
    }
    if (gender.value === ''){
        document.getElementById('error-pswd').innerHTML = ("Gender is required!");
        gender.focus();
        return false;
    }
    if (birthDate.value === ''){
        document.getElementById('error-gnd').innerHTML = ("Date is required!");
        birthDate.focus();
        return false;
    }
    if (role.value === ''){
        document.getElementById('error-rol').innerHTML = ('Role is required!');
        role.focus();
        return false;
    }
    var txt = "Name: "+fname.value+" "+lname.value+"\nUsername: "+user.value+"\nGender: "+gender.value+"\nDoB: "+birthDate.value+"\nRole: "+role.value;
    if (confirm(txt)){
        alert("Hello!");
    }
    return false;

}