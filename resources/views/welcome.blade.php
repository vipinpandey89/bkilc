@extends('website-layout.header')

@section('content')

<div id="Banner_wrapper" class="bg-parallax banner_wrapper" style="background-image:url({{url('website/images/home-page.jpg')}});">
 
  <div class="tp-shape">
 <div class="banner_title">
  <h1>Bklic</h1>
  <h2>Cambia la vita</h2>
  <div class="banner_btn">
  <a href="#video_section" class="cta_btn">Scopri di Più </a>
  </div>
  </div>
  </div>
  <div id="banner_shape"></div>
 </div>

    <div id="Content">
<!--- VIDEO SECTION HOME  --->
 <div id="video_section" class="section">
   <div class="container-fluid">
    <div class="video_frame">
    <div class="video_wrapper">
    <iframe width="100%" height="550" src="https://www.youtube.com/embed/rfJLGlz2h9I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    </div>
   </div>
  </div>
  


  <div id="service_section" class="section">
  <div class="container">
  <div class="row">
  
  <div class="col-lg-4 col-md-4 col-sm-4">
  <div class="icon_box"><a href="{{url('affiliati-gratis')}}"><div class="image_wrapper"><img src="{{url('website/images/home_meeting_pic1-1-1.png')}}" class="img-responsive" alt="" width="" height=""></div>
  <div class="desc_wrapper"><h4 class="title">Affiliati gratis</h4><div class="desc">Nuovi <b>CLIENTI</b> + clienti <b>FIDELIZZATI </b>= più <b>GUADAGNO</b>
Unisciti a noi per costruire il più grande circuito commerciale e la più grande <b>COMUNITÀ </b>d’Italia </div></div></a></div>
  
  </div>
  
  <div class="col-lg-4 col-md-4 col-sm-4">
  <div class="icon_box"><a href="{{url('lavora-con-noi')}}"><div class="image_wrapper"><img src="{{url('website/images/home_meeting_pic2-1.png')}}" class="img-responsive" alt="" width="" height=""></div><div class="desc_wrapper"><h4 class="title">Lavora con noi</h4><div class="desc">Bklic, un progetto <b>UNICO </b>che ti dà la possibilità di essere protagonista in un grande mercato già <b>RICCO </b>ma in fortissima <b>CRESCITA </b>nei prossimi anni.</div></div></a></div>
  
  </div>
  
  <div class="col-lg-4 col-md-4 col-sm-4">
  <div class="icon_box"><a href="{{url('bklic-card')}}"><div class="image_wrapper"><img src="{{url('website/images/home_meeting_pic3-1-1.png')}}" class="scale-with-grid" alt="" width="" height=""></div><div class="desc_wrapper"><h4 class="title">Risparmia con la card</h4><div class="desc">Mia <b>NONNA </b>diceva: un centesimo <b>RISPARMIATO </b>è un centesimo <b>GUADAGNATO</b>. Scopri quanto è semplice risparmiare sulla spesa di tutti i giorni.</div></div></a></div>
  
  </div>
  
  </div>
  </div>
  </div>
  
  

  
   <!--- Who we are / Home  --->

  
   <!--- Who we are / Home  --->
   <div id="whoweare" class="section">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="row image_frame">
                       <div class="image_wrapper">
                        <img src="{{url('website/images/chisiamo.jpg')}}" class="img-responsive" alt="">
                       </div>
                   </div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="row text_frame">
                       <div class="text_wrapper">
                           <h2 class="title_heading">Chi siamo</h2>
                           <p>La nostra idea, Facile, Semplice, Duplicabile, Risparmio e Guadagno.</p>
                           <p><strong>Bklic</strong> è una azienda di <strong>Network Marketing Italiana</strong> creata con <strong>la voglia di aiutare le persone</strong> che sentono l’esigenza di cambiare in meglio il percorso della vita e raggiungere nuovi livelli di libertà, tranquillità economica e crescita personale, attraverso un sistema nuovo che coniuga lavoro, guadagno, percorso formativo e divertimento.</p>

                           <a href="{{url('chi-siamo')}}"  class="button_label">Scopri di più <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
  
 <!--- What is Bklic --->
 <div id="Bklic_section" class="section">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row text_frame">
                   <div class="text_wrapper">
                       <h2 class="title_heading">Cos'è Bklic</h2>
                       <p>Il <b>progetto Bklic</b> mette in contatto commercianti che hanno la necessità di fidelizzare clienti e trovarne di nuovi, con le famiglie che hanno l’esigenza di risparmiare concretamente aumentando il potere d’acquisto.</p>
                       <h3>Uniti è meglio! La parola d'ordine è condivisione.</h3>
                       <a href="{{url('opportunita')}}" class="button_label">Scopri di più <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                   </div>
               </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row image_frame">
                   <div class="image_wrapper">
                    <img src="{{url('website/images/Bklic-1.jpg')}}" class="img-responsive" alt="">
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
 

 
 <!--- Our Mission / Home  --->
 <div id="Our_mission" class="section">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row image_frame">
                   <div class="image_wrapper">
                    <img src="{{url('website/images/home-mission.jpg')}}" class="img-responsive" alt="">
                   </div>
               </div>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row text_frame">
                   <div class="text_wrapper">
                       <h2 class="title_heading">La Nostra Mission</h2>
                       <p>Vediamo persone in difficoltà finanziaria perché sono legate ad un modello di economia che non esiste più. Tra 10 anni, le certezze di oggi, saranno un ricordo sbiadito per gli adulti di oggi e un mondo sconosciuto per le nuove generazioni!</p>
                       <p>Per farti raggiungere i tuoi obiettivi, noi siamo pronti a prenderti per mano e giorno dopo giorno, passo dopo passo <strong>aiutarti a realizzare i tuoi sogni</strong></p>

                       <a href="{{url('mission')}}"  class="button_label">Scopri di più <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
 
 <!---Career and Earnings --->
 <div id="Bklic_section" class="section">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row text_frame">
                   <div class="text_wrapper">
                       <h2 style="margin-top:20px;">Carriera e Guadagni</h2>
                       <p>Bklic è la prima azienda, che adotta un <b>nuovo modello di Piano Marketing e distribuzione dei compensi</b>.</p>
                       <p>A differenza del metodo adottato diffusamente da altre aziende, dove i collaboratori guadagnano sulla "<b>differenza imprenditoriale</b>", Bkilc ha deciso di essere pioniere su due nuovi concetti:</p>
                       <p>1) <b>Guadagno secco per ogni livello di organizzazione</b> e somma dei guadagni maturati per ogni livello di organizzazione.</p>
                       <p>2) La possibilità di <b>godere appieno di ciò che con sacrificio crei</b>, senza la paura di dover un giorno ricominciare daccapo.</p>
                       <a href="{{url('career-and-gains')}}" class="button_label">Scopri di più <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                   </div>
               </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="row image_frame">
                   <div class="image_wrapper">
                    <img src="{{url('website/images/home-carriera-e-guadagni-1500.jpg')}}" class="img-responsive" alt="">
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

</div>


@endsection