<?php namespace Contracts;

    interface RequestI {

        public function input(string $field);
        public function all(): array;
        public function ispost(): bool;
        public function has(string $field): bool;

    }

?>