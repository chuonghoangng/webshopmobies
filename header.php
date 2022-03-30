<! DOCTYPE html>
  <html lang=" vi">

  <head>
    <meta charset="utf-8">
    <meta name="author" content="nguyendinhanh" />
    <link href="/LAB03/site.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- <link href="/LAB3/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <title>Project training - website bán hàng</title>
  </head>

  <body>
    <div id="wrapper">
      <h2> Project training - Xây dựng website bán hàng</h2>
      <?php
      session_start();
      if (isset($_SESSION['user']) != "") {
        echo "<h2>Xin chào: " . $_SESSION['user'] . "<a href='/Shopmobies/logout.php'> Logout</a></h2>";
      } else {
        echo "<h2> Bạn chưa đăng nhập <a href=' /Shopmobies/login.php'>Login</a> - <a
  href='/Shopmobies/register.php'>Register</a></h2>";
      }
      ?>