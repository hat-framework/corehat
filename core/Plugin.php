<?php

namespace corehat\core;

abstract class Plugin{
    abstract public function LoadPlugin();
    abstract public function InstallPlugin();
    abstract public function UnstallPlugin();
}