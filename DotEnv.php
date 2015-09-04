<?php
/**
 * User: Administrator
 * Date: 2015/6/4
 * Time: 14:30
 */

namespace Snowair\Think\Behavior;


use josegonzalez\Dotenv\Loader;

class DotEnv {

    public function app_begin( &$params )
    {
        $path =  dirname(APP_PATH);
        $env_file = $path.'/.env';
        if (file_exists($env_file)) {
            $Loader = new Loader($env_file);
            $env = $Loader
                ->setFilters(['Snowair\Think\Dotenv\Filter\DotArray'])
                ->parse()->toArray();
            C($env);
        };
    }
}