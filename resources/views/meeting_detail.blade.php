@extends('website-layout.header')

@section('content')

<div id="Banner_wrapper" class="bg-parallax single-post" style="background-color:#024eac;">
	<div id="Subheader">
		<div class="container">
			<div class="inner_banner_title">
				<h1 class="title lineHeight">Finalmente è arrivato quello che tutti aspettavano</h1>
			</div>
		</div>
	</div>
</div>
<div id="Content">
	<!--- HAPPY EASTER --->
	<div id="meeting-detail" class="section post_section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="image-part">
						<div class="box_frame">
							<div class="text-center vc_figure">
								<img src="{{url('images/news/'.$getNewsDetail->image)}}" class="img-responsive" alt="">
							</div> 
						</div> 
					</div>
				</div>
				<div class="col-md-6">
					<div class="image-content">
						<div class="post-excerpt">
							<h3>Incontro organizzato da:</h3>
							<p><b>Registrazione alla presentazione dalle ore 16:30 alle ore 17:00</b></p>
							<b>Inizio ore 17:00</b>
							<p class="big">La presentazione dura al massimo 60 minuti, alla fine della quale le persone interessate ad iniziare l’attività potranno trattenersi per un piccolo corso informativo e formativo dalla durata di altri 60 minuti.</p>
							<p>Per l’occasione è richiesto un abbigliamento consono</p>
							<h3>Ospiti dell’evento:</h3>
							<p>I soci e fondatori <b>Francesco Quarta</b> e <b>Cosimo Greco</b></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="google-maps">
			<iframe style="width:100%;height:450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48647.502952760224!2d18.139274957415065!3d40.35412541916928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13442ee42f2d1109%3A0x9b5b5a4c6ab377f0!2s73100+Lecce%2C+Province+of+Lecce%2C+Italy!5e0!3m2!1sen!2sin!4v1558099082449!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Prenota il tuo posto alla presentazione</h2>
                    <a href="javascript:void(0)">PRENOTA <i class="fa fa-thumbs-o-up"></i></a>
                </div>
            </div>
        </div>
    </section>
	</div>  
</div>
@endsection