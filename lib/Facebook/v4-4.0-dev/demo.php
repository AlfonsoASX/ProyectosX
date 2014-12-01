<?php

/**
Este archivo sirve para crear integraciones entre facebook y una web
se crea la variable $_FACEBOOK la cual contiene todo lo necesario para tratar el inicio de sesión y la obtención de datos del perfil

Depende de los permisos del app
*/
session_start();


$fb_dominio=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$appid = '679140768831904';
$appsecret = '2de0ba2650fc3ecfb1446d6d1400ae60';

require_once( 'src/Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'src/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'src/Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( 'src/Facebook/Entities/AccessToken.php' );
require_once( 'src/Facebook/Entities/SignedRequest.php' );
require_once( 'src/Facebook/FacebookSession.php' );
require_once( 'src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'src/Facebook/FacebookSignedRequestFromInputHelper.php' );
require_once( 'src/Facebook/FacebookRequest.php' );
require_once( 'src/Facebook/FacebookResponse.php' );
require_once( 'src/Facebook/FacebookSDKException.php' );
require_once( 'src/Facebook/FacebookRequestException.php' );
require_once( 'src/Facebook/FacebookOtherException.php' );
require_once( 'src/Facebook/FacebookAuthorizationException.php' );
require_once( 'src/Facebook/FacebookCanvasLoginHelper.php' );
require_once( 'src/Facebook/FacebookPageTabHelper.php' );
require_once( 'src/Facebook/GraphObject.php' );
require_once( 'src/Facebook/GraphSessionInfo.php' );
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookPageTabHelper;

FacebookSession::setDefaultApplication( $appid,$appsecret );
$helper = new FacebookRedirectLoginHelper( $fb_dominio.'?captar=1' );

if(isset($_GET['logout']))
{//Cerrar sesión
	unset($_SESSION['fb_token']);
}

if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) 
{
  $session = new FacebookSession( $_SESSION['fb_token'] );
  try 
  {
    if ( !$session->validate() ) 
    {
      $session = null;
    }
  } 
  catch ( Exception $e ) 
  {
    $session = null;
  }
}

if ( !isset( $session ) || $session === null ) 
{//Control de error del api de facebook
  try 
  {
    $session = $helper->getSessionFromRedirect();
  } 
  catch( FacebookRequestException $ex ) 
  {
    error_log("-------- ERROR DEL API DE FACEBOOK ----------".print_r( $ex ));
  } 
  catch( Exception $ex ) 
  {
    error_log("-------- ERROR DEL API DE FACEBOOK ----------".print_r( $ex ));
  }
}

if ( isset( $session ) ) 
{
  $_SESSION['fb_token'] = $session->getToken();
  $session = new FacebookSession( $session->getToken() );
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  $_FACEBOOK= array(
    'datosUsuario' => $response->getGraphObject()->asArray(), //Datos del usuario en array
    'btn' => '<a class="btn_fb" href="' . $fb_dominio .'?logout">Salir</a>'
  );
} 
else 
{
  $_FACEBOOK= array(
    'datosUsuario' =>array(), //Datos del usuario en array
    'btn' => '<a class="btn_fb" href="' . $helper->getLoginUrl() . '">Conéctate con facebook</a>'
  );
}

print_r($_FACEBOOK);