<?php

require_once 'Produk.php';
require_once 'Komik.php';

class Game extends Produk {
    // properti khusus milik game
    public $waktuMain;
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {

        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->waktuMain = $waktuMain;
    }

    // INI METHOD YANG KITA OVERRIDE
    // method ini "menimpa" method getInfoProduk() milik parent
    public function getInfoProduk(){
        $infoParent = parent::getInfoProduk();
        return "GAME : " . $infoParent . " ~ {$this->waktuMain} Jam.";
    }

}



// mmebuat object dari child class game bukan dari parent classnya
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();