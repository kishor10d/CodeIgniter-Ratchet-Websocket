<?php

namespace Chat\Repository;

use Ratchet\ConnectionInterface;

interface ChatRepositoryInterface
{
  public function getClientByConnection(ConnectionInterface $conn);

  public function addClient(ConnectionInterface $conn);

  public function removeClient(ConnectionInterface $conn);

  public function getClients();
}

?>
