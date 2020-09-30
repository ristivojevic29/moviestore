$(document).ready(function(){
    load_data();
    function load_data(page){
        $.ajax({
            url:"models/kategorije/getAllProducts.php",
            data:{
                page:page
            },
            method:"post",
            success:function(data){
                ispisiProizvode(data);
            },error(xhr,status,errmsg){
                console.log(xhr.status);
                console.log(errmsg);
            }
        })
    }
    $(document).on('click','.pagination_link',function(){
        var page=$(this).attr('id');
        load_data(page);
    })
    $.ajax({
    url: "models/kategorije/getCategories.php",
     method:"post",
     dataType:"json",
    success:function(data){
        ispisiKategoriju(data);
    }
    })
function ispisiKategoriju(kategorije){
    var list="<ul>"
    for(k in kategorije){
        list+=`<li><a data-id="${kategorije[k].idKategorije}" href="#sekcija">${kategorije[k].nazivKategorije}</a></li>`
    }
    list+="</ul>"
    $('#kategorije').html(list);
    $('#kategorije li a').click(function(e){
        if(this.hash!==""){
        e.preventDefault();
        var kategorija = $(this).data('id');
        var hash=this.hash;
        $('html , body').animate({
            scrollTop:$(hash).offset().top},8,function(){
                window.location.hash=hash;
                
            })
            
       izaberiKategoriju(kategorija);
        }
    })
}
function izaberiKategoriju(kategorija){
        $.ajax({
            url:"models/kategorije/getAllProducts.php",
            method:"POST",
            data:{
                id:kategorija
            },
            dataType:"json",
            success:function(data){
               
                ispisiProizvode(data);
            },
            error:function(xhr,error,status){
                console.log(xhr.status);
                console.log(error);
            }
        }) 
}
        
    
function ispisiProizvode(proizvodi){
       
       var ispis="";
        ispis+=proizvodi;
                   
       $('#sekcija').html(ispis);
   } 
   $('#sortiranje>p>a').click(function(e){
       e.preventDefault();
       let sort=$(this).data('id');
       $.ajax({
        url: "models/kategorije/getAllProducts.php",
        method: "POST",
        data: {
            sort: sort
        },
        dataType: 'json',
        success: function(data){
           // console.log(data);
            ispisiProizvode(data);
        },
        error: function(greska){
            console.log(greska);
        }
    })
   })
   
})

                    