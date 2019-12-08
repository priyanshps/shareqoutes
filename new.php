<?php include './config.php'?>
<?php include './classes/database.php'?>
<?php include './classes/quote.php'?>
<?php

    if(isset($_POST['submit']))
    {
        $text=$_POST['text'] ?:null;
        $creator=$_POST['Creator'] ?: 'Unknown';
        try
        {
            $quotesObj=new quote();
            $qoutes=$quotesObj->add($text,$creator);
        }
        catch(Throwable $e)
        {
            echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                    
        }


    }


?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>ShareQuotes Add Quotes</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="container">
        <div class="header clearfix">
            <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" ><a href="index.php">Home</a></li>
                <li role="presentation" class="active"><a href="new.php">New Quote</a></li>
            </ul>
            </nav>
            <h3 class="text-muted">ShareQuotes</h3>
        </div>

    
        <div class="row marketing">
            <div class="col-lg-12">
                <h2 class="page-header"> Add New Quote</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="text" placeholder="Quote Text">
                    </div>
                    <div class="form-group">
                            <label>Creator / author</label>
                            <input type="text" class="form-control" name="Creator" placeholder=" Quote Creator">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success"> Create</button>
                </form>
            

            
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2019 ShareQuotes,</p>
        </footer>

        </div> <!-- /container -->

    </body>
    </html>
