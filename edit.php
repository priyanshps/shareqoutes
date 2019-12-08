<?php include './config.php'?>
<?php include './classes/database.php'?>
<?php include './classes/quote.php'?>
<?php

    try
    {
        $quotesObj=new quote();
        $qoute=$quotesObj->getSingle($_GET['id']);
    }
    catch(Throwable $e)
    {
        echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                
    }



    if(isset($_POST['submit']))
    {
        $id=$_GET['id'];
        $text=$_POST['text'] ?:null;
        $creator=$_POST['Creator'] ?: 'Unknown';
        try
        {
            $quotesObj=new quote();
            $quotesObj->update($id,$text,$creator);
        }
        catch(Throwable $e)
        {
            echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                    
        }


    }
    if(isset($_POST['delete']))
    {
        $id=$_GET['id'];
        try
        {
            $quotesObj=new quote();
            $quotesObj->delete($id);
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
        <title>ShareQuotes Edit Quotes</title>
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
                <h2 class="page-header"> Edit Quote</h2>
                <form method="POST" action="edit.php?id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="text" placeholder="Quote Text" value= "<?php
                            echo $qoute['text'];
                        
                        ?>">
                    </div>
                    <div class="form-group">
                            <label>Creator / author</label>
                            <input type="text" class="form-control" name="Creator" placeholder=" Quote Creator" 
                            value="<?php echo $qoute['creator'];?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success"> Edit</button>
                    <button type="submit" name="delete" class="btn btn-danger"> Delete</button>
                </form>
            

            
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2019 ShareQuotes,</p>
        </footer>

        </div> <!-- /container -->

    </body>
    </html>
    