<?php namespace Contracts;

    interface ProductI {
        public function __construct(string $product_name, float $product_cost, int $product_count, string $product_image, int $product_id);
    }

?>