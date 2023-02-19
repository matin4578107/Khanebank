<?php namespace Classes;

    use Classes\Comment;
    use Classes\Product;
    use Contracts\GSCommentI;

    class GSComment implements GSCommentI {
        private $comment_list = [];
        public function getComments(Product $product) {
            //read comments of product from db
            // return $this->comment_list;
            return array_filter(array_map("unserialize", $this->comment_list), fn($item) => $item->product_id == $product->product_id);
        }

        public function setComments(Product $product, string $comment_text) {
            //insert comments for product into db
            $this->comment_list[] = serialize(new Comment($comment_text, $product->product_id));
        }
    }

?>