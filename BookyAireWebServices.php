<?php

class BookyAireWebServices implements AireGestionnaireInterface
{
    private $clientHttp;

    public function __construct(ClientHttpInterface $clientHttp)
    {
        $this->clientHttp = $clientHttp;
    }

    public function listerAires()
    {
        return $this->clientHttp->get('/aires', null);
    }

    public function listerAiresParGroupe($idGroupe)
    {
        return $this->clientHttp->get('/groupes/' . $idGroupe . '/aires', null);
    }
}
