<?php

class ServerConnection
{
  private $server;
  private $user;
  private $password;
  private $database;
  private $connection;
  private $result;
  public $query;
  public $record_count;

  public function __construct()
  {
    $this->server = 'localhost:3308';
    $this->user = 'root';
    $this->password = '';
    $this->database = 'bd_midnight';
  }

  private function create_connection()
  {
    $this->connection = mysqli_connect($this->server, $this->user, $this->password, $this->database)
      or die('<h3 style="color: tomato; font-family: Arial; top: 20px;">No se puede establecer conexión</h3>');
    return $this->connection;
  }

  private function close_connection()
  {
    return mysqli_close($this->connection);
  }

  public function execute_query()
  {
    $this->result = mysqli_query($this->create_connection(), $this->query);

    $this->close_connection();
    return $this->result;
  }

  public function get_records()
  {
    $this->result = mysqli_query($this->create_connection(), $this->query);
    $this->record_count = mysqli_num_rows($this->result);
    $records = $this->result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($this->result);
    $this->close_connection();
    return $records;
  }
}
