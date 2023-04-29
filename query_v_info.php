<?php // query_dashboard.php

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
ini_set("html_errors", "1");
ini_set("docref_root", "http://www.php.net/");
ini_set("error_prepend_string", "<div style='color:red; font-family:verdana; border:1px solid red; padding:5px;'>");
ini_set("error_append_string", "</div>");

  require_once 'login.php';
  $connection = new mysqli ($hn, $un, $pw, $db);
  if ($connection->connect_error) die('Could not connect to the DB');

  $query = "SELECT * FROM v_info";
  $result = $connection->query($query);

  if (!$result) die('No query result!');

  echo '<html>
  <head><title>Where Table</title></head>
  <body>
  <h1>Query v_info</h1>';

  // Execute the SQL query
$result = $connection->query($query);

// Check if there's an error executing the query
if (!$result) {
    echo 'Error executing query: ' . $mysqli->error;
    exit();
}

$rows = $result->num_rows;

// Loop through the query results and output the data
for ($j = 0 ; $j < $rows ; ++$j){
  $result->data_seek($j);
  echo 'First: '
    .htmlspecialchars($result->fetch_assoc()['contact_first'])
    .'<br>';
    $result->data_seek($j);
  echo 'Last: '
    .htmlspecialchars($result->fetch_assoc()['contact_last'])
    .'<br>';
    $result->data_seek($j);
  echo 'Email: '
    .htmlspecialchars($result->fetch_assoc()['email'])
    .'<br>';
    $result->data_seek($j);
}

$result->close();
$connection->close();

echo '</body></html>';
?>