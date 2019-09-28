var addnotice=document.getElementById("addnotice");
var addresult=document.getElementById("addresult");
var viewnotice=document.getElementById("viewnotice");
var viewresult=document.getElementById("viewresult");
var marksviewdiv=document.getElementById("marks");
var viewmarks=document.getElementById("viewmarks");
var firstdiv=document.getElementById("firstdiv");
var seconddiv=document.getElementById("seconddiv");
var teacherid=document.getElementById("teacherid");
var studid=document.getElementById("studid");
var studsem=document.getElementById("studsem");
var rollno=document.getElementById("rollno");
var teacherid=document.getElementById("teacherid");

function view(){
    addresult.style.display="none";
    addnotice.style.display="none";
    viewnotice.style.display="block";
    viewresult.style.display="none";
    marksviewdiv.style.display="none";
    viewmarks.style.display="none";
}

function copymail(){
  document.getElementById('username').value = document.getElementById('email').value;
}

function nextForm(){
  var usertype = document.getElementById('usertype').value;
  firstdiv.style.display="none";
  seconddiv.style.display="block";

  if(usertype === "Teacher"){
    teacherid.style.display="block";
    studid.style.display="none";
    studsem.style.display="none";
    rollno.required=false;
    teacherid.required=true;
  }
}

function todaynotices() {
  console.log("todaynotices");
  var todaynotices = document.getElementById('todaynotices');
  var monthynotices = document.getElementById('monthynotices');
  var allnotices = document.getElementById('allnotices');
  todaynotices.style.display="block";
  monthynotices.style.display="none";
  allnotices.style.display="none";
}

function monthynotices() {
  console.log("monthynotices");
  var todaynotices = document.getElementById('todaynotices');
  var monthynotices = document.getElementById('monthynotices');
  var allnotices = document.getElementById('allnotices');
  todaynotices.style.display="none";
  monthynotices.style.display="block";
  allnotices.style.display="none";
}

function caltotal(i){
  var internal = document.getElementById("internal"+i).value;
  var external = document.getElementById("external"+i).value;
  document.getElementById("total"+i).value = Number(internal)+Number(external);

}

function viewblock(input1)
{
    this.input1=input1;
    if (input1==="viewnotice1"){
        if(viewnotice.style.display==="none"){
			console.log("viewnotice");
            addresult.style.display="none";
            addnotice.style.display="none";
            viewnotice.style.display="block";
            viewresult.style.display="none";
        }
    }
    if (input1=="addnotice1"){
        if(addnotice.style.display==="none"){
			console.log("addnotice1");
            addresult.style.display="none";
            addnotice.style.display="block";
            viewnotice.style.display="none";
            viewresult.style.display="none";
        }
    }
    if (input1=="viewresult1"){
        if(viewresult.style.display==="none"){
			console.log("viewresult1")
            addresult.style.display="none";
            addnotice.style.display="none";
            viewnotice.style.display="none";
            viewresult.style.display="block";
        }
    }
    if (input1=="addresult1"){
        if(addresult.style.display==="none"){
			console.log("addresult1")
            addresult.style.display="block";
            addnotice.style.display="none";
            viewnotice.style.display="none";
            viewresult.style.display="none";
            marksviewdiv.style.display="none";
        }
    }
}
