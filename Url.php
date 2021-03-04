<?php
if(!empty($_GET['records'])){
  $login_Url = 'http://localhost:8080/password%20generation/my_restapi_login/Post/read.php'.urlencode($_GET['records']);
  $login_json = file_get_contents($login_Url);
  $login_array = json_decode($login_json,true);
  $login_array['records'];
}
?>