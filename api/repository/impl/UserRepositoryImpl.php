<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 05/08/2018
 * Time: 11:38 PM
 */

include_once __DIR__ . "/../UserRepository.php";

class userRepositoryImpl implements UserRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function saveUser($userName,$name,$NIC,$telNo,$password,$address,$admin)
    {
        $result = $this->connection->query("INSERT INTO user values ('{$userName}','{$name}','{$NIC}','{$telNo}','{$password}','{$address}','{$admin}')");
        return($result && $this->connection->affected_rows >0);
    }

    public function deleteUser($userName)
    {
        $result = $this->connection->query("DELETE FROM user WHERE userName = '{$userName}'");
        return($result && $this->connection->affected_rows >0);
    }

    public function updateUser($userName,$name,$NIC,$telNo,$password,$address,$admin)
    {
        $result = $this->connection->query("UPDATE user SET name = '{$name}',NIC = '{$NIC}',telNo = '{$telNo}',password = '{$password}',address = '{$address}',admin = '{$admin}' WHERE userName = '{$userName}'");
        return($result && $this->connection->affected_rows >0);
    }

    public function findUser($userName)
    {
        $result = $this->connection->query("SELECT * FROM user WHERE userName = '{$userName}'");
        return($result);
    }

    public function findAllUser()
    {
        $resultSet = $this->connection->query("SELECT * FROM user");
        return($resultSet);
    }
}