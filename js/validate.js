$(document).ready(function(){

  // validation for create complaint form
  $('#create-complaint').submit(function(){

   var select = $('.select-to');
   var subject = $('.subject');
   var message = $('.message');
     if(select.val() == ''){
       alert('Please select value.');
       select.focus();
       return false;
     }
     if(subject.val() == ''){
       alert('Please enter subject.');
       subject.focus();
       return false;
     }
     if(message.val() == ''){
       alert('Please enter message.');
       message.focus();
       return false;
     } 
       
  });

  // validation for registration form
  $('#user-register').submit(function(){

   var name = $('.name');
   var email = $('.email');
   var roll = $('.roll-no');
   var select_class = $('.select-class');
   var pass1 = $('.pass1');
   var pass2 = $('.pass2');
   var address = $('.address');
    var utype = $('.utype');


     if(name.val() == ''){
       alert('Please enter your name.');
       name.focus();
       return false;
     }
     if(email.val() == ''){
       alert('Please enter your EmailID.');
       email.focus();
       return false;
     }
     if(roll.val() == ''){
       alert('Please enter your roll no.');
       roll.focus();
       return false;
     } 
     if(select_class.val() == ''){
       alert('Please select your class.');
       select_class.focus();
       return false;
     }
     if(pass1.val() == ''){
       alert('Please enter password');
       pass1.focus();
       return false;
     }

     if(pass2.val() == ''){
       alert('Please confirm password');
       pass2.focus();
       return false;
     }

     if(pass1.val() != pass2.val()){
       alert('Password Doesn\'t Match');
       pass1.focus();
       return false;
     }

     if(address.val() == ''){
       alert('Please enter address.');
       address.focus();
       return false;
     }
if(utype.val() == ''){
       alert('Please select User Type.');
       utype.focus();
       return false;
     }


       
  });



});
