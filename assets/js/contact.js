$(document).ready(function(){
   
    var posalji = $("#btnPosalji");
   
    var email = $("#tbEmail");
    var lozinka = $("#tbPassword");
    var subject=$("#tbSubject");
    var tekst=$("#tbText");
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
    posalji.click(function(){
    var nizGreske = [];
    if(email.val()==""){
    nizGreske.push("Enter your email");
    }
   else{
    if(!reEmail.test(email.val()))
    {
    nizGreske.push("Wrong format of email");
    }
    else{}
    }
    if(lozinka.val()==""){
        nizGreske.push("Enter your password");
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
    url: "models/contact.php",
    method: "post",
    dataType:"json",
    data: {
    posalji: true,
    email: email.val(),
    lozinka: lozinka.val(),
    subject:subject.val(),
    tekst:tekst.val()
    },
    success: function(data)
    {
      alertify.alert("Successfully submited form",function(){
        window.location='index.php?page=Home';
    });
     
    },
    error: function(xhr, status, error){
      console.log(error);}
    })
    }
    })
   
   })