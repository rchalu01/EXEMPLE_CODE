<?php

class BookyAireGestionnaire implements AireGestionnaireInterface
{
    private $clientHttp;
    private $convertisseurJsonBookyAire;
    private $webServices;

    public function __construct(ClientHttpInterface $clientHttp, ConvertisseurJsonObjetInterface $convertisseurJsonBookyAire)
    {
        $this->clientHttp = $clientHttp;
        $this->convertisseurJsonBookyAire = $convertisseurJsonBookyAire;
        $this->webServices = new BookyAireWebServices($this->clientHttp);
    }

    public function listerAires()
    {
        return $this->convertisseurJsonBookyAire->convertirJsonEnListeObjets($this->webServices->listerAires()->getBody());
    }

    public function listerAiresParGroupe($idGroupe)
    {
        return $this->convertisseurJsonBookyAire->convertirJsonEnListeObjets($this->webServices->listerAiresParGroupe($idGroupe)->getBody());
    }
}
