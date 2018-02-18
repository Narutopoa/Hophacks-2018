<html>
<head>
<title> Insert an organization. </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Landing Page.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Data Entry.html">Data Entry<span class="sr-only">(current)</span></a>
      </li>
      </ul>
  </div>
</nav>

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
//$mysqli->multi_query("CALL InsertOrg('".$nm."','".$strt."','".$city."','".$state."','".$relmaj1."','".$orgtype."');");      // Execute the query with the input.
$mysqli->multi_query("SELECT * FROM Organizations;");
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

