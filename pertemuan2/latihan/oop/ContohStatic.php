<?php
class ContohStatic{

    // Cara penulisan untuk property
    // visibility + static + variabel
    public static $angka = 1;

    // Cara penulisan untuk method
    // visibility + static + function + nama function
    public static function halo(){
        // Akses  property static mmenggunakan 'self::'
        // return "Halo" . $this->>angka; // tidak bisa menggunakan $this karena $this untuk object
        return "Halo " . self::$angka;
    }

}
echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();