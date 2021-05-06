<section class="callback_block" id="contact2">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInLeft bounceIn" data-wow-duration="0.5s" data-wow-delay="0.5s" data-wow-offset="50">
                <h2 class="section__title"><?php echo isset($h2_callback)?$h2_callback:'Заявка на расчет стоимости';?></h2>
            </div>
        </div>

        <div class="row">
            <div class="wow zoomIn bounceIn" data-wow-duration="0.5s" data-wow-delay="0.5s" data-wow-offset="50">
                <form class="callback_form uploadfiles__form" action="<?php echo route('maincall')?>" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваше Имя" name="client_name" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Телефон" name="client_phone" required>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Ваше описание" name="client_message"
                                  required></textarea>
                    </div>

                    {!!  GoogleReCaptchaV3::renderField('maincall_id','maincall') !!}
                    <div class="form-group text-center">
                    <input type="file" name="file[]"   id="file" class="inputfile" multiple/>
                    <label  for="file"><span class="inputfile_view"><i class="glyphicon glyphicon-file"></i>&nbsp;&nbsp; Загрузить файл(ы)</span></label>
                    </div>

                    <div class="form__input__wrapper" style="margin-top: 15px">
                        <button onclick="yaCounter57091114.reachGoal('Rasschitat_stoimost'); ga ('send','event','submit','Rasschitat_stoimost'); return true;" class="button__style__form" type="submit">
                        Рассчитать стоимость
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="phone-mobile navbar-fixed-bottom hidden-lg hidden-md">
    <?php echo setting('site.phone'); ?>
</div>
