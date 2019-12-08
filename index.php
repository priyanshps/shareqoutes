<?php include './config.php'?>
<?php include './classes/database.php'?>
<?php include './classes/quote.php'?>
<?php

  try
  {
    $quotesObj=new quote();
    $qoutes=$quotesObj->index();
  }
  catch(Throwable $e)
  {
    echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
  }
  


?>
<html>
  <head>
    <meta charset="utf-8">
    <title>ShareQuotes</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="new.php">New Quote</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">ShareQuotes</h3>
      </div>

      <div class="jumbotron">
        <h1>Got A Quote?</h1>
        <p class="lead">Store your favorite quotes here to access and read them daily and better your life</p>
        <p><a class="btn btn-lg btn-success" href="new.php" role="button">Add Quote Now</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">

          <?php foreach($qoutes as $q) :?>
          <h3><a href="edit.php?id=<?php echo $q['id']; ?>">  <?php echo $q['text'];?> </a> </h3>
          <p> <?php echo $q['creator'];?> </p>
          <?php  endforeach; ?>

          
        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2019 ShareQuotes,</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
