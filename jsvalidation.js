
window.addEventListener('load', function() {
  var check = document.querySelector('#inputchk');
  var imgavatar = document.querySelector('#avatar');
  
  check?.addEventListener('change', function() {
    
    if (check.checked) {
     
      imgavatar.type = 'url';
      document.getElementById('checktext').innerHTML="UNCHECK TO CHOOSE IMAGE BY FILE"
    } else {
      
      imgavatar.type = 'file';
      document.getElementById('checktext').innerHTML="CHECK TO CHOOSE IMAGE BY URL"
    }
  });

})
 




        //VALIDATION FOR NAME FIELD 
function namevalidation(){
           

      var namefield = document.getElementById("inputname");
      var nameValue = namefield.value;
  
  
  if (nameValue.length == 0) {
    document.getElementById('errorName').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
  if (!nameValue.match(/[A-Z]{3,}/)) {
  document.getElementById('errorName').innerHTML="  CAPITAL LETTERS ONLY";
  return ;
   }
  document.getElementById('errorName').innerHTML="";
  return true;
        }




//VALIDATION FOR GMAIL FIELD 
function emailvalidation(){
       var emailfield = document.getElementById("inputemail");
  var emailValue = emailfield.value;
  
  
  // Perform the first validation
  if (emailValue.length == 0) {
    document.getElementById('errorEmail').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!emailValue.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
  document.getElementById('errorEmail').innerHTML=" INVALID EMAIL-ADDRESS";
  return false;
  }
  // If both validations pass, do something else
  document.getElementById('errorEmail').innerHTML="";
  return true;
        }



        //VALIDATION FOR PASSWORD
        function cpassvalidation(){
            
       var cpassfield = document.getElementById("inputcpass");
  var cpassValue = cpassfield.value;
  
//   var pass = document.getElementById("inputpass");
//   var passVal= pass.value;
  
 
  if (cpassValue.length == 0) {
    document.getElementById('errorCpass').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!cpassValue.match(/^[0-9]{5,5}$/)) {
  document.getElementById('errorCpass').innerHTML="NUMBER MUST BE '5' ONLY";
  return false;
  }
//   if (cpassValue !== passVal) {
//   document.getElementById('errorCpass').innerHTML="PASSWORD ISN'T MATCH";
//   return false;
//   }
  
  document.getElementById('errorCpass').innerHTML="";
return true;

        }

//    (!cpassValue.match(/^[a-zA-Z0-9]{5,7}$/)) 



   //VALIDATION FOR CONFIRM PASSWORD
   function passvalidation(){
      
       var passfield = document.getElementById("inputpass");
  var passValue = passfield.value;

  var cpass = document.getElementById("inputcpass");
    var cpassVal = cpass.value;
    
  
  // Perform the first validation
  if (passValue.length == 0) {
    document.getElementById('errorPass').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!passValue.match(/^[0-9]{5,5}$/)) {
  document.getElementById('errorPass').innerHTML="NUMBER MUST BE '5' ONLY";
  return false;
  }
  if (passValue !== cpassVal) {
  document.getElementById('errorPass').innerHTML="PASSWORD ISN'T MATCH";
  return false;
  }
 
  document.getElementById('errorPass').innerHTML="";
return true;

        }


           //VALIDATION FOR PHONENUMBER
   function phonevalidation(){
   
       var phonefield = document.getElementById("inputphone");
  var phoneValue = phonefield.value;
  
  // Perform the first validation
//   if (phoneValue.length == 0) {
//     document.getElementById('errorPhone').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
//     return false;
//   }
 
  if (!phoneValue.match(/^[0-9]{10,10}$/)) {
  document.getElementById('errorPhone').innerHTML="INVALID PHONE-NUMBER";
  return false;
  }
  
 
  document.getElementById('errorPhone').innerHTML="";
return true;

        }


        // VALIDATION ON PIN-CODE
        function pinvalidation(){
   
   var pinfield = document.getElementById("inputpin");
var pinValue = pinfield.value;

if (!pinValue.match(/^[0-9]{6,6}$/)) {
document.getElementById('errorpin').innerHTML="INVALID PIN";
return false;
}


document.getElementById('errorpin').innerHTML="";
return true;
    }


// function xyz(){
//   var chk = document.getElementById('check');
//   var disk = document.getElementById('avatar');
//   if (chk.checked === true){
//     disk.type = "text"
//   }
//   else{
//     disk.type = "file"
//   }
// }
// const check = document.getElementById('check');
// const imgavatar = document.getElementById('avatar');

// check.addEventListener('change', function() {
//   if (check.checked) {
//     imgavatar.type = 'text';
//   } else {
//     imgavatar.type = 'file';
//   }
// });

  