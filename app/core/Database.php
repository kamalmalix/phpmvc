<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        //DATA SOURCE NAME
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->db_name ;

        //untuk mengoptimasi koneksi ke database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //fungsi untuk menjalankan query yang bisa dipake apapun (CRUD)
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    //fungsinya jika di query terdapat where, insert into valuenya apa, maupun set datanya apa dalam update (parameter)
    //supaya terhindar dari query injeksion
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //untuk menjalankan program
    public function execute(){
        $this->stmt->execute();
    }


    //memanggil datanya banyak
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //memanggil datanya satu
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //digunakan untuk menghitung ada berapa baris yang baru berubah dalam tabel nya.
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}