<?php

namespace App\Controllers;

ini_set('display_errors','On');
final class RegistrerController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
//        echo __CLASS__;
    }

    public function index(){
//        echo "hola";
        $results = $this->getResults();
        $results["hola"] ="hola";
        $this->render($results,"");
    }


    public function getSingleResult()
    {
        // TODO: Implement getSingleResult() method.
    }

    public function getResults()
    {
        //aqui por ejemplo podriamos necesitar consulta a base de datos en caso de querer mostrar por ejemplo todos los inmubles
        // TODO: Implement getResults() method.
    }

    public function sign(){
      //        print_r($_POST);

        $DB = $this->getDB();
        if(empty($_POST["user"]) || empty($_POST["pass"]) || $_POST["pass"]!=$_POST["verifypass"]){
            header('Location: /sign');
            die();
        }

        $user =filter_var($_POST["user"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass =filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `Users`(`nick`, `pass`, `email`) VALUES ('".$user."','".$pass."','".$_POST["email"]."')";
        $stmt =$this->query($DB,$sql);



        $sql = "SELECT * FROM `Users` WHERE `nick`=:nick";
        $stmt = $this->query($DB,$sql,array(':nick' => $user));
        $idUser = $this->row_extract($stmt)["id"];




        if(isset($_POST["ven"])){
            $sql = "INSERT INTO `User_rol`(`idRol`, `idUser`) VALUES (3,'".$idUser."')";

            $stmt = $this->query($DB,$sql);
        }
        if(isset($_POST["com"])){
            $sql = "INSERT INTO `User_rol`(`idRol`, `idUser`) VALUES (4,'".$idUser."')";

            $stmt = $this->query($DB,$sql);
        }



        header('Location: /');

        die();
    }
}