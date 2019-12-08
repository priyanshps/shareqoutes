<?php

    class quote extends database
    {
        public function index()
        {
            try
            {
                $this->query('SELECT * FROM quotes ORDER BY create_date DESC');
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row).' Quates Listed';
                    }
                }
            }
            catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            
        }
        public function add(string $text,string $creator)
        {
            try
            {
                $this->query("INSERT INTO quotes(text,creator) VALUES(:text,:creator)");
                $this->bind(':text',$text);
                $this->bind(':creator',$creator);
                $this->execute();
            }catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            if($this->lastInsertId())
            {
                header('location: index.php');
            }
        }
        public function getSingle(int $id)
        {
            try
            {
                $this->query('SELECT * FROM quotes WHERE id=:id');
                $this->bind(':id',$id);
                $row=$this->single();
                return $row;
            }catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            if($this->lastInsertId())
            {
                header('location: index.php');
            }   
        }
        public function update(int $id,String $text,String $creator)
        {
            try
            {
                $this->query('UPDATE quotes SET text= :text, creator= :creator WHERE id =:id');
                $this->bind(':id',$id);
                $this->bind(':text',$text);
                $this->bind(':creator',$creator);
                $this->execute();
            }catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }

            header('location: index.php');
        }
        public function delete(int $id)
        {
            try
            {
                $this->query('DELETE FROM quotes WHERE id = :id');
                $this->bind(':id',$id);
                $this->execute();
            }catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }

            header('location: index.php');
        }

    }


?>