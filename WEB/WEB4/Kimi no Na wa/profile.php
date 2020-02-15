<?php
  session_start();
  if(!isset($_SESSION['NAME'])){
    header("Location:../index.php?error=ldberror");
    exit();	
  }
  require 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pragyan CTF</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body class="profile">
  <div class="navbar">
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="includes/logout.php">Logout</a></li> 
  </ul>
  </div>
<br>
<h2>Welcome Back!</h2>
<table>
<?php
 $name= $_SESSION['NAME'];
 if(empty($name))
 {
   header("Location:../index.php?error=lempty");
   exit();
 }
 
 $sql="SELECT reciever FROM kimimsg WHERE username='".$name."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  $i=0;
  echo "<h3>Your draft messages</h3>";
  while($row = $result->fetch_assoc()) {
    if($i==0){
      echo "<tr>";
      foreach($row as $key => $value){
        echo "<th><h4>". $key."</h4></th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach($row as $key => $value){
      echo "<td>". $value ."</td>";
    }
    $i+=1;
    echo "</tr>";
  }
} 
else {
  echo "<tr><td>No messages for you</td></tr>";
}
?>
</table>
<div class="footer">Pragyan CTF 2020!</div>
</body>
</html>
	