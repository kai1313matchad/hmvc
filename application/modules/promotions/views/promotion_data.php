<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>assets/frontend/images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
        Promotion Page
    </h2>
    <p class="m-text13 t-center">
        All About Promo
    </p>
</section>
<div class="container">
    <div class="page">
        <div class="row">
            <div class="col-md-3">
                <h6 class="m-text14 p-b-2">Kota</h6>
                <select class="form-control" name="location">
                    <option value=0>All</option>
                    <?php foreach($read_city as $val) {?>
                        <option value=<?php echo $val['CITY_ID']?>><?php echo $val['NAME']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-9">
                <div class="row mb-4" style="margin-top: 30px">
                    <div class="col-md-4">
                        <select class="form-control" name="sorting" id="sorting" onchange="Promotions.setFilter(this)">
                            <option value=0>Default Sorting</option>
                            <option value="sortNameAsc" <?php if($_GET['sortName'] == 'sortNameAsc') {?>selected<?php }?>>Promo Name: A to Z</option>
                            <option value="sortNameDesc" <?php if($_GET['sortName'] == 'sortNameDesc') {?>selected<?php }?>>Promo Name: Z to A</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($read_promotion as $k => $val) {?>
                        <div class="col-md-4">
                            <div class="box-img">
                                <img src="<?php echo base_url()?>/admin/assets/img/promotion/<?php echo $val['BACKGROUND'] ?>" alt="" class="img-cover">
                                <div class="title-card"><?php echo $val['TITLE']; ?></div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination justify-content-end">
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
        </div>
    </div>
</div>