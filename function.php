<?php
session_start();

include 'dbconnect.php';

//Menambah Stok Barang Baru
if(isset($_POST['submit'])){
    $kodebarang1 = addslashes($_POST['kodebarang1']);
    $kodebarang2 = addslashes($_POST['kodebarang2']);
    $kodebarang3 = addslashes($_POST['kodebarang3']);
    $kodebarang4 = $kodebarang1.'/'.$kodebarang2.'/'.$kodebarang3;
    $namabarang = addslashes($_POST['jenisbarang']);
    $stok  = addslashes($_POST['stok']);

    if ( $kodebarang1 == $kuncikodebarang1&&$kodebarang2 == $kuncikodebarang2){
    echo "Kode Barang Sudah Digunakan";
    }else{
    $addtotable = mysqli_query($conn,"insert into stock (kodebarang1, kodebarang2, kodebarang3, kodebarang4, jenisbarang, stok) 
    values('$kodebarang1', '$kodebarang2', '$kodebarang3', '$kodebarang4', '$namabarang', '$stok')");
        if($addtotable){
            header('location: index.php');
        } else{
            echo 'Failed';
            header('location: index.php');
        }
        }
    }

//Resgistrasi Kode Barang Baru
if(isset($_POST['submitss'])){
    $kodebarang = addslashes($_POST['kode']);
    $namabarang = addslashes($_POST['nama']);

    $addtotable = mysqli_query($conn,"insert into kode_barang (idkode, nama_barang) 
    values ('$kodebarang', '$namabarang')");
    if($addtotable){
        header('location: kodebarang.php');
    } else{
        echo 'Failed';
        header('location: Kodebarang.php');
    }
}

//update kode barang
if(isset($_POST['updatekode'])){
    $idkode = $_POST['idkode'];
    $kodebarang = $_POST['kode'];
    $namabarang = $_POST['nama'];

    $update = mysqli_query($conn, "update kode_barang set idkode='$kodebarang' , nama_barang='$namabarang' where iddoang='$idkode'");
    if($update){
        header('location: kodebarang.php');
    } else{
        echo 'Failed';
        header('location: kodebarang.php');
    }
    }

//delete kode barang
if(isset($_POST['hapuskode'])){
    $idkode = $_POST['idkode'];

    $hapus = mysqli_query($conn, "delete from kode_barang where iddoang='$idkode'");
    if($hapus){
        header('location: kodebarang.php');
    } else{
        echo 'Failed';
        header('location: kodebarang.php');
    }
    }

//Resgistrasi Kode Jenis Barang Baru
if(isset($_POST['submits'])){
    $kodebarang = addslashes($_POST['kode']);
    $jenisbarang = addslashes($_POST['jenis']);

    $addtotable = mysqli_query($conn,"insert into kode_jenis (idjenis, nama_jenis) 
    values ('$kodebarang', '$jenisbarang')");
    if($addtotable){
        header('location: kodejenis.php');
    } else{
        echo 'Failed';
        header('location: Kodejenis.php');
    }
}

//update kode jenis barang
if(isset($_POST['updatejenis'])){
    $idkodes = $_POST['idkode'];
    $kodebarang = $_POST['kode'];
    $jenisbarang = $_POST['jenis'];

    $udpate = mysqli_query($conn, "update kode_jenis set idjenis='$kodebarang' , nama_jenis='$jenisbarang' where idaj='$idkodes'");
    if($udpate){
        header('location: kodejenis.php');
    } else{
        echo 'Failed';
        header('location: kodejenis.php');
    }
    }

//delete kode jenis barang
if(isset($_POST['hapusjenis'])){
    $idkode = $_POST['idkode'];

    $hapus = mysqli_query($conn, "delete from kode_jenis where idaj='$idkode'");
    if($hapus){
        header('location: kodejenis.php');
    } else{
        echo 'Failed';
        header('location: kodejenis.php');
    }
    }

//Menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $kodenya = addslashes($_POST['kodenya']);
    $namabarangnya = addslashes($_POST['jenis']);
    $qty =$_POST['qty'];
    $gambar = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, 'gambar/'. $gambar);
    $keterangan = $_POST['keterangan'];
    $keadaan = $_POST['keadaan'];

    $cekstoksekarang = mysqli_query($conn, "select * from stock where kodebarang4='$kodenya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stocksekarang = $ambildatanya['stok'];
    $tambahkanstocksekarangdenganqty = $stocksekarang + $qty;

    $ambildataskrg = $ambildatanya['kodebarang3'];
    $tambahkanstocksekarangdenganqty1 = $ambildataskrg + $qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, namabarangs, stock, gambar, keterangan , keadaan) 
    values ('$kodenya', '$namabarangnya', '$qty', '$gambar', '$keterangan', '$keadaan')");
    $updatestokmasuk = mysqli_query($conn, "update stock set stok ='$tambahkanstocksekarangdenganqty' where kodebarang4='$kodenya'");
    $updatestokmasuk1 = mysqli_query($conn, "update stock set kodebarang3 ='$tambahkanstocksekarangdenganqty1' where kodebarang4='$kodenya'");
    if($addtomasuk&&$updatestokmasuk&&$updatestokmasuk1){
        header('location: masuk.php');
    } else{
        echo 'Failed';
        header('location: masuk.php');
    }
}

//Barang Rusak
if(isset($_POST['barangkeluar'])){
    $kodenya = addslashes($_POST['kodenya']);
    $namabaranglo = addslashes($_POST['namabaranglo']);
    $qty =$_POST['qty'];
    $gambar = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, 'gambar/'. $gambar);
    $keadaan = $_POST['keadaanlo'];
    $keterangan = $_POST['keterangan'];

    $cekstoksekarang = mysqli_query($conn, "select * from stock where kodebarang4='$kodenya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stocksekarang = $ambildatanya['stok'];

    if($qty>$stocksekarang){
        header('location:rusak.php');
    }else {
        $tambahkanstocksekarangdenganqty = $stocksekarang - $qty;
        $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, namabaranglo, qty, gambar, keadaanlo, keterangan) 
        values ('$kodenya',' $namabaranglo', '$qty', '$gambar', '$keadaan', '$keterangan')");
        $updatestokmasuk = mysqli_query($conn, "update stock set stok ='$tambahkanstocksekarangdenganqty' where kodebarang4='$kodenya'");
    }
    
    if($addtokeluar&&$updatestokmasuk){
        header('location: rusak.php');
    } else{
        echo 'Failed';
        header('location: rusak.php');
    }
}

//delete stok barang
if(isset($_POST['hapusbarang'])){
    $idkb = $_POST['idkb'];

    $hapus = mysqli_query($conn, "delete from stock where idstock='$idkb'");
    if($hapus){
        header('location: index.php');
    } else{
        echo 'Failed';
        header('location: index.php');
    }
    }

//update admin
if(isset($_POST['updateadmin'])){
    $idu = $_POST['idu'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['Level'];

    $udpate = mysqli_query($conn, "update login set nama='$nama' , Email='$email', Password='$password', level='$level' where iduser='$idu'");
    if($udpate){
        header('location: admin.php');
    } else{
        echo 'Failed';
        header('location: admin.php');
    }
    }

//delete admin
if(isset($_POST['hapusadmin'])){
    $idu = $_POST['idu'];

    $hapus = mysqli_query($conn, "delete from login where iduser='$idu'");
    if($hapus){
        header('location: admin.php');
    } else{
        echo 'Failed';
        header('location: admin.php');
    }
    }

//update barang masuk
if(isset($_POST['updatemasuk'])){
    $idm = $_POST['idm'];
    $idkb = $_POST['idkb'];
    $kodebarang = $_POST['kodenya'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['qty'];
    $keterangan = $_POST['keterangan'];
    
    $lihatstok = mysqli_query($conn, "select * from stock where idstock='$idkb'");
    $stocknya = mysqli_fetch_array($lihatstok);
    $stoksekarang = $stocknya['stok'];
    $stockbarang3 = $stocknya['kodebarang3'];

    $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['stock'];

    $updatequerynya = mysqli_query($conn, "update stock set kodebarang3='$stok' where idstock='$idkb'");

    if($stok>$qtyskrg){
        $selisih = $stok - $qtyskrg;
        $kurangin = $stoksekarang + $selisih;
        $kuranginstoknya = mysqli_query($conn, "update stock set stok='$kurangin' where idstock='$idkb'");
        $updatenya = mysqli_query($conn, "update masuk set stock='$stok', keterangan='$keterangan' where idmasuk='$idm'");
            if($kuranginstoknya&&$updatenya){
                header('location: masuk.php');
            } else{
                echo 'Failed';
                header('location: masuk.php');
            }
            }else{
                $selisih = $qtyskrg - $stok;
                $kurangin = $stoksekarang - $selisih;
                $kuranginstoknya = mysqli_query($conn, "update stock set stok='$kurangin' where idstock='$idkb'");
                $updatenya = mysqli_query($conn, "update masuk set stock='$stok', keterangan='$keterangan' where idmasuk='$idm'");
                    if($kuranginstoknya&&$updatenya){
                        header('location: masuk.php');
                    } else{
                        echo 'Failed';
                        header('location: masuk.php');
                    } 
            }
    }

//Hapus Barang Masuk
if(isset($_POST['hapusmasuk'])){
    $idm = $_POST['idm'];
    $idkb = $_POST['idkb'];
    $qty = $_POST['kty'];

    $getdatastok = mysqli_query($conn, "select * from stock where idstock='$idkb'");
    $data = mysqli_fetch_array($getdatastok);
    $stok = $data['stok'];
    $kodebarang3 = $data['kodebarang3'];

    $selisih = $stok - $qty;
    if($qty>$stok){
        header('location:masuk.php');
    }else {
        $selisihkode = $stok - $qty;
    }

    $updatestockbaru = mysqli_query($conn, "update stock set stok='$selisih' where idstock='$idkb'");
    $updatestockbaru1 = mysqli_query($conn, "update stock set kodebarang3='$selisihkode' where idstock='$idkb'");
    $deletestocknya = mysqli_query($conn, "delete from masuk where idmasuk ='$idm'");
    if($updatestockbaru&&$deletestocknya&&$updatestockbaru1){
        header('location: masuk.php');
    } else{
        header('location: masuk.php');
    }
    }

//Update Barang Rusak
if(isset($_POST['updaterusak'])){
    $idk = $_POST['idk'];
    $idkb = $_POST['idkb'];
    $kodebarang = $_POST['kodenya'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['qty'];
    $keterangan = $_POST['keterangan'];
        
    $lihatstok = mysqli_query($conn, "select * from stock where idstock='$idkb'");
    $stocknya = mysqli_fetch_array($lihatstok);
    $stoksekarang = $stocknya['stok'];
    
    $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];
    
    if($stok>$qtyskrg){
        $selisih = $stok - $qtyskrg;
        $kurangin = $stoksekarang - $selisih;
        if ( $kurangin<0 ){
            echo "<script>
            window.location.href = 'rusak.php';
            alert('Jumlah barang rusak melebihi stock');
        </script>";
        }else{
        $kuranginstoknya = mysqli_query($conn, "update stock set stok='$kurangin' where idstock='$idkb'");
        $updatenya = mysqli_query($conn, "update keluar set qty='$stok', keterangan='$keterangan' where idkeluar='$idk'");
            if($kuranginstoknya&&$updatenya){
                header('location: rusak.php');
            } else{
                echo 'Failed';
                header('location: rusak.php');
            }}
            }else{
                $selisih = $qtyskrg - $stok;
                $kurangin = $stoksekarang + $selisih;
                $kuranginstoknya = mysqli_query($conn, "update stock set stok='$kurangin' where idstock='$idkb'");
                $updatenya = mysqli_query($conn, "update keluar set qty='$stok', keterangan='$keterangan' where idkeluar='$idk'");
                    if($kuranginstoknya&&$updatenya){
                        header('location: rusak.php');
                    } else{
                        echo 'Failed';
                        header('location: rusak.php');
                    } 
            }
        }

//Hapus Barang Rusak
if(isset($_POST['hapusrusak'])){
    $idk = $_POST['idk'];
    $idkb = $_POST['idkb'];
    $qty = $_POST['kty'];

    $getdatastok = mysqli_query($conn, "select * from stock where idstock='$idkb'");
    $data = mysqli_fetch_array($getdatastok);
    $stok = $data['stok'];

    $selisih = $stok + $qty ;
    
    $updatestockbaru = mysqli_query($conn, "update stock set stok='$selisih' where idstock='$idkb'");
    $deletestocknya = mysqli_query($conn, "delete from keluar where idkeluar ='$idk'");
    if($updatestockbaru&&$deletestocknya){
        header('location: rusak.php');
    } else{
        header('location: rusak.php');
    }
    }
?>