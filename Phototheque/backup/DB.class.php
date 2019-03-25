<?php


class DB  {
    protected $db_name = "phototheque";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_host = "localhost";
    protected $DB = null;


    public function connect()
        {
        try
            {
            $this->DB = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name."", $this->db_user, $this->db_pass);
            }
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
        }

    public function query()
        {
        return $this->DB->query();
        }
    }


?>
