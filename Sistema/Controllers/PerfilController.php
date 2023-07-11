<?php

namespace Sistema\Controllers;

class PerfilController
{
    public function index()
    {

        if (isset($_SESSION['login'])) {

            if (isset($_POST['atualizar'])) {

                $pdo = \Sistema\MySql::connect();

                $nome = strip_tags($_POST['nome']);
                $senha = $_POST['senha'];


                if ($senha != '') {
                    $senha = \Sistema\Bcrypt::hash($senha);
                    $atualizar = $pdo->prepare("UPDATE usuarios SET nome = ?, senha = ? WHERE id = ?");
                    $atualizar->execute(array($nome, $senha, $_SESSION['id']));
                    $_SESSION['nomeCompleto'] = $nome;

                } else {
                    $atualizar = $pdo->prepare("UPDATE usuarios SET nome = ? WHERE id = ?");
                    $atualizar->execute(array($nome, $_SESSION['id']));
                    $_SESSION['nomeCompleto'] = $nome;

                }

                if ($_FILES['file']['tmp_name'] != '') {

                    $file = $_FILES['file'];

                    $fileExt = explode('.', $file['name']);
                    $fileExt = $fileExt[count($fileExt) - 1];
                    if ($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg') {
                        //FORMATO VÁLIDO
                        //VALIDAR TAMANHO
                        $size = intval($file['size'] / 1024);
                        if ($size <= 300) {
                            $uniqueId = uniqid() . '.' . $fileExt;
                            $atualizarImagem = $pdo->prepare("UPDATE usuarios SET img = ? WHERE id = ?");
                            $atualizarImagem->execute(array($uniqueId, $_SESSION['id']));
                            move_uploaded_file($file['tmp_name'], 'C:\xampp\htdocs\social/images/' . $uniqueId);
                            $_SESSION['img'] = $uniqueId;
                            \Sistema\Utilidades::successPerfil("Seu perfil e foto foram atualizados. ");
                            \Sistema\Utilidades::redirect(INCLUDE_PATH . 'perfil');
                        } else {
                            \Sistema\Utilidades::dangerPerfil("Erro ao processar o arquivo.");
                            \Sistema\Utilidades::redirect(INCLUDE_PATH . 'perfil');
                        }
                    } else {
                        \Sistema\Utilidades::dangerPerfil("Erro ao processar o arquivo.");
                        \Sistema\Utilidades::redirect(INCLUDE_PATH . 'perfil');
                    }
                }

                \Sistema\Utilidades::successPerfil("Seu perfil foi atualizado com sucesso. ");
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'perfil');
            }



            \Sistema\Views\MainView::render('perfil');

        } else {
            \Sistema\Utilidades::danger('Você não está logado');
            \Sistema\Utilidades::redirect(INCLUDE_PATH);
        }
    }
}


?>

