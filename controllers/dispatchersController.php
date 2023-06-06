<?php
class dispatchersController extends controller
{

    public function __construct()
    {

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    public function index()
    {
        $data = array();
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        $data['dispatchers'] = $dispatchers->getList();
        $this->loadTemplate("dispatchers", $data);
    }

    public function create()
    {
        $data = array();
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        if (isset($_POST['company_name']) && !empty($_POST['company_name'])) {
            $company_name = addslashes($_POST['company_name']);
            $social_reason = addslashes($_POST['social_reason']);
            $cnpj = addslashes($_POST['cnpj']);
            $email = addslashes($_POST['email']);
            $site = addslashes($_POST['site']);
            $phone = addslashes($_POST['phone']);
            $mobile_phone = addslashes($_POST['mobile_phone']);
            $address_zipcode = addslashes($_POST['address_zipcode']);
            $address = addslashes($_POST['address']);
            $address2 = addslashes($_POST['address2']);
            $address_number = addslashes($_POST['address_number']);
            $address_neighb = addslashes($_POST['address_neighb']);
            $address_city = addslashes($_POST['address_city']);
            $address_state = addslashes($_POST['address_state']);

            $dispatchers->create($company_name, $social_reason, $cnpj, $email, $site, $phone, $mobile_phone, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state, 1);
            header("Location: " . BASE_URL . "dispatchers");
        }

        $this->loadTemplate("dispatchers_create", $data);
    }

    public function update($id)
    {
        $data = array();
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        if (isset($_POST['company_name']) && !empty($_POST['company_name'])) {
            $company_name = addslashes($_POST['company_name']);
            $social_reason = addslashes($_POST['social_reason']);
            $cnpj = addslashes($_POST['cnpj']);
            $email = addslashes($_POST['email']);
            $site = addslashes($_POST['site']);
            $phone = addslashes($_POST['phone']);
            $mobile_phone = addslashes($_POST['mobile_phone']);
            $address_zipcode = addslashes($_POST['address_zipcode']);
            $address = addslashes($_POST['address']);
            $address2 = addslashes($_POST['address2']);
            $address_number = addslashes($_POST['address_number']);
            $address_neighb = addslashes($_POST['address_neighb']);
            $address_city = addslashes($_POST['address_city']);
            $address_state = addslashes($_POST['address_state']);

            $dispatchers->update($id, $company_name, $social_reason, $cnpj, $email, $site, $phone, $mobile_phone, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state);
            header("Location: " . BASE_URL . "dispatchers");
        }

        $data['dispatchers_info'] = $dispatchers->getInfo($id);
        $this->loadTemplate("dispatchers_update", $data);
    }

    public function search()
    {
        $data = array();
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = addslashes($_POST['search']);
            $data['dispatchers'] = $dispatchers->search($search);
        }

        $this->loadTemplate("dispatchers_search", $data);
    }

    public function block($id)
    {
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        $dispatchers->changeStatus($id, 2);
        header("Location: " . BASE_URL . "dispatchers/update/" . $id);
    }

    public function unblock($id)
    {
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        $dispatchers->changeStatus($id, 1);
        header("Location: " . BASE_URL . "dispatchers/update/" . $id);
    }

    public function destroy($id)
    {
        $u = new Users();
        $dispatchers = new Dispatchers();
        $u->setLoggedUser();

        $dispatchers->destroy($id);
        header("Location: " . BASE_URL . "dispatchers");
    }
}
