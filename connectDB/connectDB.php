<!-- This PHP file for connect database MySQL && Open Session -->
<?php
  //Open session 
  session_start();
  /* Open database
  mysqli(localhost, DB Admin name, DB password, DB table) 
  In real server must use DB password for security(Hacking)*/
  $db = new mysqli("localhost","root","","cpdtdb");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>