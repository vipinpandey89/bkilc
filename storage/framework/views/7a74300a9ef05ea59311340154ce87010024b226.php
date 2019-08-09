<?php $__env->startSection('content'); ?> <div id="Banner_wrapper" class="bg-parallax category-news" style="background-image:url(<?php echo e(url('website/images/fascione-news.jpg')); ?>);">
            <div id="Subheader">
                <div class="container">
                    <div class="inner_banner_title">
                        <h1 class="title">Contatti</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="Content">
            <!--- category-news --->

            <section class="contact-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image_wrapper"><img class="scale-with-grid" src="<?php echo e(url('website/css/home_meeting_contact1.png')); ?>" alt=""></div>
                            <h2>Inviaci un'email, ti risponderemo al più presto.</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <form>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nome e cognome">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                    
                                   
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Oggetto">
                                            </div>
                                        </div>
                                   
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea rows="6"></textarea>
                                            </div>
                                        </div>
                                   
                                   
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    Acconsento al trattamento dei miei dati personali e dichiaro di aver preso visione del testo su Cookie & Privacy
                                                </label>
                                            </div>
                                        </div>
                                    
                                    
                                        <div class="col-md-12">
                                            <button class="btn contact-form-btn">INVIA</button>
                                        </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>