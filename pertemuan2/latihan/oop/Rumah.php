<?php
class Rumah {

    // property
    // kan awalnya kita nmenetapkan nilai default di propertynya,  agar kita bebas menetapkan nilainya kita menggunakan constructor
    // untuk menetapkan nilai awal properti saat object dibuat
    public $warna ;
    public $alamat ;

    // CONTRUCTOR  akan otomatis dijalankan saat object dibuat, setiap kali new Rumah() dipanggil
    // this artinya object ini
    // set properti warna MILIK OBJECT INI DENGAN NILAI dari nilai parameter contructor
    public function __construct($warnaAwal, $alamatAwal) {
        $this->warna = $warnaAwal;
        $this->alamat = $alamatAwal;
    }

    public function kunciPintu() {
        return "Pintu $this->alamat sudah dikunci";
    }

    public function gantiWarna($warnaBaru) {

        // $this->warna artinya mengakses property warna milik object ini sendiri
        $this->warna = $warnaBaru;
        return "warna rumah berhasil diubah menjadi " . $this->warna;
    }

}

// kita membuat fungsi terpisah diluar kelas rumah
// fungsi ini hanya menerima parameter bertipe objct dari class Rumah
function pasangListrik( Rumah $dataRumah) {
    return 'Listrik sedang dipasang dirumah ' . $dataRumah->warna . 'yang di alamat ' . $dataRumah->alamat;
}


// membuat object dari kelas rumah dan simpan ke variabel rumah $rumahSaya
$rumahSaya = new Rumah("Biru", "Jl. Merdeka No. 10");
$rumahTetangga = new Rumah("hijau", "Jl. Sudirman No. 20");

echo pasangListrik($rumahSaya);
























//// Properti sudah terisi otomatis
//
//echo "Warna awal rumah saya: " . $rumahSaya->warna;  // biru
//echo "<br>";
//echo "jumlah kamar Rumah Saya: " . $rumahSaya->jumlahKamar;  // 3
//echo "<br>";
//echo "alamat Rumah Saya tetangga: " . $rumahTetangga->alamat;  // Jl. Sudirman No. 20
//echo "<hr>";
//echo $rumahTetangga->kunciPintu();  // output "Pintu Jl. Sudirman No. 20 sudah dikunci"



//// menjalankan method ( melakukan aksi )
//$rumahSaya->gantiWarna("pink");
//
//// datanya warna sekarang sudah berubah
//echo "Warna awal rumah saya: " . $rumahSaya->warna;  // pink
//echo "<br>";
//
//// menjalankan method kunciPintu()
// echo $rumahSaya->kunciPintu();
//
// echo "<hr>";
//
//// membuat object dari kelas rumah dan simpan ke variabel rumah $rumahTangga
//echo "warna rumah tanggan : " . $rumahTangga->warna; // putih
