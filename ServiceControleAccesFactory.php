<?php

class ServiceControleAccesFactory
{
    private $clientHttp;
    private $solutionControleAcces;

    public function __construct(ClientHttpInterface $clientHttp, $solutionControleAcces)
    {
        $this->clientHttp = $clientHttp;
        $this->solutionControleAcces = $solutionControleAcces;
    }

    public function genererServiceControleAcces()
    {
        if ($this->solutionControleAcces == 1) {
            return new BookyService($this->clientHttp);
        } else {
            return false;
        }
    }
}
