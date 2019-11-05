<?php

namespace App\Model;

class ViewingWindowModel
{
    const BASIC_KEYS = ['title', 'startDate', 'wayToWatch', 'endDate'];

    /** @var array */
    private $data = [];

    public function __construct(array $data)
    {
        foreach(self::BASIC_KEYS as $key){
            if(array_key_exists($key, $data)){
                $this->data[$key] = $data[$key];
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