
<html>
<body>
<form action="edit.php" method="post">
points add <input type="number" name="points"><br>
section# <input type="number" name="section"><br>
<input type="submit" name="submit" >
</form>
<a href="index.html"><button>go back</button></a>

</body>
</html>
<script>

<?php

$serverName = 'DESKTOP-8JKL1L1';
$uid = 'sa';
$pwd = 'hello123';
$databaseName = 'phpservertest';
    $section = $_POST['section'];
    $points = $_POST['points'];

    // Create connection
    $connectionInfo = ['UID' => $uid,
    'PWD' => $pwd,
    'Database' => $databaseName, ];

/* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect($serverName, $connectionInfo);
$tsql = "INSERT INTO math3 (dt, section, points)  
VALUES (current_timestamp, '$section', '$points')";

// Check connection
$stmt = sqlsrv_query($conn, $tsql);

if ($stmt) {
} else {
    die(print_r(sqlsrv_errors(), true));
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
$section = null;
$points = null;

?>  
