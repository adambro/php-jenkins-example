<?php

namespace Mila\DAO;

final class teamDAO implements DAOInterface
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

    public function fetchById($id)
    {
        return $this->dbCon->fetchAssoc("SELECT * FROM teams WHERE id={$id}");
    }
}
