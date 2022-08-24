<?php

namespace App\Libraries;
use App\ThirdParty\fpdf\fpdf;

class Pdf{
    function __construct() {
        include_once APPPATH . '/ThirdParty/fpdf/fpdf.php';
    }
}
?>