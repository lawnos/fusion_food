<div class="page-content bg-white">
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('assets/images/banner/bnr4.jpg'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Quên mật khẩu</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quên mật khẩu</li>
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
                        <form action="index.php?act=quenmatkhau" method="post" enctype="multipart/form-data">
                            <div class="offcanvas-body">
                                <div class="offcanvas-form">
                                    <div class="login-head">
                                        <h4 class="title">Quên mật khẩu</h4>
                                    </div>

                                    <div class="form-group m-b15">
                                        <label class="form-label">Email*</label>
                                        <div class="input-group">
                                            <input name="email" type="text" class="form-control" value="<?php if (isset($_POST["email"])) {
                                                                                                            echo $_POST["email"];
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        }
                                                                                                        ?>" placeholder="Nhập email để lấy mật khẩu">
                                        </div>
                                        <p class="text-danger"><?= $errEmail ?></p>
                                    </div>

                                    <button name="submit" value="submit" type="submit" class="btn btn-primary d-block btn-hover-2">
                                        <span>Gửi để lấy mật khẩu</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team Section -->

</div>