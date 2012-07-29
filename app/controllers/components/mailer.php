<?php
App::import('Component', 'Email');

class MailerComponent extends EmailComponent
{
  var $from = 'basket@basketsrl.com';
  var $sendAs = 'both';
  var $delivery = 'smtp';
  var $xMailer = 'Postman';
  var $smtpOptions = array(
    'port'=> 25,
    'host' => 'smtp.webfaction.com',
    'timeout' => 30,
    'username' => 'ovosodo_ingsw',
    'password' => '548ac132'
  );
}
?>