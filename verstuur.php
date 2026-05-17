<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    
    $naar = "jasper.spittaels@gmail.com";
    $onderwerp = "Nieuw bericht van " . $naam;
    $headers = "From: " . $email;
}
?>
