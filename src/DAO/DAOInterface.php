<?php

namespace Mila\DAO;

interface DAOInterface
{
    /*
     * @return array
     */
    public function fetchAll();

    /*
     * @return array
     */
    public function fetchById($id);
}
