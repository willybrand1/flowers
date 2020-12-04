<?php
class Banco{
    public $conn;
    private $dsn;
    public $parse;
    public $query;
    public $rs;

    public function __construct($banco){
        $this->parse = $parse;
        $this->conn  = $conn;
        $this->dsn   = $dsn;
        $this->query = $query;
        $this->rs    = $rs;
        
        $this->parse = parse_ini_file('config/config.ini',true);
        
        if ($this->parse === false) {
            throw new \Exception("Erro ao ler o arquivo de configuração");
        }

        $this->dsn = "host=".$this->parse[$banco]['host']." port=".$this->parse[$banco]['port']." dbname=".$this->parse[$banco]['database']." user=".$this->parse[$banco]['user']." password=".$this->parse[$banco]['password']."";

        try{
            $this->conn = pg_connect($this->dsn);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    private function __clone(){}

    public function __destruct() {
        $this->close();
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }

    public function query($sql){
        try {
            $this->query = pg_query($this->conn,$sql);
            
            if(preg_match('/^(SELECT)\s/i',$sql) > 0){
                $this->rs = pg_fetch_all($this->query);
                return $this->rs;
            }else{
                return $this->query;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function close(){
        pg_close($this->conn);
    }
}