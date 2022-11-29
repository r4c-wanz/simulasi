<?php require 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php if ($_GET["as"] == "b") : ?>
    <?php $id = $_GET["id"] ?>
    <?php if (deleteProduk($id) > 0) {
            echo "<script type='text/javascript'> alert('Data Produk berhasil dihapus'); window.location = 'data_produk.php'; </script>";
        } else{
            echo "<script type='text/javascript'> alert('Data Produk gagal dihapus'); window.location = 'data_produk.php'; </script>";
        }
    ?>
    <?php endif ?>
</body>
</html>
