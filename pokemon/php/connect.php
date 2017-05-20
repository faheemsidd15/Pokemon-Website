

<?php

// This file is the connection to the database
// database is Frs22
// the connection first is to localhost, the password for local is root
// The SIS server host is ..........sis-teach-01.sis.pitt.edu

$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to server");

mysql_select_db("frs22")or die("Couldn't connect to database");
?>