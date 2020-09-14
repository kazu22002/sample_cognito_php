<?php

namespace App\Controllers;

use App\Cognito\CognitoClient;
use Aws\CognitoIdentity\Exception\CognitoIdentityException;

class BaseController extends Controller
{
    public function index(){
        $this->requireUnloginedSession();
        $this->view("base.index", []);
    }

    public function auth(){
        $this->requireLoginedSession();
        $this->view("base.auth", []);
    }

    public function authExec(){
        $this->requireUnloginedSession();
        if(!isset($_POST['id']) || !isset($_POST['password'])){
            $this->requireUnloginedSession();
            exit;
        }

        $id = $_POST['id'];
        $password = $_POST['password'];

        $client = new CognitoClient();
        try{
            $user = $client->getUser($id, $password);
        } catch (CognitoIdentityException $e){
            // ログイン完了後に / に遷移
            $this->requireLoginedSession();
            exit;
        }

        // ユーザ名をセット
        $_SESSION['username'] = $user->get('Username');

        header('Location: /auth.php');
        exit;
    }
}
