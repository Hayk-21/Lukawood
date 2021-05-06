<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <h1 class="category_h1"><?php echo $hl?$hl:$category->getTitle() ?></h1>
        </div>
        <div class="col-md-4">
            <div class="category_desc1">
                <?php echo $content?$content:$category->content ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category_desc2">
                <?php echo $content2?$content2:$category->content2 ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category_contacts">
                <div class="text-center">
                <img src="/images/man-human-person.png" class="img-contact img-circle" />
                    <?php echo setting('catalog.phonedesc'); ?>
                </div>

                <div class="contact-desc">Пришлите нам в мессенджер или прикрепите в форму ниже фото, эскиз или чертеж, и мы рассчитаем стоимость и сроки изготовления.</div>

                <div class="contact1">
                    <?php echo setting('site.phone'); ?>
                </div>

                <div class="form-group text-center">
                <button  onclick="yaCounter57091114.reachGoal('Otpravit_foto_ili_chertezh'); ga ('send','event','submit','Otpravit_foto_ili_chertezh'); return true;" data-toggle="modal" data-target="#call">Отправить фото или чертеж</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="call"  tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Отправить фото или чертеж<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>

            </div>
            <div class="modal-body">
                <form action="<?php echo route('call')?>" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {!!  GoogleReCaptchaV3::renderField('call_id','call') !!}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваше Имя" name="client_name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Телефон" name="client_phone" required>
                    </div>
                    <div class="contact2">
                        <input type="file" name="file[]" multiple id="file" class="inputfile"/>
                        <label for="file"><span class="inputfile_view"><i class="glyphicon glyphicon-file"></i>&nbsp;&nbsp; Загрузить файл(ы)</span></label>
                    </div>

                    <div class="form-group text-center">
                        <button onclick="yaCounter57091114.reachGoal('Otpravit_Otpravit_foto_ili_chertezh'); ga ('send','event','submit','Otpravit_Otpravit_foto_ili_chertezh'); return true;" class="btn btn-default"  type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
