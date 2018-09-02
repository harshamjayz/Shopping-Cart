<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 2:10 PM
 */

require_once __DIR__."/../ItemBo.php";
require_once __DIR__."/../../repository/impl/ItemRepositoryImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class ItemBOImpl implements ItemBo
{
    private $itemRepository;

    public function __construct()
    {
        $this->itemRepository = new ItemRepositoryImpl();
    }

    public function saveItem($itemCode, $desc, $qtyOnHand, $unitPrice, $url)
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        $result = $this->itemRepository->saveItem($itemCode, $desc, $qtyOnHand, $unitPrice, $url);

        mysqli_close($connection);

        return $result;
    }

    public function deleteItem($itemCode)
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        $result = $this->itemRepository->deleteItem($itemCode);

        mysqli_close($connection);

        return $result;
    }

    public function updateItem($itemCode, $desc, $qtyOnHand, $unitPrice, $url)
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        $result = $this->itemRepository->updateItem($itemCode, $desc, $qtyOnHand, $unitPrice, $url);

        mysqli_close($connection);

        return $result;
    }

    public function findItem($itemCode)
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        $result = $this->itemRepository->findItem($itemCode);

        mysqli_close($connection);

        return $result;
    }

    public function findAllItem()
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        $resultSet = $this->itemRepository->findAllItem();

        mysqli_close($connection);

        return $resultSet;
    }
}