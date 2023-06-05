<?php
class homeController extends controller
{

    public function __construct()
    {

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index()
    {
        $data = array();
        $u = new Users();
		$u->setLoggedUser();


        $this->loadTemplate('home', $data);
    }

    public function unauthorized()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();

        $this->loadTemplate('unauthorized', $data);
    }
}
