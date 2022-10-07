<!DOCTYPE html>
<html>
<body>

<?php
$serverName = '';
$uid = '';
$pwd = '';
$databaseName = '';

$connectionInfo = ['UID' => $uid,
                         'PWD' => $pwd,
                         'Database' => $databaseName, ];

/* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect($serverName, $connectionInfo);

$tsql = 'SELECT cast(dt as nvarchar(25)), section, points FROM math3';

/* Execute the query. */

$stmt = sqlsrv_query($conn, $tsql);

if ($stmt) {
} else {
    die(print_r(sqlsrv_errors(), true));
}

/* Iterate through the result set printing a row of data upon each iteration.*/

while ($row = sqlsrv_fetch_array($stmt)) {
    echo ' '.$row[0]."\n";
    echo ' '.$row[1]."\n";
    echo ' '.$row[2]."<br>\n";
}

/* Free statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>  

</body>
</html>
