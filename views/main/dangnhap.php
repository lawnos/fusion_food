<div class="page-content bg-white">
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('assets/images/banner/bnr4.jpg'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Đăng nhập</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Team Section -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="team-detail">
                    <div class="dz-info">
                        <form action="index.php?act=dangnhap" method="post" enctype="multipart/form-data">
                            <div class="offcanvas-body">
                                <div class="login-head">
                                    <h4 class="title">Chào mừng trở lại</h4>
                                    <p>Chúng tôi rất mong bạn tham gia mạng lưới người sáng tạo và người làm việc tự do 100% từ
                                        xa của
                                        chúng
                                        tôi.</p>
                                </div>
                                <div class="form-group m-b15">
                                    <label class="form-label">Số điện thoại*</label>
                                    <div class="input-group">
                                        <input name="sodienthoai" type="text" class="form-control" placeholder="Nhập số điện thoại của bạn">
                                    </div>
                                    <p class="text-danger"><?= $err_sodienthoai ?></p>
                                </div>
                                <div class="form-group m-b30">
                                    <label class="form-label">Mật khẩu*</label>
                                    <div class="input-group">
                                        <input name="pass" type="password" class="form-control" placeholder="Nhập số điện thoại của bạn">
                                    </div>
                                    <p class="text-danger"><?= $err_pass ?></p>
                                </div>
                                <button name="submit" id="submitLogin" value="submit" type="submit" class="btn btn-primary "><span>Đăng nhập</span></button>
                                <p class="m-t20"><a href="index.php?act=quenmatkhau">Quên mật khẩu ?</a></p>
                                <p class="m-t30">Chưa có tài khoản?
                                    <a class="register text-primary font-weight-500" data-bs-toggle="offcanvas" href="#offcanvasRegister" role="button" aria-controls="offcanvasRegister">Đăng ký ở
                                        đây</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </section>
        <!-- Team Section -->

    </div>