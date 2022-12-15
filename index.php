<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Time Table</title>
    <style>
      .image img
      {
        width: 200px;
        height: 200px;
      }
      .image
      {
        text-align: center;
      }
      .stid
      {
            font-size: 18px;
            padding-bottom: 0px;
            margin-top: 10px;
            margin-bottom: 36px;
            border-bottom: 1px solid #ccc;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            height: 45px;
            text-align: center;
      }
      .button
        {
            padding: 12px 24px 12px 24px;
            background-color: #0056ff;
            font-size: 18px;
            color: white;
            border: none;
            margin-bottom: 20px;
          
        }
        .regform
        {
            background-color: whitesmoke;
            text-align: center;
            width: 600px;
            margin: auto;
            border: 3px solid #ccc;
        }

    </style>
  </head>
  <body>
    <div class="image">
      <img src="https://storage.googleapis.com/ezap-prod/forms/768/vit-ap-logo.jpg">
    </div>
    
  <form action="index.php" method="post" class="regform">
    <input type="text" name="sid" placeholder="Reg num" class="stid"><br>
    <input type="submit" value="Submit" placeholder="Submit" class="button">
  </form>
  <br><br><br>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4" text-align="center">Today's Classes</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Room Number</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Starting Time</th>
            <th scope="col">Ending Time</th>
          </tr>
        </thead>
  <tbody>
  <?php
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $databasename = "Capstone";
  
  $conn = new mysqli($servername,$username, $password, $databasename);
  
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$Id=$_POST['sid'];
$day=date("l");
$sql = "Select * from timetable where day='$day' and id='$Id';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)) {
        echo "<tr><td>" . $row["rn"]. "</td><td>" . $row["sn"] . "</td><td>" . $row["st"] . "</td><td>" . $row["et"]. "</td></tr>";
    }
    echo "</table>";
}
?>
  </tbody>
</table>
</p>
    </div>
  </div>
  </body>
</html>