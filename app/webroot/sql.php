<?php 
if (!empty($_POST['email']) && !empty($_POST['pass'])) {
  $conn = mysqli_connect('db-testing', 'root', 'asdf1234');
  mysqli_select_db($conn, 'test_database');

  $sql = "SERECT * FROM users WHERE email='"
        .$_POST['email']."' AND pass='".$_POST['pass']."' LIMIT 1";
  var_dump($sql);
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $user = mysql_fetch_assoc($result);
  }

}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
</head>

<body>
  <?php if (!empty($user)): ?>
    <h1>Hello!!</h1>
  <?php else: ?>
    <form action="" method="post">
      email:<input type="input" name="email" /><br />
      pass:<input type="input" name="pass" /><br />
      <input type="submit" name="submit" />
    </form>
  <?php endif; ?>
</body>
</html>