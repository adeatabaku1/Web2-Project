<?php
// Funksioni për trajtimin e gabimeve

// Funksioni për trajtimin e përjashtimeve
function exception_handler($exception) {
    // Krijimi i një mesazhi të përjashtimit
    $errorMessage = "[Exception] " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();

    // Ruajtja e mesazhit të përjashtimit në një skedar log
    error_log($errorMessage . "\n", 3, "errors.log");

    // Shfaqja e mesazhit të gabimit për përdoruesin
    echo "<p>Një përjashtim ka ndodhur. Ju lutemi kontaktoni administratorin.</p>";
}

// Funksioni për trajtimin e gabimeve fatale
function shutdown_handler() {
    $error = error_get_last();
    if ($error !== NULL) {
        $errorMessage = "[Fatal Error] " . $error['message'] . " in " . $error['file'] . " on line " . $error['line'];

        // Ruajtja e mesazhit të gabimit fatal në një skedar log
        error_log($errorMessage . "\n", 3, "errors.log");

        // Shfaqja e mesazhit të gabimit për përdoruesin
        echo "<p>Një gabim fatal ka ndodhur. Ju lutemi kontaktoni administratorin.</p>";
    }
}

// Vendosja e funksionit për trajtimin e gabimeve si trajtues i gabimeve të paracaktuar
set_error_handler("error_handler");

// Vendosja e funksionit për trajtimin e përjashtimeve si trajtues i përjashtimeve të paracaktuar
set_exception_handler("exception_handler");

// Regjistrimi i funksionit për trajtimin e gabimeve fatale
register_shutdown_function("shutdown_handler");
?>