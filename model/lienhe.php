<?php
function insert_lienhe($ho_ten, $email, $sodienthoai, $noidung, $trangthai)
{
    $sql = "INSERT INTO tbl_lienhe(hoten_lienhe, email_lienhe, sdt_lienhe, noidung, trangthai) VALUES ('$ho_ten','$email','$sodienthoai','$noidung','$trangthai')";
    pdo_execute($sql);
}

function list_contact()
{
    $sql = "SELECT * FROM tbl_lienhe order by id_lienhe desc ";
    $list = pdo_query($sql);
    return $list;
}

function update_contact($trangthai, $id)
{
    $sql = "UPDATE tbl_lienhe SET trangthai= ? WHERE id_lienhe = ?";
    pdo_execute($sql, $trangthai, $id);
}
