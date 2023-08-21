<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <form action="<?php echo site_url('barangmasuk/addmasuk'); ?>" method="post">
   <p>Id Barang
         <input type="text" name="id_barang" placeholder="id barang" required>
      </p>
    <p>Nama Barang
         <input type="text" name="nama_barang" placeholder="Nama Barang" required>
      </p>
      <p>Tanggal Masuk
         <input type="text" name="tanggal_in" placeholder="Tanggal Masuk" required>
      </p>
      <p>Jumlah
         <input type="text" name="jumlah" placeholder="Jumlah" required>
      </p>
      <p>Satuan
         <input type="text" name="satuan" placeholder="satuan" required>
      </p>
      <button type="submit">Tambah</button>
   </form>
</body>
</html>