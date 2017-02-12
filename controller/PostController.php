<?php
include('model/PostModel.php');
include('system/view.php');

class PostController
{
    private $posts;
    private $view;

    function __construct() {
        $this->posts = new PostModel();
        $this->view = new View();
    }
    
    public function index() {
        $this->view->assign('posts',$this->posts->getPosts());
        $this->view->display('view/posts.php');
    }

    public function postView($id) {
        $this->view->assign('post', $this->posts->getPostByID($id));
        $this->view->display('view/post.php');
    }

    public function postList() {
        $this->view->assign('posts',$this->posts->getPosts());
        $this->view->display('view/post_list.php');
    }
}
?>