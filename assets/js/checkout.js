window.onload=function(){
    $.ajax({
        url: 'data/meni.json',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
          ispisMenija(data);
          ispisFuterMenija(data)
        },
        error: function (err) {
          console.error(err);
        }
      });
      function ispisMenija(meni){
        var ispis="";
        ispis+="<ul>";
        for(let m of meni){
          ispis+=`<li><a href="${m.link}">${m.text}</a></li>`
        }
        ispis+="</ul>"
        document.getElementsByClassName("nav_list")[0].innerHTML=ispis;
      }
      function ispisFuterMenija(meni){
        var ispis="";
        
        for(let m of meni){
          ispis+=`<li><a href="${m.link}">${m.text}</a></li>`
        }
        
        document.getElementById("futerMeni").innerHTML=ispis;
      }
      $.ajax({
        url: 'data/meni2.json',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
          ispisMenija2(data);
          ispisMyAccount(data);
        },
        error: function (err) {
          console.error(err);
        }
      });
      function ispisMenija2(meni){
        var ispis="";
        ispis+="<ul>";
        for(let m of meni){
          ispis+=`<li><a href="${m.link}">${m.text}</a></li>`
        }
        ispis+="</ul>"
        document.getElementsByClassName("account_desc")[0].innerHTML=ispis;
       
      }
      function ispisMyAccount(meni){
        var ispis="";
        
        
        for(let m of meni){
          ispis+=`<li><a href="${m.link}">${m.text}</a></li>`
        }
        
        document.getElementById("myaccount").innerHTML=ispis;
      }
      $.ajax({
        url: 'data/specials.json',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
          ispisPopusta(data);
        },
        error: function (err) {
          console.error(err);
        }
      });
      function ispisPopusta(popust){
        var ispis="";
        ispis+="<h2>Specials</h2>"
        for(let p of popust){
          ispis+=`<div class="special_movies">
          <div class="movie_poster">
          <img src="${p.picture.src}" alt="${p.picture.alt}" />
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">${p.naziv}</a></h3>
             <p><span><del>$${p.cena.staraCena}0</del></span> &nbsp; $${p.cena.novaCena}0</p>
               <span class="add-to-cart">Best offer</span>
           </div>
          <div class="clear"></div>
         </div>	`
        }
        document.getElementsByClassName("rightsidebar span_3_of_1 sidebar")[0].innerHTML=ispis;
        
      }
     
    }