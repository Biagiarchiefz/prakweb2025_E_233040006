<?php
class Komik extends Produk {
    // property khusus komik, sifat yang ada di anak doang
    public $jumlahHalaman;

    // membuat constructor untuk child class
    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman) {

        // parent:: digunakan untuk memanggil constructor dari parent class ( Produk )
        // agar properti yang ada di parent class tetap disini ( judul, penulis, penerbit, harga )
        parent::__construct($judul, $penulis, $penerbit, $harga);

        // set properti khusus komik
        $this->jumlahHalaman = $jumlahHalaman;
    }

    // Method ini 'menimpa' method getInfoProduk() milik parent
    public function getInfoProduk() {

        // 1. kita tetap panggil method ASLI milik parent ( Produk )
        // menggunakan 'parent::'
        $infoParent = parent::getInfoProduk();

        // 2. Kita tambahkan info spesifik milik komik
        return "KOMIK : " . $infoParent . " - {$this->jumlahHalaman} Halaman.";
    }
}