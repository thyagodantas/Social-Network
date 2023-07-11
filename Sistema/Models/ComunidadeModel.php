<?php

namespace Sistema\Models;

class ComunidadeModel
{

    public static function listarComunidade()
    {

        $pdo = \Sistema\MySql::connect();

        $comunidade = $pdo->prepare("SELECT * FROM  usuarios");

        $comunidade->execute();

        return $comunidade->fetchAll();


    }


    public static function solicitarAmizade($idPara)
    {
        $pdo = \Sistema\MySql::connect();

        $verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ?) OR (enviou = ? AND recebeu = ?)");

        $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id']));


        if ($verificaAmizade->rowCount() == 1) {
            return false;
        } else {
            //PODEMOS INSERIR NO BANCO A SOLICITAÇÃO
            $insertAmizade = $pdo->prepare("INSERT INTO amizades VALUES (null, ?, ?, 0)");
            if (
                $insertAmizade->execute(array($_SESSION['id'], $idPara))
            ) {
                return true;
            }


        }


    }

    public static function existePedidoAmizade($idPara)
    {
        $pdo = \Sistema\MySql::connect();

        $verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ?) OR (enviou = ? AND recebeu = ?)");

        $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id']));


        if ($verificaAmizade->rowCount() == 1) {
            return false;
        } else {
            return true;
        }
    }

    public static function listarAmizadesPendentes()
    {
        $pdo = \Sistema\MySql::connect();
        $listarAmizadesPendentes = $pdo->prepare("SELECT * FROM amizades WHERE recebeu = ? AND status = 0");
        $listarAmizadesPendentes->execute(array($_SESSION['id']));

        if ($listarAmizadesPendentes->rowCount() == 1) {

            \Sistema\Utilidades::amizadePendente("Você tem solicitações pendentes.");
        }


        return $listarAmizadesPendentes->fetchAll();


    }

    public static function getUsuarioById($id)
    {
        $pdo = \Sistema\MySql::connect();
        $usuario = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $usuario->execute(array($id));

        return $usuario->fetch();
    }

    public static function atualizarPedidoAmizade($enviou, $status)
    {
        $pdo = \Sistema\MySql::connect();

        if ($status == 0) {
            //RECUSOU O PEDIDO
            $del = $pdo->prepare("DELETE FROM amizades WHERE enviou = ? AND recebeu = ? AND status = 0");
            $del->execute(array($enviou, $_SESSION['id']));

            //PROTEÇÃO CONTRA MANIPULAÇÃO VIA URL
            if ($del->rowCount() == 1) {
                return true;
            } else {
                return false;
            }

        } else if ($status == 1) {
            //ACEITOU O PEDIDO
            $aceitarPedido = $pdo->prepare("UPDATE amizades SET status = 1 WHERE enviou = ? AND recebeu = ?");
            $aceitarPedido->execute(array($enviou, $_SESSION['id']));
            //PROTEÇÃO CONTRA MANIPULAÇÃO VIA URL
            if ($aceitarPedido->rowCount() == 1) {
                return true;
            } else {
                return false;
            }


        }


    }

    public static function listarAmigos()
    {
        $pdo = \Sistema\MySql::connect();

        $amizades = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND status = 1) OR (recebeu = ? AND status = 1)");

        $amizades->execute(array($_SESSION['id'], $_SESSION['id']));

        $amizades = $amizades->fetchAll();
        $amigosConfirmados = array();
        foreach ($amizades as $key => $value) {
            if ($value['enviou'] == $_SESSION['id']) {
                $amigosConfirmados[] = $value['recebeu'];
            } else {
                $amigosConfirmados[] = $value['enviou'];
            }
        }

        $listaAmigos = array();

        foreach ($amigosConfirmados as $key => $value) {
            $listaAmigos[$key]['nome'] = self::getUsuarioById($value)['nome'];
            $listaAmigos[$key]['email'] = self::getUsuarioById($value)['email'];
            $listaAmigos[$key]['img'] = self::getUsuarioById($value)['img'];


        }

        return $listaAmigos;

    }




}


?>

