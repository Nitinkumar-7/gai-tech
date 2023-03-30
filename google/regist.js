  //username validation
  function namevalidation(){
    var namefield = document.getElementById("userinput");
var nameValue = namefield.value;


if (nameValue.length == 0) {
 document.getElementById('name_error').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
 return false;
}

// Perform the second validation
//   if (!fieldValue.match(/^[a-zA-Z]+$/)) {
//   document.getElementById('errorMsg').innerHTML="FIELD MUST CONTAIN ONLY LETTERS";
//     return;
//   }
if (!nameValue.match(/^[A-Z]+$/)) {
document.getElementById('name_error').innerHTML=" CONTAIN CAPITAL LETTERS ONLY";
return false;
}
// If both validations pass, do something else
document.getElementById('name_error').innerHTML="";
return true;
     }


     //email validation
function emailvalidation(){
    var emailfield = document.getElementById("emailinput");
var emailValue = emailfield.value;


// non  empty 
if (emailValue.length == 0) {
 document.getElementById('email_error').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
 return false;
}

if (!emailValue.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
)) {
document.getElementById('email_error').innerHTML=" INVALID EMAIL";
return false;
}
// If both validations pass, do something else
document.getElementById('email_error').innerHTML="";
return true;
     }


          //VALIDATION FOR PASSWORD
          function cpassvalidation(){
    var cpassfield = document.getElementById("cpassinput");
var cpassValue = cpassfield.value;

var pass = document.getElementById("passinput");
var passVal= pass.value;

// Perform the first validation
if (cpassValue.length == 0) {
 document.getElementById('cpass_error').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
 return false;
}

if (!cpassValue.match(/^[0-9]{5,5}$/)) {
document.getElementById('cpass_error').innerHTML="LENGTH SHOULD  BE '5' ONLY";
return false;
}
if (cpassValue !== passVal) {
document.getElementById('pass_error').innerHTML="PASSWORD ISN'T MATCH";
return false;
}
// If both validations pass, do something else
document.getElementById('cpass_error').innerHTML="";
return true;

     }

//    (!cpassValue.match(/^[a-zA-Z0-9]{5,7}$/)) 



//VALIDATION FOR CONFIRM PASSWORD
function passvalidation(){
     var cpass = document.getElementById("cpassinput");
 var cpassVal = cpass.value;
 
    var passfield = document.getElementById("passinput");
var passValue = passfield.value;

// Perform the first validation
if (passValue.length == 0) {
 document.getElementById('pass_error').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
 return false;
}

if (!passValue.match(/^[0-9]{5,5}$/)) {
document.getElementById('pass_error').innerHTML="NUMBER MUST BE '5' ONLY";
return false;
}
if (passValue !== cpassVal) {
document.getElementById('pass_error').innerHTML="PASSWORD ISN'T MATCH";
return false;
}
// If both validations pass, do something else
document.getElementById('pass_error').innerHTML="";
return true;

     }

   //VALIDATION FOR PHONENUMBER
   function phonevalidation(){

var phonefield = document.getElementById("phoneinput");
var phoneValue = phonefield.value;

// first validation
//   if (phoneValue.length == 0) {
//     document.getElementById('phone_error').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
//     return false;
//   }

if (!phoneValue.match(/^[0-9]{10,10}$/)) {
document.getElementById('phone_error').innerHTML="INVALID PHONE-NUMBER";
return false;
}

// If both validations pass, do something else
document.getElementById('phone_error').innerHTML="";
return true;

 }


 // pincode validation
 function pinvalidation(){

var pinfield = document.getElementById("pininput");
var pinValue = pinfield.value;

if (!pinValue.match(/^[0-9]{6,6}$/)) {
document.getElementById('pin_error').innerHTML="INVALID PIN";
return false;
}

// If both validations pass, do something else
document.getElementById('pin_error').innerHTML="";
return true;
}

//chekbox validation

function showFileInput() {
     if (document.getElementById('file').checked) {
          document.getElementById('file-upload').style.display = "block";
          document.getElementById('url-upload').style.display = "none";
     } else {
          document.getElementById('file-upload').style.display = "none";
          document.getElementById('url-upload').style.display = "block";
     }
}


