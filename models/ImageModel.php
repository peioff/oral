<?php
declare(strict_types=1);

class imageModel{
    private int $image_id;
    private $image_data;

    public function getId()
    {
        return $this->image_id;
    }
    public function getData(){
        return $this->image_data;
    }
    public function setId(int $image_id){
        $this->image_id = $image_id;
    }
    public function setData(string $image_data){
        $this->image_data = $image_data;
    }

}
