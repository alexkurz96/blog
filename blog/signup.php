<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="reset.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
    <title>Company name - home page</title>
    <meta charset="utf-8"/> 
    <!--[if lt IE 9]> <script src="//html5shiv.
    googlecode.com/ svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <?php include "/includes/header.php" ?>

    <div class="center-block-main content">
      <h2>
          Региcтрация...
      </h2>
          <?php 
        require 'includes/db.php';

        $data = $_POST;
        if( isset($data['do_signup']) )
        {
            //здесь регистрируем
            $errors = array();
            if( trim($data['login'])== ''){
                $errors[] = 'Введить логин';
            }
            if( trim($data['email'])==''){
                $errors[] = 'Введить email';
            }
            if( $data['password'] ==''){
                $errors[] = 'Введить пароль';
            }
            if( $data['password_2'] != $data['password']){
                $errors[] = 'Повторный пароль введен не верно';
            }

            if( R::count('user', "login = ?", array($data['login'])) > 0 ){
                $errors[] = 'Пользователь с таким логином уже существует';
            }

            if( R::count('user', "email = ?", array($data['email'])) > 0 ){
                $errors[] = 'Пользователь с таким Email уже существует';
            }
            if( empty($errors) ){
                //Все хорошо, регистрирую
                $user = R::dispense( 'user' );
                $user->login = $data['login'];
                $user->email = $data['email'];
                $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
                R::store($user);
                echo '<div style = "color: green"> Вы зарестрированны!</div><hr/>';
            }else{
                echo '<div style = "color: red">'.array_shift($errors).'</div><hr/>';
            }
        }
    ?>
       <form action="signup.php" method = "POST" id="reg" >
            <label for="name">Укажить свой nickname</label><br/>
            <input type="name" name="login" class="inp" required = "required" value = "<?php echo @$data['login']; ?>" /><br /> 
            <label for="email">Укажите свой адрес электронной почты</label><br/>
            <input type="email" name="email"  class="inp" required = "required" value = "<?php echo @$data['email']; ?>" />
            <br/><br/>
            <label for="password">Укажите пароль</label><br/>
            <input type="password" name="password"  class="inp" required = "required" value = "<?php echo @$data['password']; ?>" /><br/>
            <label for="password_2">Укажите пароль повторно</label><br/>
            <input type="password" name="password_2" class="inp" required = "required" value = "<?php echo @$data['password_2']; ?>" /><br/>
<!--
            <label for="year">Укажите свой возраст</label><br/>
            <input type="number" id="year" min ="3" mac = "110" step = "1" class="inp"  required = "required" /><br/>
-->
<button type="submit" name = "do_signup" class="btn">Зарегаться</button>
            <!--<input type="submit" name = "do_signup" value="регистрация" class="btn" />-->
       </form>
    </div>
    
  <?php include "/includes/footer.php" ?>

</body>
</html>