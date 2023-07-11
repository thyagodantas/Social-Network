<?php

namespace Sistema\Models;

class UsuariosModel
{


    public static function emailExists($email)
    {
        $pdo = \Sistema\MySql::connect();
        $verificar = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");
        $verificar->execute(array($email));

        if ($verificar->rowCount() == 1) {
            //Email existe
            return true;
        } else {
            //Email não existe
            return false;
        }

    }

    public static function ipExists($ipaddress)
    {
        $pdo = \Sistema\MySql::connect();
        $verificar = $pdo->prepare("SELECT ip FROM usuarios WHERE ip = ?");
        $verificar->execute(array($ipaddress));

        if ($verificar->rowCount() == 1) {
            //IP existe
            return true;
        } else {
            //IP não existe
            return false;
        }
    }


}



?>

