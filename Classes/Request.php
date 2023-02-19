<?php namespace Classes;

    use Contracts\RequestI;

    class Request implements RequestI {

        public function input(string $field) {
            return $this->has($field) ? $this->all()[$field] : null;
        }

        public function all(): array {
            if($this->ispost()) {
                return array_map('htmlspecialchars', $_POST);
            }
            // return $_GET;
            return array_map('htmlspecialchars', $_GET);
        }

        public function ispost(): bool {
            return $_SERVER["REQUEST_METHOD"] == "POST";
        }

        public function has(string $field): bool {
            return isset($this->all()[$field]);
        }

    }

?>