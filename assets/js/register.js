$(document).ready(function(){

    var firstName = $("#tbFirstName");
    var lastName = $("#tbLastName");
    var email = $("#tbEmail");
    var lozinka = $("#tbPassword");
    var potvrdiLozinku=$('#tbRePassword');
    var btnPotvrdi = $("#btnRegister");


    var reFirstName = /^[A-Z][a-z]{1,20}$/;
    var reLastName=/^[A-Z][a-z]{1,20}$/;
    var reEmail =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    var reLozinka = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;


    firstName.blur(function(){
    if(!reFirstName.test(firstName.val()))
    firstName.css('border', '1px solid red');
    else
    firstName.css('border', '1px solid green');
    });
    email.blur(function(){
    if(!reEmail.test(email.val()))
    email.css('border', '1px solid red');
    else
    email.css('border', '1px solid green');
    });
    lastName.blur(function(){
    if(!reLastName.test(lastName.val()))
    lastName.css('border', '1px solid red');
    else
    lastName.css('border', '1px solid green');
    });
    lozinka.blur(function(){
    if(!reLozinka.test(lozinka.val()))
    lozinka.css('border', '1px solid red');
    else
    lozinka.css('border', '1px solid green');
    });
    potvrdiLozinku.blur(function(){
        if(!reLozinka.test(potvrdiLozinku.val()))
        potvrdiLozinku.css('border', '1px solid red');
        else
        potvrdiLozinku.css('border', '1px solid green');
        });
    
   
    btnPotvrdi.click(function(e){
   e.preventDefault();
    var nizGreske = [];
    
   if(firstName.val()=="")
    {
    nizGreske.push("Enter first name");
    }else{
    if(!reFirstName.test(firstName.val()))
    {
    nizGreske.push("Wrong format of first name");
    }
    else{}
    }
    if(email.val()=="")
    {
    nizGreske.push("Choose a email address");
    }else
    {
    if(!reEmail.test(email.val()))
    {
    nizGreske.push("Wrong format of email");
    }
    else{ }
    }
    
   if(lastName.val()=="") {
        nizGreske.push("Enter last name");
    }
    else{
        if(!reLastName.test(lastName.val())){
            nizGreske.push("Wrong format of last name");
        }
    }
    
   
    if(lozinka.val()==""){
   nizGreske.push("Enter password");
    }else{
    if(!reLozinka.test(lozinka.val())){
    nizGreske.push("The password must have one number,one letter and at least 8 characters");
    }else{}
    }
    if(lozinka.val()!=potvrdiLozinku.val()){
        nizGreske.push("Those passwords didn't match. Try again.")
        potvrdiLozinku.css('border', '1px solid red');
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
    url: "models/log/register.php",
    method:"post",
    data:{
    send:"btn",
    firstName: firstName.val(),
    email: email.val(),
    lastName: lastName.val(),
    lozinka: lozinka.val(),
    potvrdiLozinku:potvrdiLozinku.val()
},
    success: function()
    {
        alertify.alert("Successfully registration",function(){
            window.location='index.php';
        });
        
    },
    error: function(xhr, status, errmsg)
    {
        console.warn(xhr.errmsg);
        console.log(errmsg);
    var tmp = "Server error, try again!";
    switch(xhr.status)
    {
    case 409:
    tmp = "Email must be unique";
    break;
    case 422:
    var rez = JSON.parse(xhr.responseText);
    tmp = "Wrong format of data<br/> <ul>";
    for(var i in rez)
    {
    tmp += "<li>" + rez[i] + "</li>";
    }
    tmp += "</ul>";
    break;
    case 404:
    tmp = "404 Not Found";
    break;
    }
    $("#greske").html(tmp);
    }
    })
    }
    })
   })