<?php

namespace App\Controller;

use App\View\AppView;

class UrlHandlerController extends AppController
{


    public function global()
    {
        return $this->redirect([
            'plugin' => 'ContentBlocks',
            'controller' => 'ContentBlocks',
            'action' => 'index'
        ]);
    }

    public function home()
    {
        return $this->redirect([
            'controller' => 'pages',
            'action' => 'display'
        ]);
    }

    public function about_us()
    {
        return $this->redirect([
            'controller' => 'pages',
            'action' => 'about_us'
        ]);
    }

    public function dashboard()
    {
        return $this->redirect([
            'controller' => 'pages',
            'action' => 'Admin_dashboard'
        ]);
    }

    public function logout()
    {
        return $this->redirect([
            'controller' => 'auth',
            'action' => 'logout'
        ]);
    }

    public function adduser()
    {
        return $this->redirect([
            'controller' => 'users',
            'action' => 'add'
        ]);
    }




}
