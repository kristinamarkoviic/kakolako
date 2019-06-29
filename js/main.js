$(document).ready(function(){
    $("#registerBtn").click(registracija);
    
    $("#insertOglas").click(dodavanjeOglasa);
    $("#dugmeSearch").click(pretraga);
    $("#ddlGradoviO").change(filter_grad);
    $("#sortiranje").change(sortiranje);
    $("#btnKomentar").click(dodavanjePoruke);
    ispisiOglase();
    $(document).on('click','.slicica',jedan_oglas);
    $(document).on('click','.kat',filtriraj);
    ispisiKategorije();
    oglasi_svi();
    $(document).on('click','.linkPaginacija', posaljiBrStrane);
    $(".excel").click(posaljiIdKorisnika);
    $(document).on('click','.updateO',dohvatiOglas);
    $(document).on('click','.deleteK',obrisiKorisnika);
    $(document).on('click','.updateK',dohvatiKorisnika);
    $("#updateKorisnika").click(izmeniKorisnika);
    $(document).on('click','.deleteO',obrisiOglas);
    $("#btnUpdateOglas").css("display","none");
    $("#formica2").css("display","none");
});
//dohvatanje oglasa za popunjavanje forme
function dohvatiOglas(){
    let id=$(this).data('id');
    $.ajax({
        url:"models/oglasi/dohvati_oglas.php",
        method:"POST",
        dataType:"json",
        data:{
            id:id
        },
        success:function(podaci){
           console.log("Uspeh,ajax popuni formu za update oglasa.");
           popuniFormicu2(podaci);
           
           
        },
        error:function(xhr,status,error){
            toastr.error(xhr.status);
            toastr.error(error);
            console.error(error);
        }
    });

}
function popuniFormicu2(oglasi){
    $("#nazivOglasa").val(oglasi.naziv);
    $("#datumO").val(oglasi.datum);
    $("#opisO").val(oglasi.opis);
    $("#cenaO").val(oglasi.cena);
    $("#hidnIzmeniOglas").val(oglasi.idOglas);
    $('select[name=ddlGradoviO]').val(oglasi.idGrad);
    $('select[name=ddlKategorijeO]').val(oglasi.idKategorija);
    $("#btnUpdateOglas").css("display","block");
    $("#formica2").css("display","block");
    
    

}


//end dohvatanja oglasa za popunjavanje forme
//delete Oglasa
function obrisiOglas(){
    let id=$(this).data('id');

    $.ajax({
        url:"models/oglasi/delete_oglas.php",
        method:"POST",
        data:{
            idOglas:id
        },
        dataType:"json",
        success:function(podaci){
            toastr.success("USPEH");
            console.log("uspeh brisanje oglasa");
            window.location.reload(true); 
        },
        error:function(xhr,status,error){
            toastr.error(xhr.status);
            toastr.error(error);
            console.error(error);
        }
    });
}
//end delete oglas

//update korisnika  i insert ukoliko je poslat id onda izmena, ukoliko nije onda menjanje korisnika
function dohvatiKorisnika(e){
    e.preventDefault;
    let id=$(this).data('id');
    
    

    $.ajax({
        url:"models/korisnici/dohvati_korisnika.php",
        method:"POST",
        dataType:"json",
        data:{
            id:id
        },
        success:function(podaci){
           
           popuniFormicu(podaci);
           
        },
        error:function(xhr,status,error){
            toastr.error(xhr.status);
            toastr.error(error);
            console.error(error);
        }
    });

}
function popuniFormicu(korisnici){
    $("#imeAdmin").val(korisnici.username);
    $("#emailAdmin").val(korisnici.email);
    $("#passwordAdmin").val(korisnici.password);
    $("#hidnUpdateKorisnika").val(korisnici.idKorisnik);
    $('select[name=ddlUloge]').val(korisnici.idUloga);
    $("#forma-naslov").html("Izmeni korisnika");
    
    
    

}
function ocistiFormicu(){
    $("#imeAdmin").val("");
    $("#emailAdmin").val("");
    $("#passwordAdmin").val("");
    $("#hidnUpdateKorisnika").val("");
    $('select[name=ddlUloge]').val("0");
    $("#forma-naslov").html("Dodaj korisnika");
}
function izmeniKorisnika(){
    var id=$("#hidnUpdateKorisnika").val();
    var username=$("#imeAdmin").val();
    var email=$("#emailAdmin").val();
    var idUloga=$('select[name=ddlUloge]').val();
    var password=$("#passwordAdmin").val();

    var reusername=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var reEmail=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var rePassword=/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/;
    

    if(username=="")
    {
        toastr.error("Polje je obavezno, morate uneti ime");
        
    }
    else if(!reusername.test(username)) 
    {
        toastr.error("Korisničko ime mora imati bar 8 karaktera");
    }

    if(password=="")
    {
        toastr.error("Polje je obavezno, morate uneti lozinku");
    }
    else if(!rePassword.test(password)) 
    {
        toastr.error("Lozinka  mora imati bar 8 karaktera,imati cifre i slova");
    }

    if(email=="")
    {
        toastr.error("Polje je obavezno, morate uneti email");
    }
    else if(!reEmail.test(email)) 
    {
        toastr.error("Email nije u dobrom formatu, ne zaboravite karakter @");
    }
    if(idUloga=="0")
    {
        toastr.error("Obavezno polje, izaberite ulogu iz padajuće liste");
    }

    if(id!==''){
        $.ajax({
            url:"models/korisnici/izmeni_korisnika.php",
            method:"POST",
            dataType:"json",
            data:{
                id:id,
                username:username,
                email:email,
                idUloga:idUloga,
                password:password,
                poslato:true
            },
            success:function(podaci){
                ispisTabeleKorisnici();
                ocistiFormicu();
                toastr.success("Uspeh, izmenjen korisnik.");
                
            },
            error:function(xhr,status,error){
                var poruka="Nisu uneti svi podaci";
                switch(xhr.status){
                    case 422:
                    poruka="Podaci nisu u redu";
                    console.log(xhr.status);
                    break;
                }
                toastr.error("Niste lepo uneli podatke");
                console.log(poruka);
                console.error(xhr.status);
                
            }
        });
    }
    else {
        $.ajax({
            url:"models/korisnici/dodaj_korisnika.php",
            method:"POST",
            dataType:"json",
            data:{
                
                username:username,
                email:email,
                idUloga:idUloga,
                password:password,
                poslato:true
            },
            success:function(podaci){
                ispisTabeleKorisnici();
                ocistiFormicu();
                toastr.success("Uspeh, dodat korisnik");
                
            },
            error:function(xhr,status,error){
                var poruka="Nisu uneti svi podaci";
                switch(xhr.status){
                    case 422:
                    poruka="Podaci nisu u redu";
                    console.log(xhr.status);
                    break;
                }
                toastr.error("Niste lepo uneli podatke");
                console.log(poruka);
                console.error(xhr.status);
                
            }
        });
    }
    






}
//end update korisnika
//pozivanje funkcije za ispis tabele
function ispisTabeleKorisnici(){
    
    $.ajax({
        url:"models/korisnici/svi_korisnici.php",
        method:"POST",
        dataType:"json",
        
        success:function(podaci){
            
            popuniKorisnike(podaci);
           
        },
        error:function(xhr,status,error){
            toastr.error(xhr.status);
            toastr.error(error);
        }
    });

}
//brisanje korisnika
function obrisiKorisnika(e){
    e.preventDefault();
    let id=$(this).data('id');

    $.ajax({
        url:"models/korisnici/obrisi_korisnika.php",
        method:"POST",
        dataType:"json",
        data:{
            id:id
        },
        success:function(podaci){
            toastr.success("Uspešno obrisan korisnik");
           ispisTabeleKorisnici();
           
        },
        error:function(xhr,status,error){
            toastr.error(xhr.status);
            toastr.error(error);
        }
    });
}
function popuniKorisnike(korisnici){
    let html="";
    for(let korisnik of korisnici){
        html+=`
        <tr>
        <td>${korisnik.idKorisnik}</td>
        <td>${korisnik.username}</td>
        <td>${korisnik.email}</td>
        <td>${korisnik.idUloga}</td>
        
        
        <td><a class="dugmicUpdate updateK" data-id='${korisnik.idKorisnik}'>Izmeni</a></td>
        <td><a class="dugmicDelete deleteK" data-id='${korisnik.idKorisnik}'>Obriši</a></td>
      </tr>
        `;
    }
    $("#tabelaKorisnici").html(html);
}
//zavrseno brisanje

//slanje id korisnika za excel
function posaljiIdKorisnika(e) {
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url:"models/oglasi/export_excel.php",
        method:"POST",
        dataType:"json",
        data:{
            id:id
        },
        success:function(podaci){
            toastr.success("Uspesno exportovan na vas racunar excel fajl");
            toastr.success("Pogledajte na svom racunaru documents folder");
        },
        error:function(xhr,status,error){
            
        }
    });
}
//zavrseno export excel slanje

//SLANJE PORUKE
function dodavanjePoruke(){
    let idOglas=$("#hidn1").val();
    let poruka=$("#komentar").val();
    let idKorisnik=$("#hidn2").val();

    $.ajax({
        url:"models/oglasi/poruke.php",
        method:"post",
        dataType:"json",
        data:{
            idOglas:idOglas,
            poruka:poruka,
            idKorisnik:idKorisnik,
            poslato:true
        },
        success:function(podaci){
            toastr.success("Poruka poslata prodavcu.");
            $("#dodavanjeKomentara").css("display","none");
        },
        error:function(xhr,status,error){
            console.error(error);
            console.error("GRESKA AJAX SLANJE PORUKE");
            console.error(status);
            $("#porukaProdavac").html("Morate se ulogovati odnosno prvo registrovati kod nas.  <a class='regregA' href='index.php?page=registrovanje'>Registruj se!</a> ");
            
        }
    });
}
//ZAVRSETAK SLANJE PORUKE

//POCETAK PAGINACIJA
function posaljiBrStrane(e){
    e.preventDefault()
    console.log("uslo u pag");
    var strana=$(this).data("pag");
    $(".linkPaginacija").removeClass('current');
    $(".linkPaginacija").addClass('unavailable');
    $(this).addClass('current');
    $.ajax({
        url:"models/oglasi/paginacija.php",
        method:"POST",
        dataType:"json",
        data:{
            strana:strana
        },
        success:function(podaci){
            oglasi(podaci);
        },
        error:function(xhr,status,error){
            console.log(error);
            
        }
    });
    
}
//ZAVRSETAK PAGINACIJA
//POCETAK SORTIRANJE
function sortiranje(){
    let sort=$(this).val();

    $.ajax({
        url:"models/oglasi/sortiranje.php",
        method:"post",
        dataType:"json",
        data:{
            sort:sort
        },
        success:function(podaci){
            oglasi(podaci);
        },
        error:function(xhr,status,error){
            console.error(error);
            console.error("AJAX I SORT NE RADE");
        }
    });
}
// ZAVRSETAK SORTIRANJE

// POCETAK FILTER PO GRADU
function filter_grad(){
    let grad=$(this).val();
    $.ajax({
        url:"models/oglasi/filter_grad.php",
        method:"post",
        data:{
            grad:grad
        },
        dataType:"json",
        success:function(podaci){
            oglasi(podaci);
        },
        error:function(xhr,status,error){
            console.error("AJAX I DDL GRADOVI ");
            
            console.error(error);
        }
    });
}
// ZAVRSETAK FILTER PO GRADU

//na oglasi.php ispis svih oglasa
function oglasi_svi(){
    $.ajax({
        url:"models/oglasi/svi.php",
        method:"post",
        dataType:"json",
        success:function(podaci){
            oglasi(podaci);
        },
        error:function(xhr,status,error){
            console.error("AJAX, ispis OGLASA NA oglasi.php");
            console.error(xhr.status);
            console.error(error);
        }
    });
}
function oglasi(oglasi){
    let html="";
    for(let o of oglasi){
    html+=`
    <div class="product list-product small-12 columns">
    <div class="medium-4 small-12 columns product-image">
        
        <a href="index.php?page=jedan_oglas&id=${o.idOglas}">
            <img src="${o.putanja_oglas_slika}" alt="${o.naziv}" />
            
        </a>
    </div><!-- Product Image /-->
    <div class="medium-8 small-12 columns">
        <div class="product-title">
            <a href="index.php?page=jedan_oglas&id=${o.idOglas}">${o.naziv}</a>
        </div><!-- product title /-->	
        <div class="product-meta">
            <div class="prices">
                <span class="price">${o.cena} RSD</span>
                
            </div>
            <div class="last-row">    
                <div class="pro-rating float-left">
                    
                    <i class="fas fa-city"></i>  ${o.grad} </br>
                    
                      
            </div>
                <div class="store float-right">
                    / <i class="${o.ikonica}"></i>  ${o.kategorija} /   
                    Autor: <a href="store-front.html">${o.username}</a>
                </div>
                <div class="clearfix"></div>
            </div><!-- last row /-->
            
            <div class="product-detail">
                    <p>${o.opis}.</p>
                </div><!-- product detail /-->
             
             <div class="cart-menu">
                <ul class="menu">
                    
                    
                    <li><a href="index.php?page=jedan_oglas&id=${o.idOglas}" title="Ostavi komentar"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="index.php?page=jedan_oglas&id=${o.idOglas}" title="Detalji"><i class="fa fa-search-plus"></i></a></li>
                    
                </ul>
            </div><!-- product buttons /-->   
            
        </div><!-- product meta /-->
    </div>
</div><!-- Product /-->


    `;
    }
    $("#svi_oglasi").html(html);
}
//PRETRAGA SEARCH 

function pretraga(){
    let naziv=$("#search").val();
    
    
    $.ajax({
        url:"models/oglasi/pretraga.php",
        method:"POST",
        dataType:"json",
        data:{
            naziv:naziv
        },
        success:function(podaci){
            ispisOglasHome(podaci);
            oglasi(podaci);
            
        },
        error:function(xhr,status,error){
            console.error(error);
            console.error(xhr.status);
        }
    });
}

//ZAVRSETAK PRETRAGA SEARCH

// POCETAK ISPISA KATEGORIJA
function ispisiKategorije(){
    $.ajax({
        url:"models/kategorije/dohvati_sve.php",
        method:"post",
        dataType:"json",
        success:function(podaci){
            ispisKategorija(podaci);
        },
        error:function(xhr,status,error){
            console.error("Greska,AJAX, nisu popunjene kategorije");
            
        }
    })
}
function ispisKategorija(kategorije){
    let html="";
    for(let kat of kategorije){
        html+=`
        <li><a href="#" class="kat" data-id='${kat.idKategorija}'><i class="${kat.ikonica}" aria-hidden="true"></i>${kat.naziv}</a></li>
        `
    }
    $("#kategorije").html(html); 
    
}

//ZAVRSEN ISPIS KATEGORIJA

//FILTER PO KATEGORIJI
function filtriraj(e){
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
        url:"models/oglasi/oglas_kategorija.php",
        method:"POST",
        data:{
            id:id
        },
        dataType:"json",
        success:function(podaci){
            oglasi(podaci);
            console.log(podaci);
            ispisOglasHome(podaci);
        },
        error:function(xhr,status,error){
            console.error("Greska, AJAX , Filtriranje po kategoriji");
            console.error(error);
        }
    });

}
//ZAVRSEN FILTER PO KATEGORIJI
//ISPIS OGLASA NA POCETNOJ STRANI (NAJNOVIJI PO DATUMU)
function ispisOglasHome(podaci){
    let html="";
    for(let og of podaci){
        html+=`<div class="medium-3 small-12 columns product">
        <div class="product-image">
            
            <a href="index.php?page=jedan_oglas&id=${og.idOglas}">
                <img src="${og.putanja_oglas_slika}" alt="" />
                
            </a>
            
            
                
        </div><!-- Product Image /-->
        <div class="product-title">
            <a href="index.php?page=jedan_oglas&id=${og.idOglas}">${og.naziv}</a>
        </div><!-- product title /-->	
        <div class="product-meta">
            <div class="prices">
                <span class="price">${og.cena} RSD</span>
                
            </div>
            <div class="last-row">    
                <div class="pro-rating float-left">
                    <i>${og.datum}</i>
                </div>
                <div class="store float-right">
                    ${og.username}
                </div>
            </div><!-- last row /-->
            <div class="clearfix"></div>
        </div><!-- product meta /-->
    </div><!-- Product /-->
    
    
    <div class="clearfix"></div>
</div><!-- Content Section /-->
        
        `;
    }
    $("#oglasiHome").html(html);
}
// ZAVRSEN ISPIS OGLASA NA POCETNOJ STRANI PO DATUMU


// ovo je filter za STRANU KORISNIK DOHVATANJE JEDNOG OGLASA KAKO BI SE DODALA SLIKA TJ PROMENILA ZA NJEGA
function jedan_oglas(e){
    e.preventDefault();
   let id= $(this).data('id');
   $.ajax({
       url:"models/oglasi/dohvati_jedan.php",
       method:"POST",
       data:{
           id:id
       },
       dataType:"json",
       success:function(podaci,status,ceoZahtev){
           console.log("USPESNO DOHVACENO");
           popuniFormu(podaci);
       },
       error:function(greska,status,error){
           toastr.error("Doslo je do greske prilikom ubacivanje slike");
       }

   })
}
function popuniFormu(oglas){
    $("#skriveno").val(oglas.idOglas);
    
    $("#slikaOglas").attr('src', oglas.putanja_oglas_slika);
}
function ispisiOglase(){

    $.ajax({
        url:"models/oglasi/dohvati_sve.php",
        method:"POST",
        dataType:"json",
        success:function(data){
            ispisOglasa(data);
        },
        error:function(xhr,status,err){
           
        }
    })
}
function ispisOglasa(oglasi){
    let html="";
    for(let oglas of oglasi){
        html+=`
        <div class="popular-product">
        <img alt="" src="${oglas.putanja_oglas_slika}" class="float-left thumbnail" />
        
        <div class="float-right product-description">
            <a href="#">${oglas.naziv}</a>
            <div class="price">${oglas.cena} RSD</div>
            <a href="#"  class="slicica input-field ainput" data-id='${oglas.idOglas}' >Dodaj sliku za oglas</a>
        </div>
    </div>
    <div class="clearfix"></div>
        `
    }
    $("#oglasi").html(html);

}
//ZAVRSENA STRANA GDE SU KORISNIKU IZLISTANI SVI OGLASI KOJE ON IMA

//KLIJENTSKA PROVERA REGISTRACIJA
function registracija(){
    
    

    var username=$("#username").val();
    var reusername=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var email=$("#email").val();
    var reEmail=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var password=$("#password").val();
    var rePassword=/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/;

    if(username=="")
    {
        toastr.error("Polje je obavezno, morate uneti korisničko ime");
        
    }
    else if(!reusername.test(username)) 
    {
        toastr.error("Korisničko ime mora imati bar 8 karaktera");
    }
    else {
        toastr.success("Korisničko ime je uneto.");
    }

    if(email=="")
    {
        toastr.error("Polje je obavezno, morate uneti email");
    }
    else if(!reEmail.test(email)) 
    {
        toastr.error("Email nije u dobrom formatu, ne zaboravite karakter @");
    }
    else {
        toastr.success("Email je unet.");
    }

    if(password=="")
    {
        toastr.error("Polje je obavezno, morate uneti lozinku");
    }
    else if(!rePassword.test(password)) 
    {
        toastr.error("Lozinka mora sadržati samo karaktere i brojeve, mora imati najmanje 8 karaktera.");
    }
    else {
        toastr.success("Lozinka je uneta.");
    }

    function dohvatiPodatke() {
        var obj={
            uname:$("#username").val(),
            email:$("#email").val(),
            pwd:$("#password").val(),
            send:true
        };
    return obj;
    }
    function callAjax(obj){
        $.ajax({
            url:"models/korisnici/register.php",
            type:"POST",
            dataType:"json",
            data:obj,
            success:function(data,xhr){
                
                toastr.success("Uspešno ste registrovani!");
                $("#registerKor").css("display","none");
            },
            error:function(xhr,status,error){
                var poruka="Doslo je do greske";
                switch(xhr.status){
                    case 404:
                    poruka="Stranica nije pronadjena";
                    break;
                    case 409:
                    poruka="Username ili email vec postoji";
                    break;
                    case 422:
                    poruka="Podaci nisu validni";
                    console.log(xhr.responsiveText);
                    break;
                    case 500:
                    poruka="Greska";
                    break;
                }
                toastr.error(poruka);
            }
        });
    }
var podaci=dohvatiPodatke();
callAjax(podaci);
}
//ZAVRSENA REGISTRACIJA NA KLIJENTSKOJ STRANI

//DODAVANJE OGLASA FORMA
function dodavanjeOglasa(){
    var naziv = $("#naziv").val();
    var opis = $("#opis").val();
    var datum = $("#datum").val();
    var cena = $("#cena").val();
    var id=1;
    var grad = $("#ddlGradovi :selected").val();
    var kategorija = $("#ddlKategorije :selected").val();
    


    
    if(naziv=="")
    {
        toastr.error("Obavezno polje, unesite naziv");
    }
    if(opis=="")
    {
        toastr.error("Obavezno polje, unesiteopis");
    }
    if(datum=="")
    {
        toastr.error("Obavezno polje, izaberite datum");
    }
    if(cena=="")
    {
        toastr.error("Obavezno polje, unesite cenu");
    }
    if(grad=="0")
    {
        toastr.error("Obavezno polje, izaberite grad iz padajuće liste");
    }
    if(kategorija=="0")
    {
        toastr.error("Obavezno polje, izaberite kategorije iz padajuće liste");
    }

    function dohvatiZaInsert() {
        var obj={
            id:id,
            naziv:naziv,
            datum:datum,
            cena:cena,
            grad:grad,
            kategorija:kategorija,
            opis:opis,
            poslato:true
        };
    return obj;
    }
    function pozoviAjaxInsertOglas(obj){
        $.ajax({
            url:"models/oglasi/insert.php",
            method:"post",
            dataType:"json",
            data:obj,
            success:function(data, xhr){
                toastr.success("Post je sacuvan.");
                location.assign("index.php?page=korisnik");
            },
            error:function(xhr,status,error){
                var poruka="Nisu uneti svi podaci";
                switch(xhr.status){
                    case 422:
                    poruka="Podaci nisu u redu";
                    console.log(xhr.status);
                    break;
                }
                toastr.error("Niste lepo uneli podatke");
            }
            
        });
    }
var podaciOglas=dohvatiZaInsert();
pozoviAjaxInsertOglas(podaciOglas);

//ZAVRSENO DODAVANJE OGLASA FORMA

    
    

}