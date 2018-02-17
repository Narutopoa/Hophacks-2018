<html>
<head>
<title> Insert an organization. </title>
</head>
<body style="background-color:#d3d3d3">
<p>
        Insert an organization.
</p>

<p>
        <a href="Data Entry.html">Data Entry</a>
</p>

<?php
include 'conf.php';
include 'open.php';
$nm 	 = $_POST["nm"];
$strt 	 = $_POST["strt"];
$city	 = $_POST["city"];
$state 	 = $_POST["state"];
$relmaj1 = $_POST["relmaj1"];
$orgtype = $_POST["orgtype"];

//$validpass = mysqli_query("SELECT * FROM Passwords WHERE CurPasswords = " '".$password."');
//$valid = mysqli_num_rows($validpass);
$mysqli->multi_query("CALL InsertOrg('".$nm."','".$strt."','".$city."','".$state."','".$relmaj1."','".$orgtype."');");      // Execute the query with the input.
$res = $mysqli->store_result();
//echo $count($res[0]);


if ($res) {
echo "<table border=\"1px solid black\">";                              // The procedure executed successfully.
                echo "<tr><th> Result </th></tr> ";
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

