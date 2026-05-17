<?php
// Controleer of het formulier wel via POST is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Veilig de invoergegevens ophalen
    $naam = strip_tags(trim($_POST['naam']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $bericht = htmlspecialchars(trim($_POST['bericht']));
    
    // Uw e-mailadres waar de mail naartoe moet
    $naar = "info@uwwebsite.nl"; 
    
    $onderwerp = "Nieuw bericht van " . $naam;
    
    // E-mail opmaken
    $email_inhoud = "Naam: $naam\n";
    $email_inhoud .= "E-mail: $email\n\n";
    $email_inhoud .= "Bericht:\n$bericht\n";
    
    // Headers instellen zodat u kunt antwoorden naar de afzender
    $headers = "From: $naar" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // De mail daadwerkelijk verzenden via de server
    if (mail($naar, $onderwerp, $email_inhoud, $headers)) {
        echo "<h1>Bedankt!</h1><p>Uw bericht is succesvol verzonden.</p>";
    } else {
        echo "<h1>Fout</h1><p>Er is helaas iets misgegaan op de server. Probeer het later opnieuw.</p>";
    }
} else {
    // Als iemand rechtstreeks naar verstuur.php surft, sturen we ze terug
    header("Location: contact.html");
    exit;
}
?>
