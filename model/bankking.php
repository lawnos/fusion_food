<?php
function insert_vnpay($tongtien, $ma_donhang, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_TransactionNo)
{
    $sql = "INSERT INTO tbl_vnpay (vnp_amount, ma_donhang, vnp_bankcode, vnp_banktrano, vnp_cardtype, vnp_oderinfo, vnp_paydate, vnp_tmncode, vnp_transactionno) VALUES ('$tongtien','$ma_donhang','$vnp_BankCode','$vnp_BankTranNo','$vnp_CardType','$vnp_OrderInfo','$vnp_PayDate','$vnp_TmnCode','$vnp_TransactionNo')";
    return pdo_execute($sql);
}



?>