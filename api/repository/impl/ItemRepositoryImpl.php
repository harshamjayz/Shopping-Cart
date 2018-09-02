<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 05/08/2018
 * Time: 3:32 PM
 */

include_once __DIR__."/../ItemRepository.php";

class ItemRepositoryImpl implements ItemRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function saveItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url)
    {
        $result = $this->connection->query("INSERT INTO item VALUES ('{$itemCode}','{$desc}','{$qtyOnHand}','{$unitPrice}','{$url}'");
        return($result && $this->connection-affected_rows >0);
    }

    public function deleteItem($itemCode)
    {
        $result = $this->connection->query("DELETE FROM item WHERE itemCode = '{$itemCode}'");
        return ($result && $this->connection-affected_rows >0);
    }

    public function updateItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url)
    {
        $result = $this->connection->query("Update item set desc = '{$desc}',qtyOnHand = '{$qtyOnHand}',unitPrice = '{$unitPrice}',url='{$url}' where itemCode = '{$itemCode}'");
        return ($result && $this->connection-affected_rows >0);
    }

    public function findItem($itemCode)
    {
        $result = $this->connection->query("select * from item where itemCode = '{$itemCode}'");
        return $result->fetch_assoc();
    }

    public function findAllItem()
    {
        $resultSet = $this->connection->query("select * from item");
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }


}