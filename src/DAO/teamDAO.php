<?php

namespace Mila\DAO;

class teamDAO
{
    /*
     * @var \Doctrine\DBAL\Connection
     */
    private $dbCon;

    /*
     * @param \Doctrine\DBAL\Connection $dbCon
     */
    public function __construct($dbCon)
    {
        $this->dbCon = $dbCon;
    }

    public function fetchAll()
    {
        return $this->dbCon->fetchAll('SELECT * FROM teams');
    }
}
