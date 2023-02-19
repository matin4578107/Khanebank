<?php namespace Contracts;

    interface DBI {
        public function setInfo(string $servername, string $username, string $password, string $connection_string);
    }

    interface ConnectionsI {
        public function connect();
    }

    abstract class DB implements DBI {
        protected $servername;
        protected $username;
        protected $password;
        protected $connection_string;
        protected $db_name;
        protected $connection;

        final protected function setInfo(string $servername, string $username, string $password, string $db_name) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->db_name = $db_name;
        }
    }

    class Mongo extends DB implements ConnectionsI {
        public function connect() {
            try {
                $this->connection_string = sprintf("mongodb://%s:%s@%s", $this->username, $this->password, $this->servername);
                $this->connection = new MongoDB\Client($this->connection_string);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    class MySQL extends DB implements ConnectionsI {
        public function connect() {
            try {
                $this->connection_string = sprintf('mysql:host=%s;dbname=%s', $this->servername, $this->db_name);
                $this->connection = new PDO($this->connection_string, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>