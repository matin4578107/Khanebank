<?php namespace Contracts;
    use Classes\Product;

    interface GSCommentI {
        public function getComments(Product $product);
        public function setComments(Product $product, string $comment_text);
    }

?>