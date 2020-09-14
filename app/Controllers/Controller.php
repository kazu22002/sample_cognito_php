<?php

namespace App\Controllers;

Use eftec\bladeone\BladeOne;

class Controller
{
    protected function view($template, $params){
        $views = __DIR__ . '/../../resources/views';
        $cache = __DIR__ . '/../../resources/cache';
        $blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);
        echo $blade->run($template, $params);
    }

    function requireUnloginedSession()
    {
        // セッション開始
        @session_start();
        // ログインしていれば / に遷移
        if (isset($_SESSION['username'])) {
            header('Location: /auth.php');
            exit;
        }
    }

    function requireLoginedSession()
    {
        // セッション開始
        @session_start();
        // ログインしていなければ /login.php に遷移
        if (!isset($_SESSION['username'])) {
            header('Location: /index.php');
            exit;
        }
    }
}
