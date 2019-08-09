@extends('layouts.dashboard')

@section('content')

 <style>
        .tree {
        }

        .tree ul {
            position: relative;
            padding: 1em 0 5px;
            /*white-space: nowrap;*/
            margin: 0 auto;
            text-align: center;
			display:table;
        }

        .tree ul::after {
            content: '';
            display: table;
            clear: both;
        }

        .tree li {
            display: inline-block;
            vertical-align: top;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 1em 0 0;
			display:table-cell;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 1em;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 1em;
        }

        .tree li a {
            display: inline-block;
            width: 106px;
            padding: 0;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            color: #333;
            position: relative;
            top: 1px;
            text-align: center;
            white-space: normal!important;
        }

        .tree li a .user-img {
            height: 80px;
            width: 80px;
            border: 3px solid #f1f1f1;
            border-radius: 100%;
            background: #fafafa;
            margin: 0 auto;
            overflow: hidden;
        }

        .tree li a .user-img img {
            width: 100%;
        }

        .tree li a .name {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #555555;
            padding: 6px 0 3px;
        }

        .tree li a .profile {
            display: block;
            font-size: 12px;
            color: #cccccc;
            padding: 3px 0 3px;
        }


        .tree li a:hover .user-img,
        .tree li a:hover+ul li a .user-img {
            border: 3px solid #C0C0C0;
        }

        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before {
            border-color: #C0C0C0;
        }
        .tree-modal{}
        .tree-modal .user-image{
            width: 200px;
            height: 200px;
            border-radius: 100%;
            border: 3px solid #f1f1f1;
            margin: 0 auto;
            overflow: hidden;
        }
        .tree-modal .user-image img{
            width: 100%;
        }
        .tree-modal .user-name{
            font-size: 20px;
            font-weight: bold;
            color: #555555;
            padding: 12px 0 3px;
            text-align: center;
            text-transform: uppercase;
        }
        .tree-modal .Phone{
            font-size: 16px;
            font-weight: bold;
            color: #555;
            padding: 6px 0 3px;
            text-align: center;
        }
        .tree-modal .Phone span{
            color: #ccc;
            text-transform: uppercase;
        }

        .tree-modal .email{
            font-size: 16px;
            font-weight: bold;
            color: #555;
            padding: 6px 0 3px;
            text-align: center;
        }
        .tree-modal .email span{
            color: #ccc;
            text-transform: uppercase;
        }


        .tree-modal .dob{
            font-size: 16px;
            font-weight: bold;
            color: #555;
            padding: 6px 0 3px;
            text-align: center;
        }
        .tree-modal .dob span{
            color: #ccc;
            text-transform: uppercase;
        }
        .tree-modal .c-level{
            font-size: 16px;
            font-weight: bold;
            color: #555;
            padding: 6px 0 3px;
            text-align: center;
        }
        .tree-modal .c-level span{
            color: #ccc;
            text-transform: uppercase;
        }
        .tree-modal button.close {
            padding: 0;
            background: #f1f1f1;
            border: 0;
            height: 30px;
            width: 30px;
            border-radius: 100%;
            opacity: 1;
        }
        .tree-modal .modal-header .close {
            margin-top: -15px;
            margin-right: -15px;
           
        }
        .tree-modal .modal-header .close:hover {
            background: #C90000;
            color: #fff;
        }
        .tree-modal .modal-header {
             border-bottom: none;
        }
        .tree-modal .modal-body {
            padding: 5px 20px 20px 20px;
        }
        .tree-modal .modal-content{
            border-radius: 15px;
        }
		@media(max-width:1800px){
            
            .tree li a {
                width: 90px;
            }
        }
		@media(max-width:1680px){
            .tree li a .user-img {
                height: 50px;
                width: 50px;
                border: 2px solid #f1f1f1;
            }
            .tree li a {
                width: 80px;
            }
        }
		@media(max-width:1440px){
            .tree li a .user-img {
                height: 50px;
                width: 50px;
                border: 2px solid #f1f1f1;
            }
            .tree li a {
                width: 70px;
            }
        }
        
        @media(max-width:1366px){
            .tree li a .user-img {
                height: 50px;
                width: 50px;
                border: 2px solid #f1f1f1;
            }
            .tree li a:hover .user-img,
            .tree li a:hover+ul li a .user-img {
                border: 2px solid #C0C0C0;
            }
            .tree li a {
                width: 70px;
            }
            .tree li {
                padding: 1em 0 0 0;
            }
            .tree li a .profile {
                line-height: 14px;
            }
        }
	@media(max-width:1280px){
            .tree li a .user-img {
                height: 40px;
                width: 40px;
                border: 2px solid #f1f1f1;
            }
           
            .tree li a {
                width: 50px;
            }
			.tree li a .name {
    font-size: 12px;

}
        }
        @media(max-width:1024px){
            .tree li a .user-img {
                height: 40px;
                width: 40px;
                border: 1px solid #f1f1f1;
            }
            .tree li a {
                width: 48px;
            }
			.tree li a .name {
          font-size: 12px;

}
        }
         @media(max-width:768px){
             .tree{
                 max-width: 767px;
                 overflow-x: auto;
             }
            .tree li a .user-img {
                height: 40px;
                width: 40px;
                border: 1px solid #f1f1f1;
            }
             .tree li a:hover .user-img,
            .tree li a:hover+ul li a .user-img {
                border: 1px solid #C0C0C0;
            }
            .tree li a {
                width: 90px;
            }
             .tree li a .name {
                font-size: 12px;
                font-weight: bold;
            }
        }
        
    </style>

 <div id="page-wrapper" >
            <div id="page-inner">

                 <div class="row">
                    <div class="col-md-8 heading">
                     <h2> Downline</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="{{url('user-network')}}">Downline</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                          @if(!empty($userDetail))
                                  <div class="tree">
                                      <ul>
                                        <li>
                                          <a href="javascript:void(0)" class="chlid" data-id="{{$userDetail->id}}">
                                              <div class="user-img">
                                                <?php if(!empty($userDetail->profileimage)){?>
                                                <img src="{{url('images/profile_images/'.$userDetail->profileimage)}}">
                                              <?php }else{?>
                                                  <img src="{{url('front/assets/img/find_user.png')}}">
                                              <?php } ?>

                                              </div><div class="name">{{$userDetail->name}}</div><div class="profile">{{$userDetail->user_as}}</div>
                                          </a>

                                          <?php $subChild= Helper::getTree($userDetail->id,$level='0');?>                                          
                                      </li>
                                  </ul>
                              </div>

                         @endif            
                       
                    </div>
              </div>  

      @if(!empty($GetCommissionUser))
      <div class="row commission">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Commissioni</h3>
  </div>
  <div class="panel-body"> 
   <strong>{{round($GetCommissionUser,2)}} PV</strong>
  </div>
</div>
  
  
          
      </div>  
      @endif          
  </div>           
</div>








<!-- The Modal -->
<div class="modal tree-modal " id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <!--<h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
        </div>
     <div class="modal-body">
                <div class="user-image">
               <?php if(!empty($userDetail->profileimage)){?>
                  <img id="profileimage" src="{{url('images/profile_images/'.$userDetail->profileimage)}}">
                <?php }else{?>
                    <img id="notexists" src="{{url('front/assets/img/find_user.png')}}">
                <?php } ?>
                </div>
                <div class="user-name"> 
                   {{!empty($userDetail->name)?$userDetail->name:''}}
                </div>
                <div class="Phone">
                   
                </div>
                 <div class="email"> 
                  
                </div>

                <div class="dob">
                    
                </div>
                <div class="c-level">
                  
                </div>
     </div>   

    </div>
  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).on('click','.chlid',function(){

  var userId= '<?php echo $userDetail->id;?>';

   var id=$(this).attr('data-id');   

  $.ajax({    
    type:"GET",
    url:'child-detail/'+id,
    success:function(result) {
        
        if(result!='')
        { 
             $('.user-name').html(result.name);
             if(userId==result.parent_id){
                $('.Phone').html("<span>Telefono</span>:-"+result.telephoneNumber);
                $('.email').html("<span>Email</span>:-"+result.email);
             }else{
                 $('.Phone').html('');
                $('.email').html('');
            }
             
             $('.dob').html("<span>Data di nascita</span>:-"+result.dob);
             $('.c-level').html("<span>Livello attuale</span>:-"+result.user_as);          
      
             if(result.profileimage!='' && result.profileimage!=null) {
               $('.user-image').html('<img src="images/profile_images/' + result.profileimage + '" />');
             }else{
                $('.user-image').html('<img src="front/assets/img/find_user.png" />');
             }
             $('#myModal').toggle();
        } 
    }
 });
}); 

$(document).on('click','.close',function(){
 $('#myModal').toggle();
});

</script>

@endsection
