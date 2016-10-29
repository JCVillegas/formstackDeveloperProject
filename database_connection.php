<?php


class Database
{
    private $databaseHandler;
    private $error;
    private $sql;

    public function __construct()
    {
        $dataSource = 'mysql:host='.DatabaseConfig::DB_HOST.';dbname='.DatabaseConfig::DB_NAME;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        try {
            $this->databaseHandler = new PDO($dataSource, DatabaseConfig::DB_USER, DatabaseConfig::DB_PASS, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->sql = $this->databaseHandler->prepare($query);
    }

    public function bind($param, $value, $type)
    {
        $this->sql->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->sql->execute();
    }

    public function resultSet()
    {
        $this->execute();

        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
