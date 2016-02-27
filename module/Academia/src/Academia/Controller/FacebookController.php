<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Academia\Controller;

use Base\Controller\AbstractController;
use Academia\Model\Facebook;
use Zend\View\Model\ViewModel;

class FacebookController extends AbstractController
{
    /*@return Facebook*/
    private $objFacebook;
    private $objAPI;
    
    public function __construct(){
        $app_id = '1689762064573421';
        $app_secret = '135eac93828ff0e6eeecc6c9d1bad755';
        $urlCallback = 'http://201.53.197.189:2380/facebook/login';
        $this->objFacebook = new Facebook($app_id,$app_secret);
        $this->objFacebook->setUrl($urlCallback);
        
         $this->objAPI = new \Facebook\Facebook(array(
            'app_id' => $app_id,
            'app_secret' => $app_secret,
        ));
    }
    
    public function loginAction(){
        
        if(!isset($_SESSION['fb_access_token'])){
            $this->getToken();//cria e sala token na sessao
        }
        
        try {
          // Returns a `Facebook\FacebookResponse` object trazendo os campos listados
          $response = $this->objAPI->get('/me?fields=id,name,email,picture,gender,link', "".$_SESSION['fb_access_token']."");
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $user = $response->getGraphUser();
        
        if($this->verificaEmailExiste($user['email'])){
            return new ViewModel(
                array( 'usuarioFacebook' => $user)
            );
        }else{
             return new ViewModel(
                array('msgRetorno' => "Usuário não cadastado.")
            );
        }
    }
    
    private function getToken(){
        $helper = $this->objAPI->getRedirectLoginHelper();
        
        try {
          $accessToken = $helper->getAccessToken();
         // echo var_dump($acessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          $retorno = array('Graph returned an error: ' . $e->getMessage());
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          $retorno = array('Facebook SDK returned an error: ' . $e->getMessage());
          exit;
        }

        // Logged in
       // echo '<h3>Access Token</h3>';
       // var_dump($accessToken->getValue());

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $this->objAPI->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
       // echo '<h3>Metadata</h3>';
       // var_dump($tokenMetadata);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->objAPI->getApp()->getId());
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        
        $tokenMetadata->validateExpiration();

        if (! $accessToken->isLongLived()) {
          // Exchanges a short-lived access token for a long-lived one
          try {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
          } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
            exit;
          }
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;//sala token na sessao
        
        return new ViewModel(array(
            'retornoFB' => $retornoFB
        ));
    }
    
    public function getUrlLogin() {
            $helper = $this->objAPI->getRedirectLoginHelper(); 
            $permissions = ['email','user_likes'];
          
            $loginUrl = $helper->getLoginUrl($this->objFacebook->getUrl(), $permissions);
            return $loginUrl;
    }
    
    private function verificaEmailExiste($emailFB){        
        $em = $this->getEm();
        $query = "select l.email from Academia\Entity\Aluno a JOIN a.idLogin l where l.email = '".$emailFB."'";
        $list = $this->getEm()->createQuery($query)->getResult();//faz o select no banco de dados
        
        if($emailFB == $list[0]['email']){
            return true;//email existe
        }else{
            return false;//email não está cadastado no sistema
        }
    }
    
}
