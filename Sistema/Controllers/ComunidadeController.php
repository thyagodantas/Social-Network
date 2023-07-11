<?php

namespace Sistema\Controllers;

class ComunidadeController
{
    public function index()
    {

        if (isset($_SESSION['login'])) {
            \Sistema\Views\MainView::render('comunidade');

            if (isset($_GET['solicitarAmizade'])) {
                $idPara = (int) $_GET['solicitarAmizade'];
                if (\Sistema\Models\ComunidadeModel::solicitarAmizade($idPara)) {
                    \Sistema\Utilidades::friendMessage("Solicitação enviada.");
                } else {
                    \Sistema\Utilidades::friendMessageError("Ocorreu um erro ao solicitar amizade.");
                }
            }


        } else {
            \Sistema\Utilidades::danger('Você não está logado');
            \Sistema\Utilidades::redirect(INCLUDE_PATH);
        }
    }
}


?>

