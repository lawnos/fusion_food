<div class="page-content bg-white">
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr4.jpg'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Tin tức</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section -->
    <section class="content-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 order-lg-1 order-2">
                    <aside class="side-bar sticky-top left">
                        <div class="widget widget_categories">
                            <div class="widget-title">
                                <h4 class="title">Danh mục</h4>
                            </div>
                            <ul>
                                <li class="cat-item"><a href="index.php?act=tintuc">Hiển thị tất cả</a></li>

                                <?php
                                foreach ($dmtintuc as $key => $value) {
                                    extract($value);

                                ?>
                                    <li class="cat-item"><a href="index.php?act=danhmuctintuc&id=<?= $value['id_danhmuc_tintuc'] ?>"><?= $value['ten_danhmuc_tintuc'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="widget recent-posts-entry">
                            <div class="widget-title">
                                <h4 class="title">Bài viết gần đây</h4>
                            </div>
                            <div class="widget-post-bx">
                                <?php
                                foreach ($top3 as  $top3) {
                                    extract($top3);

                                ?>
                                    <div class="widget-post clearfix">

                                        <div class="dz-media">
                                            <img src="./uploads/monan/<?php echo $top3['anh_tintuc'] ?>" alt="">
                                        </div>
                                        <div class="dz-info">
                                            <h6 class="title"><a href="index.php?act=tintucchitiet&idttct=<?php echo $top3['id_tintuc'] ?>"><?php echo $top3['ten_tintuc'] ?></a></h6>
                                            <div class="dz-meta">

                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                    </aside>
                </div>
                <div class="col-xl-8 col-lg-8 order-lg-2 order-1 m-b30">
                    <div class="row">

                        <?php
                        if (count($tintuc_danhmuc) > 0) {
                            foreach ($tintuc_danhmuc as $key => $value) {
                                extract($value);
                        ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="dz-card style-1 overlay-shine dz-img-effect zoom m-b30">
                                        <div class="dz-media">
                                            <a href="index.php?act=tintucchitiet&idttct=<?php echo $value['id_tintuc'] ?>"><img src="./uploads/monan/<?php echo $value['anh_tintuc'] ?>" alt="/"></a>
                                        </div>
                                        <div class="dz-info">
                                            <div class="dz-meta">
                                                <ul>
                                                    <li><a href="javascript:void(0);"><i class="flaticon-calendar-date"></i> 09 Jan 2023</a></li>
                                                    <li class="dz-comment"><a href="javascript:void(0);"><i class="flaticon-chat-bubble"></i> 3.5K </a></li>
                                                </ul>
                                            </div>
                                            <h5 class="dz-title"><a href="index.php?act=tintucchitiet&idttct=<?php echo $value['id_tintuc'] ?>"><?php echo $value['ten_tintuc'] ?></a></h5>
                                            <p><?php echo $value['motangan'] ?>.</p>
                                            <a href="index.php?act=tintucchitiet&idttct=<?php echo $value['id_tintuc'] ?>" class="btn btn-primary btn-hover-2">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>

                    <!-- Phân trang -->
                    <?php
                            $count = count($list_tintuc_danhmuc);
                            $trang = ceil($count / 6);

                            if ($count >= 6) {
                                if (isset($_GET['trang'])) {
                                    $page = intval($_GET['trang']);
                                } else {
                                    $page = 1;
                                }
                    ?>
                        <div class="text-center m-t10">
                            <ul class="pagination m-b15">
                                <li class="page-item"><a class="page-link prev" href="index.php?act=danhmuctintuc&id=<?= $id_danhmuc_tintuc ?>&trang=<?= max(1, $page - 1)  ?>"><i class="fas fa-chevron-left"></i></a>
                                </li>

                                <?php
                                for ($i = 1; $i <= $trang; $i++) {
                                    $activeClass = ($i == $page) ? 'active' : '';
                                ?>

                                    <li class="page-item"><a class="page-link <?= $activeClass ?>" href="index.php?act=danhmuctintuc&id=<?= $id_danhmuc_tintuc ?>&trang=<?= $i ?>"><span>
                                                <?= $i ?>
                                            </span></a>
                                    </li>

                                <?php } ?>

                                <li class="page-item">
                                    <a class="page-link next" href="index.php?act=danhmuctintuc&id=<?= $id_danhmuc_tintuc ?>&trang=<?= min($trang, $page + 1) ?>">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                <?php
                            }
                        }
                ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section -->
</div>