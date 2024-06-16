<?php
if(!isset($_SESSION)){
  session_start();
}

if(!defined('SITE_URL')){
  define('SITE_URL','http://localhost/VoyaverseProject/');
}

class databaseConnection{
  private $hostname;
  private $username;
  private $password;
  private $dbname;
  public $conn;

  public function __construct(){
    $this->hostname = 'localhost';
    $this->username = 'dfoiwidm_voyaverse';
    $this->password = 'OtakuLover123';
    $this->dbname = 'dfoiwidm_voyaverse';

    $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    if($this->conn->connect_error){
      die("<h1>Database Connection Failed</h1>");
    }
  }
}

if(!function_exists('base_url')){
  function base_url($slug){
    return SITE_URL.$slug;
  }
}

if(!function_exists('head')){
  function head($page){
    $redirectTo = SITE_URL.$page;
    header("Location: $redirectTo");
    exit(0);
  }
}

if(!function_exists('redirect')){
  function redirect($message,$page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
  }
}

?>