<?php

//gjeneron madhesine e file-it se na vyn qe mu siguru qe krejt file-i osht hap suksesshem
function fsize($filename) {
    return filesize($filename);
}

//ku ka me marr file-in qe ka me qel
$faqFile = 'faq.json';

//prej json kthehet ne php array me ane te metodes json_decode()
$faq = array();
if (file_exists($faqFile)) {
//r eshte per read-mode
    $file = fopen($faqFile, 'r');
//e lexon file-in specifik me madhesin e gjenerume ma heret 
    $jsonData = fread($file, fsize($faqFile));
    
//file-i json konvertohet ne php array
    $faq = json_decode($jsonData, true);
    
//kur perfundon hapja e file-it e mbyllim tash
    fclose($file);
}

//nese perdorusi e ka kliku submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//pytja qe e shkrun konvertohet ne html
    $newQuestion = htmlspecialchars($_POST["question"]);

//e shton ne array te pytjeve
    $faq[$newQuestion] = "This question will be answered soon.";

//krijon nje file (nese nuk ekziston) 
    $file = fopen($faqFile, 'w');
//shkrun ne file duke e konvertu ne json 
    fwrite($file, json_encode($faq));
//e mbyll kur e lexon krejt
    fclose($file);

//shfaq mesazhin nfund
    $successMessage = 'Your question has been submitted successfully! It will be answered soon.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website - FAQ Page</title>

</head>
<body>
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <?php
        
        arsort($faq);

       
        foreach ($faq as $question => $answer) {
            echo '<div class="faq-item">';
            echo '<div class="question" onclick="toggleAnswer(this)">' . htmlspecialchars($question) . '</div>';
            echo '<div class="answer">' . htmlspecialchars($answer) . '</div>';
            echo '</div>';
        }
        ?>
        <h2>Submit a Question</h2>
       
        <form method="post">
            <label for="question">Your Question:</label>
            <textarea id="question" name="question" required></textarea>
            <button type="submit">Submit</button>
        </form>
        <?php
        
        if (isset($successMessage)) {
            echo '<div class="success-message">' . $successMessage . '</div>';
        }
        ?>
    </div>

    <script>
        
        function toggleAnswer(question) {
            var answer = question.nextElementSibling;
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
        
        document.querySelectorAll('.answer').forEach(answer => answer.style.display = 'none');

    </script>

</body>
</html>
