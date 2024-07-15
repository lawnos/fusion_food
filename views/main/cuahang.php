<div class="page-content bg-white">
	<!-- Banner  -->
	<div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr2.jpg'); background-size:cover; background-position:center;">
		<div class="container">
			<div class="dz-bnr-inr-entry">
				<h1>Cửa hàng</h1>
				<!-- Breadcrumb Row -->
				<nav aria-label="breadcrumb" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
						<li class="breadcrumb-item active" aria-current="page">Cửa hàng</li>
					</ul>
				</nav>
				<!-- Breadcrumb Row End -->
			</div>
		</div>
	</div>
	<!-- Banner End -->

	<!-- Search Section -->
	<section class="content-inner-1">
		<div class="container">
			<div class="row search-wraper text-center">
				<div class="col-lg-8 m-auto">
					<form action="index.php?act=cuahangloc" method="post">
						<div class="input-group">
							<input required="required" type="text" class="form-control" name="tukhoa" value="<?= isset($_POST['tukhoa']) ? $_POST['tukhoa'] : '' ?>" placeholder="Từ khóa">
							<div class="input-group-addon">
								<button name="timkiem" value="submit" type="submit" class="btn btn-primary btn-hover-2">
									<span>Tìm kiếm</span><i class="icon-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3">
					<aside class="side-bar left sticky-top">
						<div class="shop-filter">
							<div class="widget widget_tag_cloud ">
								<div class="widget widget_categories">
									<div class="widget-title">
										<h4 class="title">Danh mục</h4>
									</div>
									<ul>
										<li class="cat-item"><a href="index.php?act=cuahang">
												Tất cả sản phẩm
											</a>
										</li>
										<?php
										foreach ($list_all_dm as $key => $value) {
											extract($value);
										?>
											<li class="cat-item"><a href="index.php?act=monandanhmuc&iddm=<?= $id_danhmuc ?>">
													<?= $tendanhmuc ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="widget">
								<div class="widget-title">
									<h4 class="title">Lọc theo giá</h4>
								</div>
								<form action="index.php?act=cuahangloc" method="post">
									<div class="input-group mb-3">
										<input type="number" name="gia_start" value="<?= isset($_POST['gia_start']) ? $_POST['gia_start'] : '' ?>" min="0" style="height:50px" class="form-control" placeholder="Từ" aria-label="Username">
										<span class="input-group-text">-</span>
										<input type="number" name="gia_end" min="0" value="<?= isset($_POST['gia_end']) ? $_POST['gia_end'] : '' ?>" style="height:50px" class="form-control" placeholder="Đến" aria-label="Server">
									</div>
									<button name="loc_gia" type="locgia" class="btn btn-primary">Áp dụng</button>
								</form>
							</div>
						</div>
					</aside>
				</div>

				<div class="col-lg-9">
					<?php
					if (count($list_monan_in_page) > 0) {
					?>
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="title mb-md-3 mb-lg-4 m-b20 d-none d-lg-block">Tất cả sản phẩm</h5>
							<a href="javascript:void(0);" class="btn btn-primary panel-btn">Tìm kiếm</a>
						</div>
						<ul id="masonry" class="row">
							<?php
							foreach ($list_monan_in_page as $key => $value) {
								extract($value);
							?>
								<li class="card-container col-xl-4 col-md-6 m-b30">
									<div class="dz-img-box style-7">
										<div class="dz-media">
											<img src="uploads/monan/<?= $anh_monan ?>" alt="/">
											<div class="dz-meta">
												<ul>
													<?php
													if ($noibat > 10) {
													?>
														<li class="seller">Nổi bật</li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
										<div class="dz-content">
											<h5 class="title"><a href="index.php?act=chitietmonan&id_monan=<?= $id_monan ?>">
													<?= $ten_monan ?>
												</a></h5>
											<span class="price">
												<?= number_format($gia_monan, 0, ",", ".") ?> VNĐ
											</span>
										</div>
									</div>
								</li>
							<?php }
							?>
						</ul>

						<!-- Phân trang -->
						<?php
						$count = count($list_monan_cuahang_all);
						$trang = ceil($count / 9);

						if ($count >= 9) {
							if (isset($_GET['trang'])) {
								$page = intval($_GET['trang']);
							} else {
								$page = 1;
							}
						?>
							<div class="text-center m-t10">
								<ul class="pagination m-b15">
									<li class="page-item"><a class="page-link prev" href="index.php?act=cuahang&trang=<?= max(1, $page - 1)  ?>"><i class="fas fa-chevron-left"></i></a>
									</li>

									<?php
									for ($i = 1; $i <= $trang; $i++) {
										$activeClass = ($i == $page) ? 'active' : '';
									?>

										<li class="page-item"><a class="page-link <?= $activeClass ?>" href="index.php?act=cuahang&trang=<?= $i ?>"><span>
													<?= $i ?>
												</span></a>
										</li>

									<?php } ?>

									<li class="page-item">
										<a class="page-link next" href="index.php?act=cuahang&trang=<?= min($trang, $page + 1) ?>">
											<i class="fas fa-chevron-right"></i>
										</a>
									</li>
								</ul>
							</div>
						<?php }
					} else {
						?>
						<div class="not_found ">
							<img src="./views/assets/images/khogcosanpham.png" alt="Ảnh tìm kiếm" style="width: 300px;">
							<div class="d-flex align-items-center">
								<h3>Không tìm thấy:
								</h3>
								<h2>
									<p style="color: #7DA640;margin-top: 15px;margin-left: 8px;"><?= $_POST["tukhoa"] ?? "Không có món nào giá như vậy !" ?></p>
								</h2>
							</div>
						<?php
					} ?>
						</div>

				</div>





			</div>
	</section>
	<!-- Search Section -->

</div>