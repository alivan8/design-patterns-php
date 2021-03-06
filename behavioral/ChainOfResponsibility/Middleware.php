<?php

namespace Behavioral\ChainOfResponsibility;

abstract class Middleware {

    protected $next;

    public final function setNext (Middleware $middleware) {
        $this->next = $middleware;

        return $middleware;
    }

    public function process (Request $request) {
        if ($this->next) {
            return $this->next->process($request);
        } else {
            return true;
        }
    }
}