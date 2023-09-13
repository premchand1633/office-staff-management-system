<?php include 'dashboard.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Task</title>
        <style>
.main-container {
  width: 90%;
  margin: 0 auto;
}

.main-title {
  text-align: center;
  margin-bottom: 20px;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #080808;
}

th {
  background-color: #030303;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #a72c2c;
}

tr:hover {
  background-color: black;
}

.action-button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}

        </style>   
    </head>
    <body>
        <main class="main-container" >
            <div class="main-title">
                <h2>ALL EMPLOYEES</h2>
            </div>
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Employee Id</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                
                <th>Gender</th>
                <th>Action</th>
            </tr>
            <?php
                $servername = "localhost";
                $username   = "root";
                $password   = "";
                $dbname     = "office";
                $conn       = mysqli_connect($servername,$username,$password,$dbname);
                $sno = 1;
                $query      = "select * from register";
                $query_run  = mysqli_query ($conn,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                  ?> 
                  <tr>
                    <td> <?php echo $sno; ?> </td>
                    <td> <?php echo $row['e_id']; ?></td>
                    <td> <?php echo $row['fname']; ?></td>
                    <td> <?php echo $row['uname']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['phno']; ?></td>
                    
                    <td> <?php echo $row['gender']; ?></td>
                    <td><a href="edit_employee.php?id=<?php echo $row['e_id']; ?>">Edit  </a> | <a href="delete_employee.php?id=<?php echo $row['e_id']; ?>">Delete</a></td>
                  </tr>   
                  <?php
                  $sno = $sno + 1;
                }
            ?>
        </table>
    </body>
</html>

