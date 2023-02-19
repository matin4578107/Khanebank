<?php namespace Classes;
    use Contracts\ProductI;

    class Product implements ProductI {
        public function __construct(public string $product_name, public float $product_cost, public int $product_count, public string $product_image, public int $product_id) {}
    }

?>