<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS
 * Date: 06/08/2018
 * Time: 4:24 PM
 */



include_once __DIR__."/../UserBo.php";
require_once __DIR__ . "/../../repository/impl/UserRepositoryImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class UserBOImpl implements UserBO
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepositoryImpl();
    }

    public function saveUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $result = $this->userRepository->saveUser($userName, $name, $NIC, $telNo, $password , $address,$adminLevel);

        mysqli_close($connection);

        return $result;

    }

    public function deleteUser($userName)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $result = $this->userRepository->deleteUser($userName);

        mysqli_close($connection);

        return $result;
    }

    public function updateUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $result = $this->userRepository->updateUser($userName,$name,$NIC,$telNo,$password,$address,$adminLevel);

        mysqli_close($connection);

        return $result;
    }

    public function findUser($userName)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $result = $this->userRepository->findUser($userName);

        mysqli_close($connection);

        return $result;

    }

    public function findAllUser()
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $resultSet = $this->userRepository->findAllUser();

        mysqli_close($connection);

        return $resultSet;
    }

    public function checkAndSave($userName,$name,$NIC,$telNo,$password,$address)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepository->setConnection($connection);
        $result = $this->userRepository->findUser($userName);
        if($result === null){

            session_set_cookie_params(90 * 60);
            session_start();
            $_SESSION['status'] = true;
            $_SESSION['username'] = $userName;
            $_SESSION['name'] = $name;
            $connection = (new DBConnection())->getConnection();
            $this->userRepository->setConnection($connection);
            $result = $this->saveUser($userName,$name,$NIC,$telNo,$password,$address,0);
            return $result;

        }else{

            return false;

        }
    }
}