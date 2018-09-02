<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 11:06 AM
 */

include_once __DIR__."OrderRepository.php";

class OrderRepositoryImpl implements OrderRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function saveOrder($OID, $userName, $date)
    {
        $result = $this->connection->query("INSERT INTO order VALUES ('{$OID}','{$userName}','{$date}'");
        return($result && $this->connection->affected_rows > 0);
    }

    public function deleteOrder($OID)
    {
        $result = $this->connection->query("DELETE FROM order WHERE OID = '{$OID}'");
        return($result && $this->connection->affected_rows > 0);
    }

    public function updateOrder($OID, $userName, $date)
    {
        $result = $this->connection->query("UPDATE order SET OID = '{$OID}',userName='{$userName}',date='{$date}'");
        return($result && $this->connection->affected_rows > 0);
    }

    public function findOrder($OID)
    {
        $result = $this->connection->query("SELECT * FROM order WHERE OID = '{$OID}'");
        return $result;
    }

    public function findAllOrder()
    {
        $resultSet = $this->connection->query("SELECT * FROM order");
        return $resultSet;
    }
}