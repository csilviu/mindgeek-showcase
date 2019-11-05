<?php


namespace App\Model;


class MovieModel
{
    const BASIC_KEYS = [
        'body', 'class', 'cert', 'duration', 'headline', 'id', 'lastUpdated', 'sum', 'synopsis', 'url', 'year',
        'quote', 'rating', 'reviewAuthor', 'skyGoId', 'skyGoUrl', 'sgid', 'sgUrl'
    ];


/*
galleries
videos
*/

    /** @var array */
    private $data = [];

    public function __construct(array $data){
        foreach(self::BASIC_KEYS as $key){
            if(array_key_exists($key, $data)){
                $this->data[$key] = $data[$key];
            }else{
                $this->data[$key] = null;
            }
        }

        foreach(['cast', 'directors'] as $key){
            if(array_key_exists($key, $data)) {
                $this->data[$key] = [];
                foreach ($data[$key] as $person){
                    $this->data[$key][] = $person['name'];
                }
            }else{
                $this->data[$key] = null;
            }
        }

        foreach(['cardImages', 'keyArtImages'] as $key){
            if(array_key_exists($key, $data)){
                $this->data[$key] = [];
                foreach($data[$key] as $image_raw){
                    $this->data[$key][] = new ImageModel($image_raw);
                }
            }else{
                $this->data[$key] = null;
            }
        }

        foreach (['genres'] as $key) {
            if (array_key_exists($key, $data)) {
                $this->data[$key] = $data[$key];
            } else {
                $this->data[$key] = null;
            }
        }

        foreach(['viewingWindow'] as $key){
            if(array_key_exists($key, $data)){
                $this->data[$key] = new ViewingWindowModel($data[$key]);
            }else{
                $this->data[$key] = null;
            }
        }
    }

    public function __get($key){
        if(array_key_exists($key, $this->data)){
            switch ($key){
                default:
                    return $this->data[$key];
            }
        }

        throw new \InvalidArgumentException();
    }

    public function __isset($key){
        if(array_key_exists($key, $this->data)){
            return true;
        }

        return false;
    }
}
