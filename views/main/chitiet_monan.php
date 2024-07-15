<?php
extract($listmonan);

?>
<div class="page-content bg-white">
	<!-- Banner  -->
	<div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr1.jpg'); background-size:cover; background-position:center;">
		<div class="container">
			<div class="dz-bnr-inr-entry">
				<h1>Chi tiết sản phẩm</h1>
				<!-- Breadcrumb Row -->
				<nav aria-label="breadcrumb" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
						<li class="breadcrumb-item active" aria-current="page">Sản phẩm chi tiết</li>
					</ul>
				</nav>
				<!-- Breadcrumb Row End -->
			</div>
		</div>
	</div>
	<!-- Banner End -->

	<!-- Product Detail Section -->
	<form action="index.php?act=themgiohangchitiet&id_monan=<?= $id_monan ?>" method="post">
		<section class="content-inner-1 overflow-hidden">
			<div class="container">
				<div class="row product-detail">
					<div class="col-lg-4 col-md-5">
						<div class="detail-media m-b30">
							<img src="uploads/monan/<?= $anh_monan ?>" alt="/">
						</div>
					</div>
					<div class="col-lg-8 col-md-7">
						<div class="detail-info">
							<span class="badge">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="0.5" y="0.5" width="16" height="16" stroke="#0F8A65" />
									<circle cx="8.5" cy="8.5" r="5.5" fill="#0F8A65" />
								</svg>
								Chất lượng
							</span>
							<div class="dz-head">
								<h2 class="title">
									<?= $ten_monan ?>
								</h2>
								<div class="rating">
									<i class="fa-solid fa-star"></i> <span><strong class="text-dark">4.5</strong> - 20
										Người xem</span>
								</div>
							</div>
							<ul class="detail-list">
								<li>Giá<span class="text-primary m-t5">
										<?= number_format($gia_monan, 0, ",", ".") ?> VNĐ
									</span></li>
								<li>Số lượng
									<div class="dz-body">
										<div class="btn-quantity style-1">
											<input class="product_food_ct" name="soluongmua" min="1" type="text" value="1" name="demo_vertical2">
											<span class="input-group-btn-vertical">
												<button class="btn btn-default bootstrap-touchspin-up click_ct_right" type="button"> <i class="ti-plus"></i> </button>
												<button class="btn btn-default bootstrap-touchspin-up click_ct_left" type="button"> <i class="ti-minus"></i> </button>
											</span>
										</div>

									</div>
								</li>
							</ul>
							<h6 class="title">Thêm cùng</h6>
							<ul class="add-product">
								<?php
								foreach ($list_douong as $key => $value) {
								?>
									<li>
										<label class="mini-modal" id="click">
											<div class="dz-media">
												<img src="uploads/monan/<?= $value["anh_monan"] ?>" alt="/">
											</div>
											<div class="dz-content">
												<p class="title"><?= $value["ten_monan"] ?></p>
												<div class="form-check search-content">
													<input class="form-check-input" id="click" type="checkbox" name="id_monan[]" value="<?= $value["id_monan"] ?>">
												</div>
											</div>
										</label>
									</li>
								<?php
								}
								?>
							</ul>
							<div class="d-lg-flex justify-content-between">
								<ul class="modal-btn-group">
									<li><button name="themgio" type="submit" class="btn btn-primary btn-hover-1"><span>Thêm vào giỏ
												hàng<i class="flaticon-shopping-bag-1 m-l10"></i></span></button>
									</li>
									<li>
										<a href="index.php?act=giohang&id_monan=<?= $id_monan ?>" class="btn btn-outline-secondary btn-hover-1"><span>Mua
												ngay <i class="flaticon-shopping-cart m-l10"></i>
										</a>
										</span>
									</li>
								</ul>
								<ul class="avatar-list avatar-list-stacked">
									<li class="avatar"><img src="views/assets/images/testimonial/small/pic1.jpg" alt="">
									</li>
									<li class="avatar"><img src="views/assets/images/testimonial/small/pic2.jpg" alt="">
									</li>
									<li class="avatar"><img src="views/assets/images/testimonial/small/pic3.jpg" alt="">
									</li>
									<li class="avatar"><img src="views/assets/images/testimonial/small/pic4.jpg" alt="">
									</li>
									<li class="avatar"><img src="views/assets/images/testimonial/small/pic5.jpg" alt="">
									</li>
									<li class="avatar"><span>150+</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>


	<div class="content-inner pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs tabs-style-1">
						<li class="nav-item">
							<button class="nav-link active" data-bs-toggle="tab" href="#web-design-1">
								<i class="icon-globe"></i>
								<span class="d-none d-md-inline-block m-l10">Mô tả</span>
							</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" data-bs-toggle="tab" href="#graphic-design-1">
								<i class="icon-image"></i>
								<span class="d-none d-md-inline-block m-l10">Thông tin thêm</span>
							</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" data-bs-toggle="tab" href="#developement-1">
								<i class="icon-settings"></i>
								<span class="d-none d-md-inline-block m-l10">Bình luận</span>
							</button>
						</li>
					</ul>
					<div class="tab-content">
						<div id="web-design-1" class="tab-pane active">
							<?= $mota_monan ?>
						</div>
						<div id="graphic-design-1" class="tab-pane">
							<table class="table-bordered check-tbl">
								<tr>
									<td>
										<?= $ten_monan ?>
									</td>
									<td>Ăn một lần ấm no cả đời</td>
								</tr>
								<tr>
									<td>Thành phần</td>
									<td>Được làm từ rau củ quả chất lượng</td>
								</tr>

								<tr>
									<td>Chi phí vận chuyển</td>
									<td>Miễn phí vận chuyển</td>
								</tr>
							</table>
						</div>
						<div id="developement-1" class="tab-pane">
							<div class="comments-area" id="comments">
								<ul class="comment-list">
									<?php
									foreach ($listbinhluan as $key => $value) {
										if (!is_null($value)) {
											extract($value);
									?>
											<li class="comment">
												<div class="comment-body">
													<div class="comment-author vcard">
														<img class="avatar photo" src="./uploads/avatar/<?= $anh_taikhoan ?>" alt="/">
														<cite class="fn"><?= $hoten ?></cite>
													</div>
													<p><?= $noidung ?></p>
													<p><?= $ngaybinhluan ?></p>
												</div>
											</li>
									<?php
										}
									}
									?>

								</ul>
							</div>

							<div class="comment-respond style-1" id="respond">
								<h3 class="comment-reply-title mb-4" id="reply-title">Bình luận</h3>
								<form class="comment-form" id="commentform" method="post">
									<p class="comment-form-comment">
										<?php
										date_default_timezone_set('Asia/Ho_Chi_Minh');
										$ngaybinhluan = date("Y-m-d");
										?>
										<input type="hidden" id="id_nguoidung" value="<?= $id_nguoidung ?>">
										<input type="hidden" id="id_monan" value="<?= $id_monan ?>">
										<input type="hidden" id="ngaybinhluan" value="<?= $ngaybinhluan ?>">
										<label for="comment">Bình luận</label>
										<textarea rows="10" id="noidung" placeholder="Nhập bình luận" id="comment"></textarea>
										<span class="text-danger cmt-err"></span>
									</p>
									<p class="form-submit">
										<input class="btn btn-primary btn-hover-2" type="submit" id="insert_cmt" value="Gửi bình luận">
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Image Box-1  -->
	<section class="content-inner-1 bg-white overflow-hidden pt-sm-0">
		<div class="container">
			<div class="section-head text-center">
				<h2 class="title wow flipInX" data-wow-delay="0.2s">Thực đơn của chúng tôi</h2>
			</div>
			<div class="swiper-btn-lr">
				<div class="swiper portfolio-swiper">
					<div class="swiper-wrapper">
						<?php foreach ($list_menu_home as $key => $value) {
							extract($value);
						?>
							<div class="swiper-slide">
								<div class="dz-img-box style-1 wow fadeInUp" data-wow-delay="0.4s">
									<div class="dz-media">
										<img src="uploads/monan/<?= $anh_monan ?>" alt="/">
									</div>
									<span class="dz-tag"></span>
									<div class="dz-content">
										<div class="dz-info">
											<h5 class="dz-title mb-0"><a href="index.php?act=chitietmonan&id_monan=<?= $value["id_monan"] ?>">
													<?= $ten_monan ?>
												</a></h5>
											<span class="dz-price">
												<?= number_format($gia_monan, 0, ",", ".") ?> VNĐ
											</span>
										</div>
										<a href="index.php?act=themgiohang&id_monan=<?= $value["id_monan"] ?>" class="btn btn-cart btn-white text-primary btn-square">
											<!-- <i class="flaticon-shopping-cart"></i> -->
											<i class="fa-solid fa-cart-plus"></i>
										</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="pagination mt-xl-0 m-t40">
					<div class="img-button-prev btn-prev-long"><i class="fa-solid fa-arrow-left"></i></div>
					<div class="img-button-next btn-next-long"><i class="fa-solid fa-arrow-right"></i></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Image Box-1 -->
</div>