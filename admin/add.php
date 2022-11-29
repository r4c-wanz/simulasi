<?php
session_start();
require 'functions.php';

require '../layout/coolform.html'
?>

<?php if ($_GET["as"] == "b") : ?>
<?php if(isset($_POST["submitAdd-produk"])){
        if(addProduk($_POST) > 0){
            echo "<script type='text/javascript'> alert('Data Produk berhasil ditambahkan'); window.location = 'data_produk.php'; </script>"; 
        } else {
            // echo "<script type='text/javascript'> alert('Data Produk gagal ditambahkan'); window.location = 'data_produk.php'; </script>"; 
        } }
?>
<div class="container">
    <h2>Tambah <span style="color: #0000ff">Data Produk</span></h2>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="product_name">Nama Produk</label>
            <input type="text" name="product_name" id="product_name" class="form-control">

            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>

            <label for="photo">Foto</label>
            <input type="file" name="photo" id="photo" class="form-control">

            <label for="stock">Stok</label>
            <input type="text" name="stock" id="stock" class="form-control">

            <button type="submit" name="submitAdd-produk">Tambah</button>
        </form>
        <button name="cancel" id="cancel" onClick="window.location = 'data_produk.php'">Cancel</button>
    </div>
</div>
<?php endif ?>
