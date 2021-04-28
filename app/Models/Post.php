<?php


namespace App\Models;


class Post
{
    public function all($session){
        if(!$session->has('posts')){
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }

    public function byId($session,$id){
        return $this->all($session)[$id];
    }

    public function add($session, $title, $content){
        $posts = $this->all($session);
        array_push($posts, ['title'=>$title,'content'=>$content]);
        $session->put('posts',$posts);
    }

    public function edit($session, $id, $title, $content){
        $posts = $this->all($session);
        $posts[$id] = ['title' => $title, 'content' => $content];
        $session->put('posts', $posts);
    }

    private function createDummyData($session){
        $posts = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you right on track with Laravel!',
            ],
            [
                'title' => 'The next Steps',
                'content' => 'Understanding the Basics is great, but you need to be able to make the next steps.',
            ],
            [
                'title' => 'Something else',
                'content' => 'Some other content',
            ]
        ];
        $session->put('posts', $posts);
    }
}
