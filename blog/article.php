
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="reset.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
<title>Company name - home page</title>
<meta charset="utf-8"/> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description=" content="Brandon's Baseball Cards provides a
large selection of vintage and modern baseball cards for sale. We also offer
daily baseball news and events in"/>
    <!--[if lt IE 9]> <script src="//html5shiv.
    googlecode.com/ svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
  <?php
    require_once("database.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $article = article_get($link, $_GET['id']);
    $coms = com_get($link, $_GET['id']);
   include "/includes/header.php";
    ?>

  <div class="center-block-main content">
    <main>
            <!-- Content -->
            <article>
            <header>
                <img src="images/<?=$article['img']?>" alt="img">
                <p class="publish">&copy;Alex  <em>Опубликованно: <?=$article['date']?></em></p>

            </header>
            <h2><?=$article['title']?></h2>
            <p><?=articles_intro($article['content'])?></p>
            
        </article>
<?php foreach($coms as $com): ?> 
                       
                  <article>
                      <a href="#"><?=$com['author']?></a>
                        <small><?=$com['pubdate']?></small>
                      <p><?=$com['text']?></p>
              
                  </article>
                    <?php endforeach ?> 

      
              <h3>Добавить комментарий</h3>
            <?php
                $data = $_POST;
                if( isset($data['do_post']) ){
                    if(!empty($_POST)){
                        com_new($link, $data['name'], $data['text'], $_GET['id']);
                    }
                }

        //     require 'includes/db.php';
        // $data = $_POST;
        // if( isset($data['do_post']) )
        // {
            
        //       $comments = R::dispense( 'comments' );
        //         $comments->author = $data['name'];
        //         $comments->text = $data['text'];
        //         $comments->articles_id = $_GET['id'];
        //         R::store($comments);
           
        // }
            ?>
                <form class="form" action="article.php?id=<?=$_GET['id']?>" method = "POST" id="com">
                  
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                    <br/>
                    
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                <br/>
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
        
                </form>
         
    </main>  
    
    
    <?php include "/includes/sitebar.php"; ?>
    
    <div class="clr"></div>

  </div>
  
  <?php include "/includes/footer.php"; ?>

</body>
</html>