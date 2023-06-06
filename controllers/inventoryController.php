<?php
class inventoryController extends controller
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
        $data['users_list'] = $u->getList();

        $this->loadTemplate('inventory', $data);
    }
}
