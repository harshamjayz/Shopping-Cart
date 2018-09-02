<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 11:06 AM
 */

interface OrderRepository
{
    public function setConnection(mysqli $connection);

    public function saveOrder($OID,$userName,$date);

    public function deleteOrder($OID);

    public function updateOrder($OID,$userName,$date);

    public function findOrder($OID);

    public function findAllOrder();

}