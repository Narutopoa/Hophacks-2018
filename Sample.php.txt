<html>
<head>
<title> Exchanges Prices </title>
</head>
<body style="background-color:#d3d3d3">
<p>
        Below are the dates that the different exchanges have met the tpm statistic requested.
</p>

<p>
        <a href="Exchanges_Price.html">Exchanges Price</a>
</p>

<?php
include 'conf.php';
include 'open.php';
$tpm = $_POST["tpm"];
$price = $_POST["price"];
//$validpass = mysqli_query("SELECT * FROM Passwords WHERE CurPasswords = " '".$password."');
//$valid = mysqli_num_rows($validpass);
$mysqli->multi_query("CALL ExchangePrices('".$tpm."','".$price."');");      // Execute the query with the input.
$res = $mysqli->store_result();
//echo $count($res[0]);


if ($res) {
echo "<table border=\"1px solid black\">";                              // The procedure executed successfully.
                echo "<tr><th> Date </th> <th> Exchange </th></tr> ";
                while ($row = $res->fetch_assoc()) {
                        echo "<tr><td>" . $row['Date'] . "</td><td>" . $row['Result'] . "</td></tr>";// Print every row of the result.
                }
                echo "</table>";
                $res->free();                                                                           // Clean-up.
            } else if(true){
echo "<table border=\"1px solid black\">";                              // The procedure executed successfully.
                echo "<tr><th> Result </th></tr>";
                while ($row = $res->fetch_assoc()) {
                        echo "<tr><td>" . $row['Result'] . "</td></tr>";// Print every row of the result.

                }
                echo "</table>";
                $res->free();
            } else{
                printf("<br>Error: %s\n", $mysqli->error);                              // The procedure failed to execute.
            }
$mysqli->close();  // Clean-up.


?>

<p>
        <a href="Exchanges_Price.html">Exchanges Price</a>
</p>
</body>
</html>

