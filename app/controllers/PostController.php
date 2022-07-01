<?php
namespace Controllers;

use Controllers\Controller;
use Models\PostModel;

class PostController extends Controller
{
    private $posts;

    public function __construct()
    {
        $this->posts = new PostModel();
        parent::__construct();
    }
    
    public function index()
    {
        $this->posts = new PostModel();
        $this->view->assign('posts', $this->posts->getPosts());
        $this->view->display('posts.php');
    }

    public function postView($id)
    {
        $this->view->assign('post', $this->posts->getPostByID($id));
        $this->view->display('post.php');
    }

    public function postList()
    {
        $this->view->assign('posts',$this->posts->getPosts());
        $this->view->display('post-list.php');
    }
}
?>