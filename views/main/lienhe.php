<div class="page-content bg-white">
	<!-- Banner  -->
	<div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr1.jpg'); background-size:cover; background-position:center;">
		<div class="container">
			<div class="dz-bnr-inr-entry">
				<h1>Liên hệ</h1>
				<!-- Breadcrumb Row -->
				<nav aria-label="breadcrumb" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
						<li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
					</ul>
				</nav>
				<!-- Breadcrumb Row End -->
			</div>
		</div>
	</div>
	<!-- Banner End -->

	<!-- Contact Section -->
	<section class="section-wrapper-8 content-inner-1">
		<div class="container">
			<div class="row inner-section-wrapper align-items-center">
				<div class="col-lg-3 col-sm-6">
					<div class="icon-bx-wraper style-5 hover-aware box-hover">
						<div class="icon-bx">
							<div class="icon-cell">
								<i class="flaticon-placeholder"></i>
							</div>
						</div>
						<div class="icon-content">
							<h5 class="title">Địa chỉ</h5>
							<p>Long Mao <br>Hà Nội</p>
							<div class="effect bg-primary"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="icon-bx-wraper style-5 hover-aware box-hover active">
						<div class="icon-bx">
							<div class="icon-cell">
								<i class="flaticon-telephone"></i>
							</div>
						</div>
						<div class="icon-content">
							<h5 class="title">Số điện thoại</h5>
							<p>+(800) 800-900-100 <br>+222 33 567 8665</p>
							<div class="effect bg-primary"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="icon-bx-wraper style-5 hover-aware box-hover">
						<div class="icon-bx ">
							<div class="icon-cell">
								<i class="flaticon-email-1"></i>
							</div>
						</div>
						<div class="icon-content">
							<h5 class="title">Địa chỉ email</h5>
							<p>ntn@ntn.com <br>ntn@fpt.web.com</p>
							<div class="effect bg-primary"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="icon-bx-wraper style-5 hover-aware box-hover">
						<div class="icon-bx ">
							<div class="icon-cell">
								<i class="flaticon-clock-1"></i>
							</div>
						</div>
						<div class="icon-content">
							<h5 class="title">Giờ mở cửa & Giờ đóng cửa</h5>
							<p>Thứ hai - Chủ nhật <br>09:00am - 07.00pm </p>
							<div class="effect bg-primary"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="section-head text-center">
				<h2 class="title">Lời nhắn</h2>
			</div>
			<!-- <form class="dzForm dezPlaceAni" method="POST" action="index.php?act=lienhechungtoi"> -->
			<form action="index.php?act=lienhechungtoi" method="POST">
				<div class="row">
					<div class="col-lg-6 col-md-6 m-b30 m-sm-b50">
						<label class="form-label text-primary">Tên</label>
						<div class="input-group input-line input-black">
							<input name="ho_ten" type="text" value="<?php
																	if (isset($_POST["ho_ten"])) {
																		echo $_POST["ho_ten"];
																	} else {
																		echo "";
																	}
																	?> " class="form-control" placeholder="Nhập tên">
						</div>
						<p class="text-danger"><?= $err_ho_ten ?></p>
					</div>
					<div class="col-lg-6 col-md-6 m-b30 m-sm-b50">
						<label class="form-label text-primary">Email</label>
						<div class="input-group input-line input-black">
							<input name="email" type="text" value="<?php
																	if (isset($_POST["email"])) {
																		echo $_POST["email"];
																	} else {
																		echo "";
																	}
																	?> " class="form-control" placeholder="Nhập email">
						</div>
						<p class="text-danger"><?= $err_email ?></p>
					</div>
					<div class="col-lg-12 col-md-6 m-b30 m-sm-b50">
						<label class="form-label text-primary">Số điện thoại</label>
						<div class="input-group input-line input-black">
							<input name="sodienthoai" type="text" class="form-control dz-number" value="<?php
																										if (isset($_POST["sodienthoai"])) {
																											echo $_POST["sodienthoai"];
																										} else {
																											echo "";
																										}
																										?>" placeholder="Nhập số điện thoại">
						</div>
						<p class="text-danger"><?= $err_sodienthoai ?></p>
					</div>
					<div class="col-sm-12 m-b40">
						<label class="form-label text-primary">Lời nhắn</label>
						<div class="input-group input-line input-black">
							<textarea name="noidung" class="form-control" placeholder="Xin chào, hãy nêu ý kiến của bạn!"><?php
																			if (isset($_POST["noidung"])) {
																				echo $_POST["noidung"];
																			} else {
																				echo "";
																			}
																			?></textarea>
						</div>
						<p class="text-danger"><?= $err_noidung ?></p>
					</div>
					<div class="col-12 text-center">
						<button name="submit" value="submit" type="submit" class="btn btn-primary btn-hover-1"><span>Gửi lời nhắn</span></button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<!-- Contact Section -->

</div>