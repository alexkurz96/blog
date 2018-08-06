<!--        site-bar-->
    <aside>

        <?php 
        require_once("database.php");
        require_once("models/articles.php");
    
        $link = db_connect();
        $cats = cat_all($link);
        

        $data = $_POST;
        if( isset($data['do_login']) )
        {
            $errors = array();
            $user = R::findOne('user', 'login LIKE ?', array($data['login']));
            if( $user ){
                //логин существует
                if(password_verify($data['password'], $user->password)){
                    $_SESSION['logged_user'] = $user;
                    echo '<div class="widget"><h2>Привет,';
                    echo $_SESSION['logged_user']->login;
                }else{
                    $errors[] = 'Неверно введен пароль';
                }
            }else{
                $errors[] = 'Нет такого пользователя';
            }
        }
        if( !empty($errors) ){
                echo '<div style = "color: red">'.array_shift($errors).'</div><hr/>';
            }
        ?>

            
            <?php if(!isset($_SESSION['logged_user'])):?>
            <div class="widget">
                <h2>Вход</h2>
                <form action="index.php" method = "POST">
                    <input type="name" name="login" class="email op" placeholder="login" required = "required">
                    <input type="password" name="password" class="password op" placeholder="password" required = "required">
                    <!--<input class="btn" type="submit" value="Вход">-->
                    <button type="submit" name = "do_login" class="btn">Вход</button>
                </form>
                <a href="signup.php">Регистрация</a>
            </div>
            <?php else:?>
            <p><a href="/logout.php">Выйти</a></p>
            <p><a href="admin">Панель администратора</a></p>
            </h2></div>
            <?php endif;?>

       <div class="widget">
           <h2>Поиск</h2>
           <div class="subscribe">
           <form action="" method="get">
               <input type="search" placeholder="What are you looking for?" class="subscribe-input search">
               <input type="image" src="images/sbcr-btn.jpg" class="subscribe-img">
           </form>
            </div>
       </div>
       <div class="widget">
           <h2>Категории</h2>
           <nav>
               <ul>
                   <?php foreach($cats as $cat): ?> 
                        <li>    
                        <a href="articles.php?categorie=<?=$cat['id']?>"><?=$cat['title']?></a> 
                        </li> 
                    <?php endforeach ?> 
               </ul>
           </nav>
       </div>



       <div class="widget">
           <img src="images/banner.jpg" alt="baner">
       </div>
    </aside>