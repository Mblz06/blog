<?php

namespace App\Controller;

class Controller
{

    protected $twig;

    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader(BASE_PATH . '\src\views');

        $this->twig = new \Twig\Environment($loader, [

            'cache' => false,
        ]);
    }
}
