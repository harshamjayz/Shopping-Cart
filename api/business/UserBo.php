<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 4:21 PM
 */

interface UserBo
{

    public function saveUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel);

    public function deleteUser($userName);

    public function updateUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel);

    public function findUser($userName);

    public function findAllUser();

    public function checkAndSave($userName,$name,$NIC,$telNo,$password,$address);

}