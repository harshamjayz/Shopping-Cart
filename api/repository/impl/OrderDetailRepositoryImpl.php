<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 11:29 AM
 */

require_once __DIR__."OrderDetailRepository.php";

class OrderDetailRepositoryImpl implements OrderDetailRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function saveOrderDetail($OID,$itemCode,$QTY,$unitPrice)
    {
        $result = $this->connection->query("INSERT INTO orderdetail VALUES('{$OID}','{$itemCode}','{$QTY}','{$unitPrice}')");
        return($result && $this->connection->affected_rows > 0);
    }

    public function deleteOrderDetail($OID,$itemCode)
    {
        $result = $this->connection->query("DELETE FROM orderdetail WHERE OID = '{$OID}' && itemCode = '{$itemCode}'");
        return($result && $this->connection->affected_rows > 0);
    }

    public function updateOrderDetail($OID,$itemCode,$QTY,$unitPrice)
    {
        $result = $this->connection->query("UPDATE orderdetail SET $QTY = '{$QTY}',UnitPrice = '$unitPrice' WHERE OID = '{$OID}',itemCode = '{$itemCode}'");
        return($result && $this->connection->affected_rows > 0);
    }

    public function findOrderDetail($OID,$itemCode)
    {
        $result = $this->connection->query("SELECT * FROM orderdetail WHERE OID='{$OID}' && itemCode = '{$itemCode}'");
        return($result);
    }

    public function findAllOrderDetail()
    {
        $resultSet = $this->connection->query("SELECT * FROM orderdetail");
        return($resultSet);
    }
}