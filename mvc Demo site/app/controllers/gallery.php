<?php

class gallery
{
    public $arrayImages;
    public $title;

    public function show()
    {
        $this->arrayImages = glob('./img/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $this->title = "show of Gallery";
    }
    public function  add()
    {
        $this->title = "add of content";

        $this->cwd = getcwd();
    }

}
?>
