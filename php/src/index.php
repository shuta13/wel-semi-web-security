<meta charset="UTF-8">
<title>welcome-seminar-2020</title>
<?php
try {
  $dsn = "mysql:host=ws_mysql;dbname=ws_db;";
  $user = "root";
  $password = "root";
  $db = new PDO($dsn, $user, $password);

  $sql = "SELECT * FROM ws_table";
  $s = $db->prepare($sql);
  $s->execute();
  $result = $s->fetchAll(PDO::FETCH_ASSOC);
  var_dump($result);
} catch (PDOException $e) {
  echo $e;
  exit;
}