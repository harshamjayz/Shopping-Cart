<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 09/08/2018
 * Time: 1:45 PM
 */

require_once "business/impl/UserBOImpl.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$userBo = new UserBOImpl();

switch ($method){
    case "GET":
        $action= $_GET["action"];
        switch ($action){
            case "update":
                $userName = $_GET["userName"];
                $name = $_GET["name"];
                $NIC = $_GET["NIC"];
                $telNo = $_GET["telNo"];
                $password = $_GET["password"];
                $address = $_GET["address"];
                $adminLevel = $_GET["adminLevel"];
                echo json_encode($userBo->updateUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel));
                break;
            case "find":
                $userName = $_GET["userName"];
                echo json_encode($userBo->findUser($userName));
                break;
        }
    break;
    case "POST":
        $action = $_POST["action"];
        $userName = $_POST["userName"];
        $name = $_POST["name"];
        $NIC = $_POST["NIC"];
        $telNo = $_POST["telNo"];
        $password = $_POST["password"];
        $address = $_POST["address"];

        switch ($action){
            case "checkandsave":
                $adminLevel = 0;
                echo json_encode($userBo->checkAndSave($userName,$name,$NIC,$telNo,$password,$address,$adminLevel));
                break;
            case "save":
                $adminLevel = 1;
                echo json_encode($userBo->saveUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel));
                break;


        }
        break;

}