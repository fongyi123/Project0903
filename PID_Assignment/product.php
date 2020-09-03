<?php
session_start();
if (isset($_SESSION["maaccount"])) {
  $meaccount = $_SESSION["maaccount"];
} else {
  if (!isset($_SESSION["maaccount"])) {
    header("Location: login2.php");
    exit();
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-color: lightblue;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lag - Member Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">產品管理</font>
    </div>
    <div align="center" bgcolor="#CCCCCC"><a href="index2.php">回首頁</a></div>
      <div style="width:auto;height:600px;">
        <div style="width:auto;height:600px;text-align:center;margin:0 auto;">
          <label>
            <font color="#000000">產品列表 :
          </label>
          <?php
          $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
          $result = mysqli_query($link, "set names utf8");
          $maaccount = $_SESSION["maaccount"];
          $sqlsecret = "SELECT * from product";
          $result = mysqli_query($link, $sqlsecret);

          $total_records = mysqli_num_rows($result);  // 取得記錄數

          echo ($total_records);
          ?>
          <table border="1" cellspacing=0 cellspadding=0>
            <tr>
              <td>prid</td>
              <td>prname</td>
              <td>prprice</td>
              <td>prquantity</td>
              <td>prdescript</td>
            </tr>
            <?php
            for ($i = 0; $i < $total_records; $i++) {
              $row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   
            ?>
              <tr>
                <td>
                  <?php echo $row['prid'];   ?>
                </td>
                <td>
                  <?php echo $row['prname'];   ?>
                </td>
                <td>
                  <?php echo $row['prprice']; ?>
                </td>
                <td>
                  <?php echo $row['prquantity']; ?>
                </td>
                <td>
                  <?php echo $row['prdescript']; ?>
                </td>

              </tr>
            <?php    }   ?>
          </table>
        </div>
      </div>
      </div>
      <div style=" background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $maaccount ?></font>
      </div>
  </form>
</body>

</html>