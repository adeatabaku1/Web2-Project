<?php

require 'header.php';

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
    <style>
        body {
            line-height: 1.6;
            background-color: #fff;
            margin: 0;
            padding: 0;
            color: #333;
            text-align: center;
            font-size: 15px;
    
        }
        .containerr {
            max-width: 800px; 
            margin: auto; 
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            
        }
        .faq-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .question {
            font-weight: bold;
            cursor: pointer;
            color: #666666;
        }
        .answer {
            display: none;
            margin-top: 10px;
        }
        /* form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        } */
        label {
            display: block;
            margin-bottom: 10px;
        }
        textarea {
            width: 800px;
            height: 100px;
            resize: vertical;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
            margin-bottom:80px;
        }
        button:hover {
            background-color: #555;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>


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


    <?php include('footer.php'); ?>
</body>
</html>
