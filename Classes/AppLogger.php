<?php namespace Classes;
    interface LoggerI {
        public function log(string $messege);
    }

    class AppLogger {
        private $logger;

        public function setLogger(LoggerI $logger) {
            $this->logger = $logger;
        }

        public function getLogger() {
            return $this->logger;
        }

    }

    class Logger implements LoggerI {
        public function log(string $messege) {
            echo($messege . "</br>");
        }
    }
?>