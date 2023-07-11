<?php

namespace Sistema\Controllers;


class HomeController
{

    public function index()
    {

        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            \Sistema\Utilidades::redirect(INCLUDE_PATH);
        }


        if (isset($_SESSION['login'])) {
            //Renderizar a home do usuário


            //EXISTE PEDIDO DE AMIZADE?
            if (isset($_GET['recusarAmizade'])) {
                $idEnviou = (int) $_GET['recusarAmizade'];
                if (\Sistema\Models\ComunidadeModel::atualizarPedidoAmizade($idEnviou, 0)) {
                    \Sistema\Utilidades::dangerAmizade("Solicitação recusada.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else {
                    \Sistema\Utilidades::dangerAmizade("Ocorreu um erro.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                }
            } else if (isset($_GET['aceitarAmizade'])) {
                $idEnviou = (int) $_GET['aceitarAmizade'];
                if (\Sistema\Models\ComunidadeModel::atualizarPedidoAmizade($idEnviou, 1)) {
                    \Sistema\Utilidades::successAmizade("Solicitação aceita.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else {
                    \Sistema\Utilidades::dangerAmizade("Ocorreu um erro.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                }
            }

            //EXISTE POSTAGEM NO FEED?

            if (isset($_POST['post_feed'])) {

                if ($_POST['post_content'] == '') {
                    \Sistema\Utilidades::dangerAmizade("Seu post está vazio.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else if (strlen($_POST['post_content']) < 10) {
                    \Sistema\Utilidades::dangerAmizade("Seu post não pode conter menos de 10 caractéres.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else if (strlen($_POST['post_content']) > 600) {
                    \Sistema\Utilidades::dangerAmizade("Seu post não pode conter mais de 600 caractéres.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else {

                    \Sistema\Models\HomeModel::postFeed($_POST['post_content']);
                    \Sistema\Utilidades::successAmizade("Publicação postada.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                }

            }




            \Sistema\Views\MainView::render('home');
        } else {
            //Renderizar para criar conta

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                //VERIFICA SE O EMAIL É UM EMAIL
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    //Valida se o email é realmente um email
                    \Sistema\Utilidades::danger("Email inválido");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                }

                //VERIFICAR NO BANCO DE DADOS
                $verifica = \Sistema\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
                $verifica->execute(array($email));

                if ($verifica->rowCount() == 0) {
                    //NÃO EXISTE UM USUÁRIO COM ESTE EMAIL
                    \Sistema\Utilidades::danger("Não existe usuário com este email.");
                    \Sistema\Utilidades::redirect(INCLUDE_PATH);
                } else {
                    $dados = $verifica->fetch();
                    $senhaBanco = $dados['senha'];
                    if (\Sistema\Bcrypt::check($senha, $senhaBanco)) {
                        //APÓS VERIFICAR SENHA USUÁRIO LOGADO
                        $_SESSION['login'] = $dados['email'];
                        $_SESSION['id'] = $dados['id'];
                        $_SESSION['nome'] = explode(' ', $dados['nome'])[0];
                        $_SESSION['nomeCompleto'] = $dados['nome'];
                        $_SESSION['img'] = $dados['img'];
                        \Sistema\Utilidades::success('Logado com sucesso.');
                        \Sistema\Utilidades::redirect(INCLUDE_PATH);

                    } else {
                        //SENHA INCORRETA
                        \Sistema\Utilidades::danger('Email ou senha incorretos.');
                        \Sistema\Utilidades::redirect(INCLUDE_PATH);
                    }
                }


            }

            \Sistema\Views\MainView::render('login');
        }
    }



}


?>

