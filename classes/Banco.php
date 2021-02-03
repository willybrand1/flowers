<?php
class Banco{
    public $conn;
    public $parse;
    public $query;
    public $rs;
    public $stmt;

    public function __construct($banco){
        $this->parse = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/flowers/config/config.ini',true);
        
        if ($this->parse === false) {
            throw new \Exception("Erro ao ler o arquivo de configuração");
        }

        try{
            $this->conn = mysqli_connect($this->parse[$banco]['host'], $this->parse[$banco]['user'], $this->parse[$banco]['password'], $this->parse[$banco]['database']);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    private function __clone(){}

    public function query($sql){
        try {
            $this->query = mysqli_query($this->conn,$sql);
            
            if(preg_match('/^(SELECT)\s/i',$sql) > 0){
                $this->rs = $this->query->fetch_all(MYSQLI_ASSOC);   
                return $this->rs;
            }else{
                return $this->query;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function close(){
        mysqli_close($this->conn);
    }
}