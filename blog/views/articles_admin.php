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
        <nav>
          <ul class="menu">
            <li>
              <a href="index.php?action=add">Создать статью</a>
            </li>
          </ul>
        </nav>
    </div>
  </header>

    <div class="center-block-main content">
            <table id="admin_table" class="table">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?=$article['date']?></td>
                        <td><?=articles_intro($article['title'], 80)?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$article['id']?>">Редактировать</a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?=$article['id']?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
       
    </body>
</hmtl>

