<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 12:03 PM
 */

require_once "business/impl/ItemBOImpl.php";

header("content-type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$itemBo = new ItemBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];
        switch ($action) {
            case "all":
                echo json_encode($itemBo->findAllItem());
                break;
            case "one":
                $itemCode= $_GET["itemCode"];
                echo json_encode($itemBo->findItem($itemCode));
                break;
        }
        break;
    case "POST":
        $action = $_GET['action'];
        switch ($action) {
            case "save":
                echo json_encode($itemBo->saveItem());
                break;
        }
        break;
}
