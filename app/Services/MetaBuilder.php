<?php

namespace App\Services;

class MetaBuilder
{
    public $title = null;
    public $description = null;

    public function title($title): MetaBuilder
    {
        $this->title = $title .' - ' . config('app.name');

        return $this;
    }

    public function description($description): MetaBuilder
    {
        $this->description = $description;

        return $this;
    }
}
