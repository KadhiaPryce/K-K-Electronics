<!-- <?php
//connection parameters
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

} else {
    // echo "<span style='color:green;text-align:left;'>Connection Successful!</span> <br>";
}
?> -->

<?php
class DBController
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "user_db";
    private $conn;

    function __construct()
    {
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        return $conn;
    }

    function runQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function numRows($query)
    {
        $result = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>