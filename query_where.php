<?php // query_dashboard.php

  require_once 'login.php';
  $connection = new mysqli ($hn, $un, $pw, $db);
  if ($connection->connect_error) die('Could not connect to the DB');

  $query = "SELECT contacts.contact_first, contacts.contact_last, contacts_audits.contacts_id, contacts_audits.change_date
            FROM contacts
            JOIN contacts_audit ON contacts.contact_id = contacts_audits.contact_id
            WHERE contacts.contact_last = 'Allen'
            AND contacts_audits.change_date >= '2023-04-23'";
  $result = $connection->query($query);

  if (!$result) die('No query result!');

  echo '<html>
  <head><title>Contacts</title></head>
  <body>
  <h1>Contact Info</h1>';

  // Execute the SQL query
$result = $mysqli->query($query);

// Check if there's an error executing the query
if (!$result) {
    echo 'Error executing query: ' . $mysqli->error;
    exit();
}

// Loop through the query results and output the data
while ($row = $result->fetch_assoc()) {
    echo $row['contact_first'] . ' ' . $row['contact_last'] . ' ' . $row['contacts_id'] . ' ' . $row['change_date'] . '<br>';
}

// Close the database connection
$mysqli->close();

  echo '</body></html>';
?>