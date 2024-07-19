<?php

function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=fusion_food", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_execute_id($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// function pdo_execute_id($sql, ...$args) {
//     $conn = connect_pdo();
//     if (!$conn) {
//         return null;
//     }

//     $stmt = $conn->prepare($sql);
//     try {
//         $stmt->execute($args);
//         return $conn->lastInsertId();
//     } catch (PDOException $e) {
//         echo "Lỗi khi thực hiện truy vấn: " . $e->getMessage();
//         return null;
//     }
// }



// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
pdo_get_connection();