<?php
// Fetching total_price from the orders table
if(isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($llogaritja_conn, $_POST['email']);

  // Prepare and execute SELECT statement to fetch total_price
  $stmt = $llogaritja_conn->prepare("SELECT SUM(total_price) as total_price FROM orders WHERE user_name = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  // Check if the query returned a result
  if ($row) {
      // Output the total_price
      $total_price = $row['total_price'];

      // Prepare and execute SELECT statement to fetch the total price from the orders table
      $stmt = $llogaritja_conn->prepare("SELECT SUM(price_total) as total_price FROM orders WHERE user_name = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      // Check if total price exists
      if ($row['total_price'] === NULL) {
          die("Unable to find the total price for the user.");
      }

      // Store the total price from the orders table in a variable
      $total_price_orders = $row['total_price'];

      // Display the total price in the transaction
      echo "<h2>Total Price from Orders Table: $total_price_orders</h2>";
  } else {
      echo "Unable to find the requested price.";
  }
  

  // Close statement
  $stmt->close();
}

// Displaying the transaction with the fetched total_price
if(isset($_POST['submit'])) {
  // Displaying account balance and transaction details in a table
  echo "<h2>Transaction Successful</h2>";
  echo "<table>";
  echo "<tr style = 'margin-left: 250px;'><th>Transaction Details</th><td></td></tr>";
  echo "<tr><th>Total Price</th><td>$total_price</td></tr>";
  echo "<button onclick='downloadHTML()' style = 'margin-top:40px;'>Download</button>";
  echo "</table>";
}

?>
<script>
  function downloadHTML() {
  const element = document.createElement('a');
  const mimeType = 'text/html';
  const fileName = 'Transaction';

  element.href = URL.createObjectURL(new Blob([document.documentElement.outerHTML], {type: mimeType}));
  element.download = fileName;

  document.body.appendChild(element);
  element.click();
  document.body.removeChild(element);
}
</script>
