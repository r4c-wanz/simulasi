<?php 
session_start();
require 'functions.php';

$product = query("SELECT * FROM db_name");

require '../layout/index.html';
?>

<div class="sidebar">
    <a href="index.php">Dashboard</a>
    <a href="data_produk.php" class="current">Data Produk</a>
    <a href="">Logout</a>
</div>

<div class="main">
    <h3>Data Produk</h3>
    <a href="add.php?as=b" class="tambah">Tambah Produk</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($product as $data) :?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $data["product_name"] ?></td>
            <td><?= $data["description"] ?></td>
            <td><img src="../foto/<?= $data["photo"] ?>" alt="" width="50px"></td>
            <td><?= $data["stock"] ?></td>
            <td>
                <a href="edit.php?as=b&id=<?= $data["id"] ?>" class="edit">Edit</a>
                <a href="delete.php?as=b&id=<?= $data["id"] ?>" class="hapus" onClick="return confirm('Anda yakin ingin menghapus data?')">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>
    </table>
</div>
