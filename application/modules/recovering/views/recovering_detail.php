<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>assets/frontend/images/misc/recovering.jpg);">
    <h3 class="l-text2 t-center">
        <?php echo $read_recovering['TITLE']; ?>
    </h3>
    <p class="m-text13 t-center">
        All About Recovering
    </p>
</section>
<div class="container">
    <div class="page">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo base_url()?>admin/assets/img/recovering/<?php echo $read_recovering['IMAGE'] ?>" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-12">
                        <div class="d-inline-flex align-items-center mt-4 mr-4" style="color: #999">
                            <i class="fa fa-calendar mr-2"></i>
                            <?php echo date('d M Y', strtotime($read_recovering['CREATED_AT'])) ?>
                        </div>
                        <div class="d-inline-flex align-items-center mt-4 ml-4" style="color: #999">
                            <i class="fa fa-user mr-2"></i>
                            Admin
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <?php echo $read_recovering['DESCRIPTION']; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="m-text14 p-b-2 mb-3">Recent Post</h6>
                <ul class="comments-list">
                    <?php foreach($read_recovering_recent as $k => $val) {?>
                        <li>
                            <div class="alignleft">
                                <a href="<?php echo base_url()?>recovering/detail?id=<?php echo $val['ID']?>">
                                    <div class="cardnail small">
                                        <a href="<?php echo base_url()?>recovering/detail?id=<?php echo $val['ID']?>">
                                            <img src="<?php echo base_url()?>/admin/assets/img/recovering/<?php echo $val['IMAGE'] ?>" alt="">
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <small><?php echo date('d/m/Y', strtotime($val['CREATED_AT']))?></small>
                            <h3>
                                <a href="<?php echo base_url()?>recovering/detail?id=<?php echo $val['ID']?>" title="">
                                    <?php echo character_limiter($val['TITLE'], 25); ?>
                                </a>
                            </h3>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>