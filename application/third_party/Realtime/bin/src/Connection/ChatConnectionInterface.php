<?php

namespace Chat\Connection;

interface ChatConnectionInterface
{
  public function getConnection();

  public function sendMsg($msg);
}

?>
