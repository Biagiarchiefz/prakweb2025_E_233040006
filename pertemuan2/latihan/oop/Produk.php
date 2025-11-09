<?php

class Produk {
    private $judul;
    private $penulis;
    private $penerbit;
    private $harga;

    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }



    // membuat method setter untuk melakukan perubahan pada property private
    public function setJudul($judul) {
        $this->judul = $judul;
    }

    // Kita sudah menggunakan Getter sebelumnya
    // getJudul adalah Getter
    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getLabel() {
        return "$this->penulis, this->penerbit";
    }


// METHOD YANG AKAN KITA OVERRIDE
// ini adalah method "getInfoProduk" versi PARENT ( umum )
    public function getInfoProduk() {
// contoh penggunaan {$this->judul} untuk mengakses property dalam string
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}