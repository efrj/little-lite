<?php

namespace Controllers;

use Core\Controller;
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
        $this->view->assign('posts', $this->posts->getPosts());
        $this->view->display('posts');
    }

    public function detail($id)
    {
        $this->view->assign('post', $this->posts->getPostByID($id));
        $this->view->display('post');
    }

    public function postList()
    {
        $this->view->assign('posts',$this->posts->getPosts());
        $this->view->display('post-list');
    }
}
?>