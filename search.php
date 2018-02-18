<html>
<head>
<title> Search for an organization. </title>

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
      </ul>
  </div>
</nav>

<div class="col-md-5 p-lg-6 mx-auto my-5">
<?php
include 'conf.php';
//include 'open.php';
$orgtype	 = $_POST["orgtype"];

echo "<p>Search results for '".$orgtype."' organizations.</p>";

$mysqli = new mysqli("localhost", $dbuser, $dbpass, $dbname);

//$validpass = mysqli_query("SELECT * FROM Passwords WHERE CurPasswords = " '".$password."');
//$valid = mysqli_num_rows($validpass);a
$mysqli->multi_query("SELECT * FROM Organizations WHERE Org_Type = '".$orgtype."' ;");      // Execute the query with the input.
$res = $mysqli->store_result();
//echo $count($res[0]);


if ($res) {
echo "<div class=\"col-md-5 p-lg-6 mx-auto my-5\">";
echo "<table border=\"3px solid black\">";                              // The procedure executed successfully.
                echo "<tr><th> Organization Name </th><th> Street </th><th> City </th><th> State </th><th> Related_Major1 </th><th> Org_Type </th></tr> ";
                while ($row = $res->fetch_assoc()) {
                	echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Street'] . "</td><td>" . $row['City'] . "</td><td>" . $row['State'] . "</td><td>" . $row['Related_Major1'] ."</td><td>" . $row['Org_Type'] ."</td></tr>";// Print every row of the result.
                }
                echo "</table>";
                echo "</div>";
                $res->free();                                                                           // Clean-up.
			} 	else{
                printf("<br>Error: %s\n", $mysqli->error);                              // The procedure failed to execute.
            }
$mysqli->close();  // Clean-up.
?>

</div>
</body>
</html>

