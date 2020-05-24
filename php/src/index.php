<?php
declare(strict_types = 1);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>welcome-seminar-2020</title>
  </head>
  <body>
  <table border="1">
  <tr>
    <th>id</th>
    <th>名前</th>
  </tr>
    <?php
      try {
        $dsn = "mysql:host=ws_mysql;dbname=ws_db;";
        $user = "root";
        $password = "root";
        $db = new PDO($dsn, $user, $password);
      
        $sql = "SELECT * FROM ws_table";
        $stt = $db->prepare($sql);
        $stt->execute();
        // $result = $stt->fetchAll(PDO::FETCH_ASSOC);
        // foreach($result as $key => $value) {
        //   echo $value["id"] . ":" . $value["name"];
        //   print "<br />";
        // }
        while ($result = $stt->fetchAll(PDO::FETCH_ASSOC)) {
          foreach($result as $value) {
    ?>
          <tr>
            <td><?=$value["id"] ?></td>
            <td><?=$value["name"] ?></td>
          </tr>
    <?php
          }
        }
      } catch (PDOException $e) {
        echo $e;
        exit;
      }
    ?>
    </table>
  </body>
</html>