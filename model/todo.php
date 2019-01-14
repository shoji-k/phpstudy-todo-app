<?php

class Todo {
    public $id;
    public $title;
    public $contents;
    public $created;
    
    public function set($data) {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->contents = $data['contents'];
        $this->created = $data['created'];
    }
}