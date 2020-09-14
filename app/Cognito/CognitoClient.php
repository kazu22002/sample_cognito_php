<?php

namespace App\Cognito;

use Aws\CognitoIdentity\Exception\CognitoIdentityException;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

class CognitoClient
{
    /** @var CognitoIdentityProviderClient */
    protected $client;
    protected $clientId;
    protected $clientSecret;
    protected $poolId;

    /**
     * CognitoClient constructor
     */
    public function __construct()
    {
        $this->client = new CognitoIdentityProviderClient([
            'profile' => $_ENV['AWS_COGNITO_PROFILE'],
            'region' => $_ENV['AWS_COGNITO_REGION'],
            'version' => '2016-04-18',
        ]);
        $this->poolId = $_ENV['AWS_COGNITO_POOL_ID'];
//        $this->clientId     = $clientId;
//        $this->clientSecret = $clientSecret;
    }

    public function getUser($id, $password)
    {
        $params = [
            'Username' => $id,
            'Password' => $password,
            'UserPoolId' => $this->poolId,
        ];
        try {
            $user = $this->client->adminGetUser($params);
//            $this->client->getUser();
        } catch (CognitoIdentityException $e) {
            throw $e;
        }
        return $user;
    }


    function generateToken()
    {
        // セッションIDからハッシュを生成
        return hash('sha256', session_id());
    }

    function validateToken($token)
    {
        // 送信されてきた$tokenがこちらで生成したハッシュと一致するか検証
        return $token === $this->generateToken();
    }
}
