
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
    $articles = article_get_cat($link, $_GET['categorie']);
   include "/includes/header.php";
    ?>

  <div class="center-block-main content">
    <main>
            <!-- Content -->
          <?php foreach($articles as $article): ?>
        <article>
            <header>
                <img src="images/<?=$article['img']?>" alt="img">
                <p class="publish">&copy;Alex  <em>Опубликованно: <?=$article['date']?></em></p>

            </header>
            <h2><?=$article['title']?></h2>
            <?php echo mb_substr(strip_tags($article['content']), 0, 100, 'utf-8') . '...'; ?>
            <p><a href="article.php?id=<?=$article['id']?>" class="more">Continue Reading</a></p>
        </article>
        <?php endforeach ?>
    </main>  
    
    <?php include "/includes/sitebar.php"; ?>
    
    <div class="clr"></div>

  </div>
  
  <?php include "/includes/footer.php"; ?>

</body>
</html>