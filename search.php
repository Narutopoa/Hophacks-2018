<html>
<head>
<title> Search for an organization. </title>
</head>
<body style="background-color:#d3d3d3">
<p>
        Search for an organization.
</p>

<p>
        <a href="Landing Page.html">Landing Page</a>
</p>

<?php
include 'conf.php';
include 'open.php';
$orgtype	 = $_POST["orgtype"];


//$validpass = mysqli_query("SELECT * FROM Passwords WHERE CurPasswords = " '".$password."');
//$valid = mysqli_num_rows($validpass);
$mysqli->multi_query("CALL InsertOrg('".$orgtype."');");      // Execute the query with the input.
$res = $mysqli->store_result();
//echo $count($res[0]);


if ($res) {
echo "<table border=\"1px solid black\">";                              // The procedure executed successfully.
                echo "<tr><th> Organization </th></tr> ";
                while ($row = $res->fetch_assoc()) {
                        echo "<tr><td>" . $row['Result'] . "</td></tr>";// Print every row of the result.
                }
                echo "</table>";
                $res->free();                                                                           // Clean-up.
			} 	else{
                printf("<br>Error: %s\n", $mysqli->error);                              // The procedure failed to execute.
            }
$mysqli->close();  // Clean-up.
?>

<p>
        <a href="Exchanges_Price.html">Exchanges Price</a>
</p>
</body>
</html>

