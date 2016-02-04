<?php

/**
 * Author : Kishor Mali
 * Filename : Chat.php
 * 
 * Class : Chat
 * This class is used for accepting and broadcasting the socket request
 */

namespace Chat;

use Chat\Repository\ChatRepository;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
  	protected $repository;

	/**
	 * Default constructor of the class
	 */
  	public function __construct()
  	{
    	$this->repository = new ChatRepository;
  	}
	
	/**
	 * This function is used to add the connected machine to queue
	 * @param {object} $conn : Connection interface object
	 */
  	public function onOpen(ConnectionInterface $conn)
  	{
    	$this->repository->addClient($conn);
  	}

  	public function onClose(ConnectionInterface $conn)
  	{
    	$this->repository->removeClient($conn);
  	}

  	public function onError(ConnectionInterface $conn, \Exception $e)
  	{
    	echo "The following error occured : ". $e->getMessage();
		$client = $this->repository->getClientByConnection($conn);
    	if($client !== null)
    	{
      		$client->getConnection()->close();
      		$this->repository->removeClient($conn);
		}
  	}

  	public function onMessage(ConnectionInterface $conn , $msg)
  	{
    	$data = $this->parseMessage($msg);
    	$currClient = $this->repository->getClientByConnection($conn);
		
      	foreach ($this->repository->getClients() as $client)
      	{
      		$client->sendMsg($data->msg);
		}
    	
  	}

  	private function parseMessage($msg)
  	{
    	return json_decode($msg);
  	}
}

