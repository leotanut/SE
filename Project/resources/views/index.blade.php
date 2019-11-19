<html>

  <head>
    <link rel="stylesheet" type="text/css" href="/css/index_style.css">
  </head>

  <body>

    @if(Session::has('role'))
      @if(Session::get('role')=="student")
        <?php echo "<script>window.location.href='/student';</script>"; ?>
      @else
        <?php echo "<script>window.location.href='/management';</script>"; ?>
      @endif
    @endif

    <div class="picbar"></div>

    <form method="post" class="login-form" action="/user_login">

      <label id="title">login</label>
      <hr id="login-login">

      <img id="user-pic" src="img/user-login.png">
      <input type="text" name="user_login" placeholder="Enter Username or E-mail"> <br/>

      <img id="pwd-pic" src="img/pwd-login.jpg">
      <input type="password" name="pwd" placeholder="Enter Password"> <br/>

      <input type="submit" value="login">

      {{ csrf_field() }}
    </form>
  </body>

</html>