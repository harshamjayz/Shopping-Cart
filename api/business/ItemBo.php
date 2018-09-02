<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 2:05 PM
 */

interface ItemBo
{

    public function saveItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url);

    public function deleteItem($itemCode);

    public function updateItem($itemCode,$desc,$qtyOnHand,$unitPrice,$url);

    public function findItem($itemCode);

    public function findAllItem();



}