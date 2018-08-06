<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <link rel="stylesheet" type="text/css" href="../reset.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
    <title>Company name - home page</title>
    <meta charset="utf-8"/> 
    <!--[if lt IE 9]> <script src="//html5shiv.
    googlecode.com/ svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <header>
    <div class="center-block-main">
      <a href="/">
        <img src="../images/logo.jpg" alt="company" class="logo"/>
      </a>
    </div>
  </header>
  
  <div class="center-block-main content">
        <div id="addart">

                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <label for="title">Название</label><br/>
                <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required><br/>
                <label for="date">Дата</label><br/>
                <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required><br/>
                <label for="title">Содержимое</label><br/>
                <textarea class="form-item" name="content" required><?=$article['content']?></textarea><br/>
                <input type="submit" value="Сохранить" class="btn">
                </form>
  </div>
   </div>
 

</body>
</html>