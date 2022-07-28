<?php
namespace App\Traits;
trait GenerateColumns{

    public function generate($length)
    {
        $letters = array();
        $letter = 'A';
        while (count($letters) < $length) {
            $letters[] = $letter++;
        }
        return $letters;
    }
}
