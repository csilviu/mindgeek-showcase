<?php


namespace App\Model;


class ShowcaseModel
{
    /** @var string */
    private $url = '';

    public function __construct(string $url){
        $this->url = $url;
    }

    public function getData(){
        $content = file_get_contents($this->url);
        $content_fixed_utf8 = iconv('UTF-8', 'UTF-8//IGNORE', $content);

        $data = json_decode($content_fixed_utf8, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException(json_last_error_msg());
        }

        return $data;
    }
}