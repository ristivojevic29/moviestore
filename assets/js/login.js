$(document).ready(function(){

  var login = $("#btnLogin");
 
  var email = $("#tbEmail");
  var lozinka = $("#tbPassword");
  var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  var reLozinka = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
 
  email.blur(function(){
  if(!reEmail.test(email.val()))
  email.css('border', '1px solid red');
  else
  email.css('border', '1px solid green');
 
  });
 
  lozinka.blur(function(){
  if(!reLozinka.test(lozinka.val()))
  lozinka.css('border', '1px solid red');
  else
  lozinka.css('border', '1px solid green');
  });
  login.click(function(e){
    
    e.preventDefault();
  var nizGreske = [];
  if(email.val()==""){
  nizGreske.push("Email field can't be empty");
  }
 else{
  if(!reEmail.test(email.val()))
  {
  nizGreske.push("Wrong format of email");
  }
  else{}
  }
  if(lozinka.val()==""){
      nizGreske.push("Password field can't be empty");
}
  else{
  if(!reLozinka.test(lozinka.val())) {
  nizGreske.push("The password must have one number,one letter and at least 8 characters");
  }else{}
  }
  var ispis="";
  ispis+="<ul>"
  if(nizGreske!=0){
    for(var i=0;i<nizGreske.length;i++){
     ispis+="<li>"+nizGreske[i]+"</li>";
    }
    ispis+="</ul>"
    document.getElementById("greske").innerHTML=ispis;
    document.getElementById("greske").style.color="red";
  }else{
    
      document.getElementById("greske").innerHTML="";
      $.ajax({
      url: "models/log/login.php",
      method: "post",
      data: {
      login: true,
      email: email.val(),
      lozinka: lozinka.val()
      
      },
      success: function(data)
      {
    
        window.location='index.php'
      },
      error: function(xhr, status, errmsg)
      {
      
      if(xhr.status == 409)
      $('#greske').html("An account with these data does not exist");
      if(xhr.status == 422)
      $('#greske').html("Wrong format of data");
      if(xhr.status == 500)
      $('#greske').html("Problem with server");
    
      }
      })
      }
      })
    
    })