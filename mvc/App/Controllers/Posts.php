<?php
    namespace App\Controllers;
    use \Core\BaseView;
    use \App\Models\Post;
    class Posts extends \Core\BaseController {
        public function indexAction() {
            $data = Post::getAll('student','*');
            BaseView::renderTemplate('Home/post.html',['data'=>$data]);

        }
        
    }
?>