<?php
$conn = mysqli_connect(
    "localhost",
    "sqli_lab",
    "sqli_lab",
    "sqli_lab"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>