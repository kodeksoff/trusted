<?php

namespace App\Services;

class MetaBuilder
{
    public $title = null;
    public $description = null;

    public function title($title): string
    {
        return $this->title = $title .' - ' . config('app.name');
    }

    public function description($description): string
    {
        return $this->title = $description;
    }
}
