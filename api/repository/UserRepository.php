<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 05/08/2018
 * Time: 11:36 PM
 */

interface userRepository
{
    public function setConnection(mysqli $connection);

    public function saveUser($userName,$name,$NIC,$telNo,$password,$address,$admin);

    public function deleteUser($userName);

    public function updateUser($userName,$name,$NIC,$telNo,$password,$address,$admin);

    public function findUser($userName);

    public function findAllUser();
}