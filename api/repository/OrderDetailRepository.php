<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 11:21 AM
 */

interface OrderDetailRepository
{

    public function setConnection(mysqli $connection);

    public function saveOrderDetail($OID,$itemCode,$qty,$unitPrice);

    public function deleteOrderDetail($OID,$itemCode);

    public function updateOrderDetail($OID,$itemCode,$qty,$unitPrice);

    public function findOrderDetail($OID,$itemCode);

    public function findAllOrderDetail();

}