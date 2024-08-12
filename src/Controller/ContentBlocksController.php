<?php

namespace App\Controller;

use App\Controller\AppController;

use Cake\Routing\Router;

class ContentBlocksController extends AppController
{
public function index(){

// generate redirect URL
    $url = Router::url([
        'plugin' => 'ContentBlocks',
        'controller' => 'ContentBlocks',
        'action' => 'index'
    ]);

    // Redirect directly to the controller operation method in the plugin
    return $this->redirect($url);
}





}

