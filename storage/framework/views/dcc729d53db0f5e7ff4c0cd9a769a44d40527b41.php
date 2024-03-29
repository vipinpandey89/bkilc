<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica del livello</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('administrator/wallet-livello-list')); ?>">Lista livello</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica del livello</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
       <hr/>
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate> 

							<div class="form-group <?php echo e($errors->has('level_name') ? ' has-error' : ''); ?>">
								 <label for="Livello">Livello</label> 
                 <select class="form-control" id="level" name="level_name">
                        <option value="">seleziona Livello</option>
                        <option value="16">BK0</option>
                        <option value="1">BK2-BK12</option>
                        <option value="13">President</option>
                        <option value="14">President Team</option>
                        <option value="15">President Executive</option>

                 </select>								
						        <?php if($errors->has('level_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('level_name')); ?></strong>
                                </span>
                     <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('percentage') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Percentuale</label> 
										<input type="text" class="form-control" id="exampleInputEmail1" name="percentage" value="<?php echo e(!empty($levelDetail)?$levelDetail[0]->level_percentage:old('percentage')); ?>" placeholder="Percentuale">

								    <?php if($errors->has('percentage')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('percentage')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

								  <?php echo e(csrf_field()); ?>


							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> 
							</form> 
						</div>
					</div>											
				</div>
			</div>
		</div>


<script type="text/javascript">
  $('#level').on('change',function(){

    var value= $(this).val();

    var publicurl= "<?php  echo url('/administrator/levelajax/');?>";  

    var levelId= '<?php echo $levelDetail[0]->id;?>';

   $.ajax({    
    type:"GET",
    data:{val:value},
    url:publicurl+'/'+levelId,
    success:function(result) {        
          
          if(result!='')
          {
             // alert(result);

            var obj=  JSON.parse(result);
            $('#exampleInputEmail1').val(obj.level_percentage);
         }
      }
  });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>