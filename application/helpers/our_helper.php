<?php

defined('BASEPATH') OR exit('No direct script access allowed');
function PriceCal($price, $vat, $dis){
    $p = $price - ($price * $dis) / 100;
    return ($p + ($p * $vat) / 100);
    
}
function Replace($data) {
    $data = str_replace("'", "", $data);
    $data = str_replace("!", "", $data);
    $data = str_replace("@", "", $data);
    $data = str_replace("#", "", $data);
    $data = str_replace("$", "", $data);
    $data = str_replace("%", "", $data);
    $data = str_replace("^", "", $data);
    $data = str_replace("&", "", $data);
    $data = str_replace("*", "", $data);
    $data = str_replace("(", "", $data);
    $data = str_replace(")", "", $data);
    $data = str_replace("+", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace(",", "", $data);
    $data = str_replace(":", "", $data);
    $data = str_replace(";", "", $data);
    $data = str_replace("|", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace("?", "", $data);
    $data = str_replace("  ", "_", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace(".", "-", $data);
    $data = strtolower(str_replace(" ", "_", $data));
    $data = strtolower(str_replace(" ", "_", $data));
    return str_replace("_", "-", $data);
}

function RandString($num) {
    $str = array("a", "b", "d", "e", "f", "g", "h", "j", "k", "m", "n",  "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "2", "3", "4", "5", "6", "7", "8", "9");
    $data = "";
    while ($num > 0) {
        $data .= $str[rand(0, count($str) - 1)];
        $num--;
    }
    return $data;
}

function WC_Count($data, $w, $c) {
    $data = strip_tags($data) . " ";
    $noc = $word = 0;
    $tword = $temp = "";

    for ($i = 0; $i < strlen($data); $i++) {
        if ($data[$i] == " ") {
            $word++;
            $tword .= $temp;
            $temp = "";
        }
        if ($word == $w || $noc == $c) {
            break;
        }
        $temp .= $data[$i];
        $noc++;
    }
    return $tword;
}
