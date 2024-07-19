<?php
function insert_lienhe($ho_ten, $email, $sodienthoai, $noidung, $trangthai)
{
    $sql = "INSERT INTO tbl_lienhe (hoten_lienhe, email_lienhe, sdt_lienhe, noidung, trangthai) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $ho_ten, $email, $sodienthoai, $noidung, $trangthai);
}


function list_contact()
{
    $sql = "SELECT * FROM tbl_lienhe ORDER BY id DESC";
    $list = pdo_query($sql);
    return $list;
}


function update_contact($trangthai, $id)
{
    $sql = "UPDATE tbl_lienhe SET trangthai= ? WHERE id_lienhe = ?";
    pdo_execute($sql, $trangthai, $id);
}
