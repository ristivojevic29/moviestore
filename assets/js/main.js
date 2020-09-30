$(document).ready(function(){
   
       $(document).on('click',".add-to-cart",function(e){
           e.preventDefault();
           alertify.alert("Unavailable at the moment!","We're sorry, service is currently unavailable.Thank You for your understanding!").set('label', 'Alright!');
       }  )  
      
       $(document).on('click','.view',function(e){
        e.preventDefault();
        var idFilma=$(this).data('idf');
    
       $.ajax({
           method:"POST",
           url:"models/admin/ajax_movie_data.php",  
           dataType:"json",
           data:{
               id:idFilma
           },
           success:function(podaci,status,jqXHR){

                alertify.alert(podaci.naziv_filma,"<img src="+podaci.putanja_slike+" />"+"<p>"+podaci.opis+"</p>").set('label', 'Nice!') ;
                
                
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
    })
})