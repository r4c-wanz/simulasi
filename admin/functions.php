<?php
require '../connection.php';

function query($query){
    global $conn;

    $rows = [];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function addProduk($data){
    global $conn;

    $product_name = htmlspecialchars($data["product_name"]);
    $description = htmlspecialchars($data["description"]);
    $photo = $_FILES["photo"]["name"];
    $files = $_FILES["photo"]["tmp_name"];
    $stock = htmlspecialchars($data["stock"]);

    $query = "INSERT INTO product VALUES(NULL, '$product_name', '$description', '$photo', '$stock')";

    move_uploaded_file($files, "../foto/".$photo);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editProduk($data){
    global $conn;

    $id = $data["id"];
    $product_name = htmlspecialchars($data["product_name"]);
    $description = htmlspecialchars($data["description"]);
    $photo = $_FILES["photo"]["name"];
    $files = $_FILES["photo"]["tmp_name"];
    $stock = htmlspecialchars($data["stock"]);

    if(empty($photo)){
        $query = "UPDATE product SET
        product_name = '$product_name', description='$description', stock='$stock'
        WHERE id = '$id'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE product SET
        product_name = '$product_name', description = '$description', photo = '$photo', stock = '$stock'
        WHERE id = '$id'
        ";
        
        move_uploaded_file($files, "../foto/".$photo);

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function deleteProduk($id){
    global $conn;

    $query = "DELETE FROM product WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>