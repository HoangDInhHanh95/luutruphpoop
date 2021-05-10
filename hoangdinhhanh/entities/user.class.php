<?php
  require_once ("config/db.class.php");
  class user
  {
    public $userid;
    public $username;
    public $email;
    public $password;
    public function __construct($u_name,$u_email,$u_pass)
    {
      $this->username=$u_name;
      $this->email=$u_email;
      $this->password=$u_pass;
    }
    public function save()
    {
    $db = new db();
    $sql ="INSERT INTO users (username,email,password) VALUES ('".mysqli_real_escape_string($db->connect(),
    $this->username)."','".mysqli_real_escape_string($db->connect(),
    $this->email)."','".md5(mysqli_real_escape_string($db->connect(),
    $this->password))."')";
    $result = $db->query_execute($sql);
    return $result;
    }
    public static function checklogin($username,$password)
    {
      $password= md5($password);
      $db= new db();
      $sql ="INSERT INTO users where username='$username' AND password='$password'" ;
      $result = $db->query_execute($sql);
      return $result;
    }
  }

?>
