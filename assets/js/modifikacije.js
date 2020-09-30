
$(document).ready(function(){
    load_users();
function load_users(){
    $.ajax({
        url:"models/admin/get_all_users.php",
        method:"POST",
        data:{
            send:true
        },
        success:function(data){
           console.log(data);
           ispisiKorisnike(data);
           
        },
        error:function(xhr,status,error){
            console.log(xhr.status);
            console.log(error);
        }
    })
}
  
    function ispisiKorisnike(korisnici){
        var ispis="";
        for(let k of korisnici){
            ispis+=`<tr><td>${k.idKorisnik}</td>
            <td>${k.ime}</td>
            <td>${k.prezime}</td>
            <td>${k.email}</td>
            <td>${k.lozinka}</td>
            <td>${k.idUloge}</td>
            <td><a href="#" class="btnObrisi" data-id="${k.idKorisnik}">Delete</a>
            <a href="#" class="btnUpdate" data-id="${k.idKorisnik}">Update</a></td></tr>`
        }
       
       $('#kor').html(ispis);
       $('.btnObrisi').click(function(e){
            e.preventDefault();
            var id=$(this).data('id');
            izbrisiKorisnika(id);
            
    })
    $('.btnUpdate').click(function(e){
        e.preventDefault();
        var id=$(this).data('id');
        dohvatiKorisnika(id);
    })
}
    
    function izbrisiKorisnika(id){
      $.ajax({
            method:"POST",
            url:"models/admin/ajax_delete_user.php",
            data:{
                id:id
            },
            success:function(podaci){
                alert("Successfuly deleted user");
               load_users();
            },
            error:function(xhr,statusTxt,error){
                var status=xhr.status;
                switch(status){
                    case 500:
                    alert("Server error");
                    break;
                    case 404:
                    alert("Not found");
                    default:
                    alert("Error:"+status+"-"+statusTxt);
                    break;
                }
            }
        })
    }
    

    $('.formaZaIzmenu').hide();
    function dohvatiKorisnika(id){
        
          $('.formaZaIzmenu').show();
      
       $.ajax({
           method:"POST",
           url:"models/admin/ajax_get_user.php",  
           dataType:"json",
           data:{
               id:id
           },
           success:function(podaci,status,jqXHR){
               //console.log(jqXHR.status);
             //  console.log("Podaci pristigli sa servera, ime:",podaci.ime);
                $('#tbFirstName').val(podaci.ime);
                $('#tbLastName').val(podaci.prezime);
                $('#tbEmail').val(podaci.email);
                $('#ddlUloga').val(podaci.idUloge);
                $('#hiddenKorisnikID').val(podaci.idKorisnik);
                
           },error:function(xhr,statusTxt,error){
               var status=xhr.status;

               switch(status){
                   case 500:
                   alert("Server error!");
                   break;
                   case 404:
                   alert("Page not found");
                    break;
                    default:
                    alert("Error"+status+"-"+statusTxt);
                    break;
               }
           }
       })
    }
   
  
  
    $('.unosProizvoda').hide();
    $('#dodaj').click(function(e){
        e.preventDefault();
          $('.unosProizvoda').show();})

       

    $.ajax({
        url:"models/admin/onlajnKorisnici.php",
        method:"POST",
        dataType:"json",
        success:function(data){
            ispisiOnlajnKorsnike(data);
           // console.log(data);
        },
        error:function(error,xhr,status){
            console.log(xhr.status);
        }
    })
    function ispisiOnlajnKorsnike(korisnici){
        var ispis="";
        var br=0;
        for(let k of korisnici){
            ispis+=`<tr>
                <td>${k.idKorisnik}</td>
                <td>${k.ime}</td>
                <td>${k.prezime}</td>
                <td>${k.email}</td></tr> `
                br++;
        }
        $('#tabelaOnlajnKorisnika').append(ispis);
        $('#brojUlogovanih').html("Online:"+br);
    }
})