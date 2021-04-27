<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>assets/frontend/images/misc/recovering.jpg);">
    <h2 class="l-text2 t-center">
        Recovering Page
    </h2>
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
                        <?php foreach($read_recovering as $k => $val) {?>
                            <article class="blog wow fadeIn">
                                <div class="row no-gutters">
                                    <div class="col-lg-7">
                                        <figure>
                                            <a href="<?php echo base_url()?>recovering/detail?id=<?php echo $val['ID']?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/recovering/<?php echo $val['IMAGE'] ?>" alt="">
                                                <div class="preview"><span>Read more</span></div>
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="post_info">
                                            <div class="mb-1">
                                                <small><?php echo date('d M Y', strtotime($val['CREATED_AT']))?></small>
                                            </div>
                                            <h3 class="mb-3 font-weight-bold"><?php echo $val['TITLE']; ?></h3>
                                            <div>
                                                <?php echo character_limiter(strip_tags($val['DESCRIPTION']), 150); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination justify-content-start">
                                <?php if($page_active > 1) {?>
                                    <li class="page-item">
                                        <a class="page-link" href="read?city=<?php echo $city?>&page=<?php echo $page_active - 1?>&limit=<?php echo $page_limit?>&sortName=<?php $_GET['sortName']?>" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                <?php }?>
                                <?php for ($i=1; $i <= $page_count; $i++) { ?>
                                    <li class="page-item 
                                        <?php if($page_active == $i) {?>active<?php }?>" 
                                        <?php if($page_active == $i) {?>aria-current="page"<?php }?>
                                    >
                                        <a class="page-link" 
                                            <?php if($page_active == $i) {?>
                                                href="javascript:;"
                                            <?php } else {?>
                                                href="read?city=<?php echo $city?>&page=<?php echo $i?>&limit=<?php echo $page_limit?>&sortName=<?php $_GET['sortName']?>"
                                            <?php }?>
                                        >
                                            <?php echo $i?>
                                        </a>
                                    </li>
                                <?php }?>
                                <?php if($page_active < $page_count) {?>
                                    <li class="page-item">
                                        <a class="page-link" href="read?city=<?php echo $city?>&page=<?php echo $page_active + 1?>&limit=<?php echo $page_limit?>&sortName=<?php $_GET['sortName']?>" tabindex="-1" aria-disabled="true">&raquo;</a>
                                    </li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="m-text14 p-b-2 mb-3">Recent Post</h6>
                <ul class="comments-list">
                    <?php foreach($read_recovering_recent as $k => $val) {?>
                        <li>
                            <div class="alignleft">
                                <a href="">
                                    <div class="cardnail small">
                                        <a href="">
                                            <img src="<?php echo base_url()?>/admin/assets/img/recovering/<?php echo $val['IMAGE'] ?>" alt="">
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <small><?php echo date('d/m/Y', strtotime($val['CREATED_AT']))?></small>
                            <h3>
                                <a href="" title="">
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