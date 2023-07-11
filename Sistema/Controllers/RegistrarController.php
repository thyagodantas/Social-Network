<?php

namespace Sistema\Controllers;

class RegistrarController
{

    //Calcular idade
    public function calculateAge($dob)
    {
        $dob = date("d-m-Y", strtotime($dob));

        $dobObject = new \Datetime($dob);
        $nowObject = new \DateTime();

        $diff = $dobObject->diff($nowObject);

        return $diff->y;

    }



    public function index()
    {

        if (isset($_POST['registrar'])) {
            $nome = $_POST['nome'];
            $nascimento = $_POST['nascimento'];
            $genero = $_POST['genero'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $datadecriacao = date("Y-m-d");
            $ultimoPost = "0000-00-00 00:00:00";



            if ($this->calculateAge($nascimento) < 18) {
                //Não permite menores de 18 anos
                \Sistema\Utilidades::danger('Você não tem 18 anos.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if ($this->calculateAge($nascimento) > 100) {
                //Não permite o cadastro de idades maiores que 100 anos
                \Sistema\Utilidades::danger('Idade inválida.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if ($nome == '') {
                //Verifica se o gênero está vazio
                \Sistema\Utilidades::danger('Você não informou seu nome.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if ($genero == '') {
                //Verifica se o gênero está vazio
                \Sistema\Utilidades::danger('Você não selecionou seu gênero.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //Valida se o email é realmente um email
                \Sistema\Utilidades::danger('Email inválido.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (strlen($senha) < 6) {
                //Evita senhas fracas
                \Sistema\Utilidades::danger('Sua senha é muito curta.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (\Sistema\Models\UsuariosModel::emailExists($email)) {
                //Não deixa repetir o email cadastrado
                \Sistema\Utilidades::danger('Este email já existe.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (\Sistema\Models\UsuariosModel::ipExists($ipaddress)) {
                //Verifica IP
                \Sistema\Utilidades::danger('Já possui conta com este IP.');
                \Sistema\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else {
                // Registrar usuário
                $senha = \Sistema\Bcrypt::hash($senha);
                $registro = \Sistema\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?, '')");
                $registro->execute(array($nome, $email, $senha, $nascimento, $genero, $ipaddress, $datadecriacao, $ultimoPost));

                \Sistema\Utilidades::success('Registrado com sucesso!');
                \Sistema\Utilidades::redirect(INCLUDE_PATH);

            }




        }

        \Sistema\Views\MainView::render('registrar');
    }



}


?>

