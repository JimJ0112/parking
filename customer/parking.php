<?php
// Connect to the database and retrieve the data
$conn = mysqli_connect('host', 'username', 'password', 'database');
$result = mysqli_query($conn, 'SELECT * FROM parking_spots');

echo '<table>';
while ($row = mysqli_fetch_array($result)) {
  echo '<td>';
  // Use the status column to set the class of the cell
  echo '<div class="' . $row['status'] . '">';
  echo $row['spot_number'];
  echo '</div>';
  echo '</td>';
}
echo '</table>';

mysqli_close($conn);
?>

    <style>
        .available {
  background-color: green;
}
.occupied {
  background-color: red;
}

    </style>


