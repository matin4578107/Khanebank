<?php namespace Contracts;

    interface CommentI {
        public function __construct(string $text_comment, int $product_id, int $comment_id = null);
    }

?>