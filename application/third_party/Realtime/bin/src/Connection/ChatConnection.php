<?php

namespace Chat\Connection;

use Chat\Repository\ChatRepositoryInterface;
use Ratchet\ConnectionInterface;

class ChatConnection implements ChatConnectionInterface
{
  private $connection;
  private $repository;

  public function __construct(ConnectionInterface $conn, ChatRepositoryInterface $repository)
  {
    $this->connection = $conn;
    $this->repository = $repository;
  }

  public function sendMsg($msg)
  {
    $this->send([        
        "msg"       => $msg
      ]);
  }

  public function getConnection()
  {
    return $this->connection;
  }

  private function send(array $data)
  {
	$this->connection->send(json_encode($data));
  }

}


?>
