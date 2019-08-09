@extends('Affiliatese.dashboard')

@section('content')
    <div id="page-wrapper" >
            <div id="page-inner">
                            
                 <!-- /. ROW  -->
                  <hr />
          <div class="row">
		   @if(Auth::user()->is_profile_complete==0)
               <p style="text-align: center;color:red">Completa il tuo profilo per ottenere la carta Bklic e la lettera di conferma</p>
		   @endif
            </div> 

               
      </div>                    
    </div>       
  </div>   
</div>      
 </div>
@endsection
