
<?php

/* function connectServer()
 * function createDatabase($databaseName) 
 * function selectDatabase($databaseName)
 * 
 */

// Use mysql
require_once dirname(__FILE__).'/globalVariables.php';

function connectServer() {

    $connection = mysql_connect($GLOBALS['server_address'],
            $GLOBALS['server_userName'], $GLOBALS['server_password']);
    // Check connection
    if ($connection) {
        //echo "Connect Server Successfully!<br>";
        return $connection;
    } else {
        die("Failed to connect to MySQL: " . mysql_error());
        return $connection;
    }
}

function createDatabase($databaseName) {
    $con = connectServer();
    $sql = "CREATE DATABASE $databaseName";
    if (mysql_query($sql, $con)) {
        echo "Database $databaseName Created Successfully!<br>";
    } else {
        echo "Error creating database: " . mysql_error($con);
    }
}

function dropDatabase($databaseName) {
    $con = connectServer();
    $sql = "DROP DATABASE $databaseName";
    if (mysql_query($sql, $con)) {
        echo "Database $databaseName Droped Successfully!<br>";
    } else {
        echo "Error dropping database: " . mysql_error($con);
    }
}

function selectDatabase($databaseName) {

    $connection = mysql_connect($GLOBALS['server_address'],
            $GLOBALS['server_userName'], $GLOBALS['server_password']);
    // Check connection
    if ($connection) {
//        echo "Connect Server Successfully!<br>";
        // Select Database
        $con_db = mysql_select_db($databaseName, $connection);
        if ($con_db) {
//            echo "Select Database Successfully!<br>";
            mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
            mysql_query("SET CHARACTER_SET_RESULTS='utf8'");
            mysql_query("SET CHARACTER_SET_CONNECTION='utf8'");
            return $connection;
        } else {
            die("You Failed To Select Database: " . mysql_error());
        }
    } else {
        die("Failed to connect to MySQL: " . mysql_error());
    }
}

//connectServer();
//createDatabase();
//dropDatabase();
?>
