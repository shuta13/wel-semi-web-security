<div>
  <h2> SQLインジェクション </h2>

  <p>
    <i>不正なパラメーターでSQL命令を生成し、データベースを攻撃</i><br />
  </p>

  <p style="color: gray;">
    <i>以下の単語で検索する</i>
  </p>

  <ul>
    <li>1 ~ 5</li>
    <li>0 OR TRUE; --</li>
    <li>0 OR TRUE; DELETE FROM ws_table; --</li>
  </ul>

  <form method="POST" action="index.php">
    <input type="text" name="id" />
    <input type="submit" value="検索" />
  </form>

  <h3>検索結果</h3>
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

        $id = $_POST["id"];
      
        // 検索用クエリ
        $sql = "SELECT * FROM ws_table WHERE id = " . $id . ";";

        $stt = $db->prepare($sql);
        $stt->execute();

        // 検索結果をwhileで表示
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
</div>