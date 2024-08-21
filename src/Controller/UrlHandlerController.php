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

    public function fAQ()
    {
        return $this->redirect([
            'controller' => 'pages',
            'action' => 'faqs'
        ]);
    }

    public function aboutUs()
    {
        return $this->redirect([
            'controller' => 'pages',
            'action' => 'about_us'
        ]);
    }

    public function addBankAccount()
    {
        return $this->redirect([
            'controller' => 'schools',
            'action' => 'addBankAccount'
        ]);
    }

    public function updateBankAccount()
    {
        return $this->redirect([
            'controller' => 'schools',
            'action' => 'updateBankAccount'
        ]);
    }


    public function addSchoolLogo()
    {
        return $this->redirect([
            'controller' => 'schools',
            'action' => 'addSchoolLogo'
        ]);
    }


    public function updateSchoolLogo()
    {
        return $this->redirect([
            'controller' => 'schools',
            'action' => 'updateSchoolLogo'
        ]);
    }

}
