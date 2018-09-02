<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 9:34 PM
 */

require_once 'business/impl/UserBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$userBO = new UserBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];

        switch($action){
//            case "count":
//                echo json_encode($customerBO->getCustomersCount());
//                break;
            case "all":
                echo json_encode($userBO->findAllUser());
                break;
            case "row":
                $userName = $_GET["userName"];
                echo json_encode($userBO->findUser($userName));
                break;
        }

        break;
    case "POST":
        $action = $_POST["action"];
        $userName = $_POST["userName"];
        $name= $_POST["name"];
        $NIC= $_POST["NIC"];
        $telNo = $_POST["telNo"];
        $address = $_POST["address"];

//        echo "WOrking";

        switch ($action){
            case"save":
                echo json_encode($userBO->saveUser($userName,$name,$NIC,$telNo,$password,$address));

                break;
            case"update":
                echo json_encode($userBO->updateUser($userName,$name,$NIC,$telNo,$password,$address));
                break;
        }
        break;
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);
        if (count($queryArray) === 2){
            $userName = $queryArray[1];
            echo json_encode($userBO->deleteUser($userName));
        }
        break;
}