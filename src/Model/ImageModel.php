<?php


namespace App\Model;


use Symfony\Component\HttpClient\HttpClient;

class ImageModel
{
    /** @var int */
    private $w = 0;
    /** @var int */
    private $h = 0;
    /** @var string */
    private $id = '';
    /** @var string */
    private $path = '';

    public function __construct(array $data)
    {
        $this->h = $data['h'];
        $this->w = $data['w'];
        $this->id = md5($data['url']);

        set_time_limit (30);
        $image_path = __DIR__ . '/../../public/images/' . $this->id . '.jpg';
        if(!file_exists($image_path)){
            $client = HttpClient::create();
            $response = $client->request('GET', $data['url']);
            $data = '';
            if(200 == $response->getStatusCode()){
                $data = $response->getContent();
            }
            file_put_contents($image_path, $data);
        }

        if(filesize($image_path) > 0){
            $this->path = 'images/' . $this->id . '.jpg';
        }
    }

    public function __get($name)
    {
        switch ($name){
            case 'w':
            case 'h':
            case 'id':
            case 'path':
                return $this->$name;
        }

        throw new \InvalidArgumentException();
    }

    public function __isset($name)
    {
        switch ($name){
            case 'w':
            case 'h':
            case 'id':
            case 'path':
                return true;
        }

        return false;
    }
}
