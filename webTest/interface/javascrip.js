function toggleSidebar() {
    document.getElementById("toggle_nav").classList.toggle("active");
    document.getElementById("side_nav").classList.toggle("active");
}
function displayDate() {
    var date;
    date = Date();
    return date;
}
var date = 0;
date=displayDate();
document.getElementById('dateView').innerHTML = date;

 //ajax
function  loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            document.getElementById("principalNote").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","../ajax/principal's_statement.txt", true);
    xhttp.send();
}
function loadHomeDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            document.getElementById("homeStatement").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","../ajax/home_statement.txt", true);
    xhttp.send();
}

//get modal
var modal = document.getElementById("studentModal");
//get the button
var btn = document.getElementById("newBtn");
//get the span element
var span = document.getElementsByClassName("close")[0];

let value, oldVal;
//open action
btn.onclick = function () {
    modal.style.display = "block";
};
//close action
span.onclick = function () {
    modal.style.display = "none";
};

//when the button is clicked.
window.onclick = function (event) {
    if (event.target == modal){
        modal.style.display = "none";
    }
};

//ajax
function  loadProf() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            document.getElementById("teacherProfile").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","../ajax/harry.txt", true);
    xhttp.send();
}

//Dropdown checkboxes
function showCheckboxes() {
    var expanded = false;
    oldVal = value;

    value = document.getElementById("formSelector").value;


    var myid, myid2;
    var state = true;
    console.log(value);
    if(oldVal=="f1"){
        myid2 = "checkboxes1"
    } else if (oldVal == "f2"){
        myid2 = "checkboxes2"
    }else if (oldVal == "f3"){
        myid2 = "checkboxes3"
    }else if (oldVal == "f4"){
        myid2 = "checkboxes4"
    }
    if (oldVal != undefined && myid2 != undefined)  document.getElementById(myid2).style.display = "none";

    if(value=="f1"){
        myid = "checkboxes1"
    } else if (value == "f2"){
        myid = "checkboxes2"
    }else if (value == "f3"){
        myid = "checkboxes3"
    }else if (value == "f4"){
        myid = "checkboxes4"
    }else{
        state = false;
        expanded = false;    }


    console.log(myid);
    if(!state){
        var checkboxes = document.getElementById(myid);
        if (checkboxes != undefined) checkboxes.style.display = "none";
    }else {
        var checkboxes = document.getElementById(myid);
        if (!expanded){
            checkboxes.style.display="inline-block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }

}