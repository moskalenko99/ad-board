<?php

use ad\Router;

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^second$', ['controller' => 'Main', 'action' => 'second']);
Router::add('^create-author$', ['controller' => 'Main', 'action' => 'createAuthor']);
Router::add('^post-author$', ['controller' => 'Main', 'action' => 'saveAuthor']);
Router::add('^save-post$', ['controller' => 'Main', 'action' => 'savePost']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');