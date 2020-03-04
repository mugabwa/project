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
