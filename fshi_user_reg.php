<?php
if (isset($_POST['id_user_reg'])) {
    // Validate and sanitize id_user_reg
    $id_user_reg = filter_input(INPUT_POST, 'id_user_reg', FILTER_VALIDATE_INT);

    if ($id_user_reg === false) {
        echo "ID e përdoruesit është e pavlefshme.";
        exit;
    }

    // Include database connection file
    include "book-db.php";

    // Prepare the DELETE statement
    $sql = "DELETE FROM user_reg WHERE id_user_reg = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the id_user_reg parameter
        mysqli_stmt_bind_param($stmt, "i", $id_user_reg);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        // Check if the deletion was successful
        if ($result) {
            echo "Rreshti u fshi me sukses.";
        } else {
            echo "Ndodhi një gabim gjatë fshirjes së rreshtit: " . htmlspecialchars(mysqli_error($conn));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Ndodhi një gabim gjatë përgatitjes së query: " . htmlspecialchars(mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "ID e përdoruesit nuk është dhënë.";
}
?>
