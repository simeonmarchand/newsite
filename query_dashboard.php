<?php // query_dashboard.php

  require_once 'login.php';
  $connection = new mysqli ($hn, $un, $pw, $db);
  if ($connection->connect_error) die('Could not connect to the DB');

  $query = 'SELECT * FROM contacts';
  $result = $connection->query($query);

  if (!$result) die('No query result!');

  echo '<html>
  <head><title>Contacts</title></head>
  <body>
  <h1>Contact Info</h1>';

  $rows = $result->num_rows;

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
    echo 'Title: '
      .htmlspecialchars($result->fetch_assoc()['job_title'])
      .'<br>';
      $result->data_seek($j);
    echo 'Company: '
      .htmlspecialchars($result->fetch_assoc()['company'])
      .'<br>';
      $result->data_seek($j);
    echo 'Industry: '
      .htmlspecialchars($result->fetch_assoc()['industry'])
      .'<br>';
      $result->data_seek($j);
  }

  $result->close();
  $connection->close();

  echo '</body></html>';
?>