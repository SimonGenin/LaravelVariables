<?php

namespace SimonGenin\LaravelVariables;

class LaravelVariables
{

    public function get($resource)
    {
        return config('variables.' . $resource);
    }

    public function __v($resource)
    {
        return $this->get($resource);
    }

    public function __invoke($resource)
    {
        return $this->get($resource);
    }

    public function __call($name, $arguments)
    {
        $extension = '';

        if ($arguments) {
            $extension = '.' . $arguments[0];
        }

        $resource = str_replace('_', '.', snake_case($name));
        return $this->get($resource . $extension);
    }

}
