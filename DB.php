<?php

class DB
{

    private string $dbName;
    private string $userName;
    private string $password;

    public function __construct(string $dbName, string $userName, string $password)
    {
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname='.$this->dbName, $this->userName, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec('SET NAMES "utf8"');
            echo sprintf("Success connection to %s", $this->dbName);

        } catch (Exception $error) {
            $output = 'Technical problems, please come later ' . $error->getMessage();
            die($output);
        }
    }
}