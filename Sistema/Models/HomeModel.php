<?php

namespace Sistema\Models;

class HomeModel
{

    public static function postFeed($post)
    {

        $pdo = \Sistema\MySql::connect();
        $post = str_replace("\n", '<br />', $post);
        //SUBSTITUIR IMAGEM PELA TAG
        if (preg_match('/\[imagem/', $post)) {
            $post = preg_replace('/(.*?)\[imagem=(.*?)\]/', '<p>$1</p><img src="$2"/>', $post);
        } else {
            $post = '<p>' . $post . '</p>';
        }
        //

        $blockedFunctions = array('eval', 'function', '<script>', '</script>', '<html>', '<body>', '<head>', 'echo', '<?', '?>', '<?php', 'exec', 'shell_exec', 'passthru', 'popen', 'proc_open', 'escapeshellcmd', 'escapeshellarg', 'phpinfo');

        foreach ($blockedFunctions as $function) {
            if (stripos($post, $function) !== false) {
                \Sistema\Utilidades::dangerAmizade("Não é permitido tags");
                \Sistema\Utilidades::redirect(INCLUDE_PATH);
                die();
            }
        }

        function quebra($string, $size)
        {
            $lenght = strlen($string);
            $temp = "";
            for ($i = 0; $i < $lenght; $i += $size) {
                $temp .= substr($string, $i, $size) . "<br>";
            }
            return $temp;
        }

        $post = quebra($post, 60);



        $postFeed = $pdo->prepare("INSERT INTO `posts` VALUES (null,?,?,?)");
        $postFeed->execute(array($_SESSION['id'], $post, date('Y-m-d H:i:s', time())));
        $atualizaUsuario = $pdo->prepare("UPDATE usuarios SET ultimo_post = ? WHERE id = ?");
        $atualizaUsuario->execute(array(date('Y-m-d H:i:s', time()), $_SESSION['id']));

    }

    public static function retrieveFriendsPosts()
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

            $listaAmigos[$key]['id'] = \Sistema\Models\ComunidadeModel::getUsuarioById($value)['id'];

            $listaAmigos[$key]['nome'] = \Sistema\Models\ComunidadeModel::getUsuarioById($value)['nome'];

            $listaAmigos[$key]['email'] = \Sistema\Models\ComunidadeModel::getUsuarioById($value)['email'];

            $listaAmigos[$key]['img'] = \Sistema\Models\ComunidadeModel::getUsuarioById($value)['img'];

            $listaAmigos[$key]['ultimo_post'] = \Sistema\Models\ComunidadeModel::getUsuarioById($value)['ultimo_post'];

        }


        usort($listaAmigos, function ($a, $b) {


            if (strtotime($a['ultimo_post']) > strtotime($b['ultimo_post'])) {

                return -1;

            } else {

                return +1;

            }

        });

        $posts = array();



        foreach ($listaAmigos as $key => $value) {


            $ultimoPost = $pdo->prepare("SELECT * FROM posts WHERE usuario_id = ? ORDER BY data DESC");

            $ultimoPost->execute(array($value['id']));


            $ultimoPost = $ultimoPost->fetchAll();
            foreach ($ultimoPost as $key2 => $value2) {
                $posts[$key2]['usuario'] = $value['nome'];
                $posts[$key2]['img'] = $value['img'];
                $posts[$key2]['data'] = $value2['data'];
                $posts[$key2]['conteudo'] = $value2['post'];

            }



        }


        $me = $pdo->prepare("SELECT * FROM usuarios WHERE id = $_SESSION[id]");
        $me->execute();
        $me = $me->fetch();


        if (isset($posts[0])) {

            if (strtotime($me['ultimo_post']) > strtotime($posts[0]['data'])) {



                $ultimoPost = $pdo->prepare("SELECT * FROM posts WHERE usuario_id = $_SESSION[id] ORDER BY data DESC");

                $ultimoPost->execute();

                $ultimoPost = $ultimoPost->fetch();

                array_unshift($posts, array('data' => $ultimoPost['data'], 'conteudo' => $ultimoPost['post'], 'me' => true));



            }


        }

        return $posts;



    }





}


?>

