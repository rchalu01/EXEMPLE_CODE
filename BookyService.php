<?php

class BookyService implements ServiceInterface
{
    private $clientHttp;

    /**
     * BookyService constructor.
     * @param ClientHttpInterface $clientHttp
     */
    public function __construct(ClientHttpInterface $clientHttp)
    {
        $this->clientHttp = $clientHttp;
        $this->clientHttp->configBaseUri($_SESSION['o_Client']->getAdresseBooky());
        $this->clientHttp->configAuth($_SESSION['o_Client']->getLoginBooky(), $_SESSION['o_Client']->getMdpBooky());
    }

    public function genererGestionnaireEquipement()
    {
        return new BookyAireGestionnaire($this->clientHttp, new ConvertisseurJsonBookyAire());
    }

    public function genererGestionnaireGroupe()
    {
        return new BookyGroupeGestionnaire($this->clientHttp, new ConvertisseurJsonBookyGroupe());
    }

    public function genererGestionnaireReservation()
    {
        return new BookyCreneauGestionnaire($this->clientHttp, new ConvertisseurJsonBookyCreneau());
    }
}
