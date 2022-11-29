<?php 
session_start();
require 'functions.php';

require '../layout/coolform.html'
?>

<?php if ($_GET["as"] == "b") : ?>
<?php $id = $_GET["id"] ?>
<?php $data = query("SELECT * FROM product WHERE id = '$id'")[0] ?>
<?php if(isset($_POST["submitEdit-produk"])) {
        if(editProduk($_POST) > 0) {
            echo "<script type='text/javascript'> alert('Data Produk berhasil di edit'); window.location = 'data_produk.php'; </script>";
        } else {
            echo "<script type='text/javascript'> alert('Data Produk gagal di edit'); window.location = 'data_produk.php'; </script>";
        }
    }
?>
<div class="container">
    <h2>Edit <span style="color: #0000ff">Data Produk</span></h2>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data["id"] ?>">

            <label for="product_name">Nama Lengkap</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="<?= $data["product_name"] ?>">

            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"><?= $data["description"] ?></textarea>
            
            <label for="photo">Foto</label>
            <input type="file" name="photo" id="photo" class="form-control" value="<?= $data["photo"] ?>">

            <label for="stock">Stok</label>
            <input type="text" name="stock" id="stock" class="form-control" value="<?= $data["stock"] ?>">

            <button type="submit" name="submitEdit-produk">Save changes</button>
        </form>
        <button name="cancel" id="cancel" onClick="window.location = 'data_produk.php'">Cancel</button>
    </div>
</div>
<?php endif ?>
