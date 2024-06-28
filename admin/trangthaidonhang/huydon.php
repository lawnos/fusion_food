<?php 
  include "trangthaidonhang/title.php"
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>Trạng thái đơn hàng</h4>
                
                <table>
                    <tbody>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Họ tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày mua hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Chi tiết</th>
                        </tr>
                        <?php
                        $rowCount = 0;
                        foreach ($loaddonhanghuy as $key => $value) {
                            extract($value);
                            $rowCount++;
                            ?>
                        
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $ma_donhang ?>
                                </td>
                                <td>
                                    <?= $hoten ?>
                                </td>
                                <td>
                                    <?= $diachi ?>
                                </td>
                                <td>
                                    <?= $sodienthoai ?>
                                </td>
                                <td>
                                    <?= $ngaymua ?>
                                </td>
                                <td>
                                    <?= $loai_thanhtoan ?>
                                </td>
                               <?php 
                               
                               ?>
                                <td>
                                    
                                    <a 
                                        href="index.php?act=chitietdonhang&iddh=<?= $ma_donhang ?>">
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed"
                                            data-original-title="Chi tiết"><i class="fa-solid fa-list"
                                                aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>

                            
                        <?php } ?>
                    </tbody>
                </table>
                <?php if($rowCount == 0){
                                echo "<h3>Danh sách trống</h3>";
                            } ?>
            </div>
        </div>
    </div>
</div>