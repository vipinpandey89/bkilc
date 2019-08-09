				<div id="list">
				@if(!$getAffiliatesDetail->isEmpty())
					
				@foreach($getAffiliatesDetail as $val)
					<?php $fnames = $val->filename;
					$arr = explode("$", $fnames);
					
					?>
					 <div class="product-grid love-grid colmd4"><div class="product-img-col">
							<a href="{{url('affiliatese/single/'.$val->id)}}">
								<!-- <div class="more-product"><span> </span></div>						 -->
								<div class="product-img b-link-stripe b-animate-go  thickbox">
									<h4>sconto<br> <span>{{$val->discount_amount}}%</span></h4>
									@if (!empty($val->logo)) 
									<img src="{{url('dealer_logos/'.$val->logo)}}" class="img-responsive" alt=""/>
									@else	
									<img src="{{url('website/images/no-image.png')}}" class="img-responsive" alt=""/>
									@endif	
								</div>
								<div class="product-other-info">
									<div class="category-label-wrap"><span>Ristorante</span></div> 						
						<!-- @if (!empty($val->logo)) 
							<img class="aff_logo" src="{{url('dealer_logos/'.$val->logo)}}" class="img-responsive" alt=""/>
							@endif	 -->

						</div>
					</a>
				</div>						
				<div class="product-info simpleCart_shelfItem">
					<div class="product-info-cust prt_name">
						<div class="prod-dis">
							<h4>{{$val->business_name}}</h4>
						</div>
						<!-- <p class="prod-desc">{{ strip_tags(str_limit($val->description, $limit = 100, $end = '...')) }}<p> -->
							<div class="reviewmain">
							<div class="reviews">
									<span class="fa fa-star @if($val->rate >= 1){{'checked'}} @endif"></span>
									<span class="fa fa-star @if($val->rate >= 2){{'checked'}} @endif"></span>
									<span class="fa fa-star @if($val->rate >= 3){{'checked'}} @endif"></span>
									<span class="fa fa-star @if($val->rate >= 4){{'checked'}} @endif"></span>
									<span class="fa fa-star @if($val->rate >= 5){{'checked'}} @endif"></span>
								</div>
								<div class="reviewtext">
									<span class="heading">Voto dell'utente</span>
								</div>
							</div>	
							<div class="addressmain">
								<div class="addressicon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="addresstext">
									<span>{{$val->region}}</span>
								</div>
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
				</div>	
					@endforeach
					
					@else
						<p style="text-align: center;">There are not more Affiliates</p>
					     <style>
						 #viewmore{display:none;}
						</style>
					@endif
					</div>
					@if($getAffiliatesDetail->count() < 15)
						<style>
						 #viewmore{display:none;}
						</style>
					@else	
						<style>
						 #viewmore{display:block !important;}
						</style>
					@endif	
					