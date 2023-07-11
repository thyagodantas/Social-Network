<?php

namespace Sistema;

class Utilidades
{

    public static function redirect($url)
    {

        echo '<script>window.location.href="' . $url . '"</script>';
        die();

    }

    public static function alerta($mensagem)
    {
        echo '<script>alert("' . $mensagem . '")</script>';
    }

    public static function danger($mensagem)
    {
        $_SESSION['msg'] = "<div id='danger' class='alert alert-danger' role='alert'><i class='fa-regular fa-circle-exclamation'></i> " . $mensagem . "</div>";
    }

    public static function success($mensagem)
    {
        $_SESSION['msg'] = "<div id='danger' class='alert alert-success' role='alert'><i class='fa-solid fa-square-check'></i> " . $mensagem . "</div>";
    }

    public static function dangerAmizade($mensagem)
    {
        $_SESSION['amizadeAlert'] = "<div id='danger'><script>toastr.error('" . $mensagem . "')</script></div>";
    }

    public static function successAmizade($mensagem)
    {
        $_SESSION['amizadeAlert'] = "<div id='danger'><script>toastr.success('" . $mensagem . "')</script></div>";
    }

    public static function info($mensagem)
    {
        $_SESSION['msg'] = "<div id='danger' class='alert alert-info' role='alert'><i class='fa-regular fa-circle-info'></i> " . $mensagem . "</div>";
    }

    public static function friendMessage($mensagem)
    {
        echo '<script>toastr.success("' . $mensagem . '")</script>';

    }

    public static function friendMessageError($mensagem)
    {
        echo '<script>toastr.error("' . $mensagem . '")</script>';

    }

    public static function amizadePendente($mensagem)
    {
        echo '<script>setTimeout( function () {toastr.info("' . $mensagem . '")}, 1500)</script>';

    }

    public static function dangerPerfil($mensagem)
    {
        $_SESSION['msgPerfil'] = "<div id='Perfil' class='alert alert-danger' role='alert'><i class='fa-regular fa-circle-exclamation'></i> " . $mensagem . "</div>";
    }

    public static function successPerfil($mensagem)
    {
        $_SESSION['msgPerfil'] = "<div id='Perfil' class='alert alert-success' role='alert'><i class='fa-solid fa-square-check'></i> " . $mensagem . "</div>";
    }


}


?>

