<?php namespace Classes;
    use Contracts\CommentI;
    
    class Comment implements CommentI {
        public function __construct(public string $text_comment, public int $product_id, public ?int $comment_id = null) {}
    }

?>