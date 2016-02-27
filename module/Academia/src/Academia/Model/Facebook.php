<?php

namespace Academia\Model;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Facebook{
    private $fb;
    private $url;
    private $token;
    
    function getFb() {
        return $this->fb;
    }

    function getUrl() {
        return $this->url;
    }

    function setFb($fb) {
        $this->fb = $fb;
    }

    function setUrl($url) {
        $this->url = $url;
    }
    
    function getToken() {
        return $this->token;
    }

    function setToken($token) {
        $this->token = $token;
    }


}