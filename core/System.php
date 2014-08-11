<?php

namespace corehat\core;
abstract class System extends Object{
    
    public function start(){
        
    }
    
    /**
     * @abstract verify if some plugin exists
     * @param string $plugname
     * @return boolean true if plugin exists, false otherwise
     */
    public function plugin_exists($plugname){
        
    }
}