<?php
if (isset($_POST['id_booking'])) {
    $id_booking = filter_input(INPUT_POST, 'id_booking', FILTER_VALIDATE_INT);

    if ($id_booking === false) {
        echo "ID e booking është e pavlefshme.";
        exit;
    }

    include "book-db.php";

    $sql = "DELETE FROM booking WHERE id_booking = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_booking);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Rreshti u fshi me sukses.";
        } else {
            echo "Ndodhi një gabim gjatë fshirjes së rreshtit: " . htmlspecialchars(mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Ndodhi një gabim gjatë përgatitjes së query: " . htmlspecialchars(mysqli_error($conn));
    }

    mysqli_close($conn);
} else {
    echo "ID e booking nuk është dhënë.";
}
?>
