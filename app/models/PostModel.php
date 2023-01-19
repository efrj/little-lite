<?php
namespace Models;

class PostModel
{
    private $posts;

    public function getPosts()
    {
        $jsonData = file_get_contents('http://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($jsonData, true);
        $this->posts = $posts;
        return $this->posts;
    }

    public function getPostByID($id)
    {
        $jsonData = file_get_contents('http://jsonplaceholder.typicode.com/posts/' . $id);
        $post = json_decode($jsonData, true);
        $this->posts = $post;
        return $this->posts;
    }
}
