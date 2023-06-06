<?php
class boardrequestsController extends controller
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
        $rq = new BoardRequests();

        $data['requests_list'] = $rq->getList();
        $data['requests_count'] = $rq->getCountActive();

        $this->loadTemplate('boardrequests', $data);
    }

    public function listall()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();
        $offset = 0;

        $data['p'] = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $data['p'] = intval($_GET['p']);
            if ($data['p'] == 0) {
                $data['p'] = 1;
            }
        }

        $offset = (20 * ($data['p'] - 1));

        $data['requests_list'] = $rq->getListAll($offset);
        $data['requests_count'] = $rq->getCountAll();
        $data['p_count'] = ceil($data['requests_count'] / 20);

        $this->loadTemplate("boardrequests_listall", $data);
    }

    public function show($id)
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $data['request_info'] = $rq->getInfo($id);
        $this->loadTemplate("boardrequests_show", $data);
    }

    public function search()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $search = addslashes($_POST['search']);

        $data['list_search'] = $rq->getSearch($search);
        $this->loadTemplate("boardrequests_search", $data);
    }

    public function aprove($id)
    {
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $rq->changeStatus($id, 2);
        header("Location: " . BASE_URL . "boardrequests/show/" . $id);
    }

    public function conclude($id)
    {
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $rq->changeStatus($id, 3);
        header("Location: " . BASE_URL . "boardrequests/show/" . $id);
    }

    public function deliver($id)
    {
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $rq->changeStatus($id, 5);
        header("Location: " . BASE_URL . "boardrequests/show/" . $id);
    }

    public function cancel($id)
    {
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $rq->changeStatus($id, 4);
        header("Location: " . BASE_URL . "boardrequests/show/" . $id);
    }
}
