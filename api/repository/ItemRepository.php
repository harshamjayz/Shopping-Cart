<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 05/08/2018
 * Time: 3:16 PM
 */

interface ItemRepository
{

    public function setConnection(mysqli $connection);

    public function saveItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url);

    public function deleteItem($itemCode);

    public function updateItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url);

    public function findItem($itemCode);

    public function findAllItem();


}