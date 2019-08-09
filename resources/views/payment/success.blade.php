@extends('layouts.dashboard')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                
               
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <h1>Il tuo pagamento è andato a buon fine.</h1> 
                            <h3>Numero di operazione - {{$taxId}}</h3>
                    
                    </div>                   
                </div>
            </div>              
         </div>
            
    </div>



@endsection
