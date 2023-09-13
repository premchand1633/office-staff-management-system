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
                <h2>ALL ASSIGNED TASKS</h2>
            </div>
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Task Id</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $servername = "localhost";
                $username   = "root";
                $password   = "";
                $dbname     = "office";
                $conn       = mysqli_connect($servername,$username,$password,$dbname);
                $sno = 1;
                $query      = "select * from tasks";
                $query_run  = mysqli_query ($conn,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                  ?> 
                  <tr>
                    <td> <?php echo $sno; ?> </td>
                    <td> <?php echo $row['t_id']; ?></td>
                    <td> <?php echo $row['description']; ?></td>
                    <td> <?php echo $row['start_date']; ?></td>
                    <td> <?php echo $row['end_date']; ?></td>
                    <td> <?php echo $row['status']; ?></td>
                    <td><a href="edit_task.php?id=<?php echo $row['t_id']; ?>">Edit  </a> | <a href="delete_task.php?id=<?php echo $row['t_id']; ?>">Delete</a></td>
                  </tr>   
                  <?php
                  $sno = $sno + 1;
                }
            ?>
        </table>
    </body>
</html>

