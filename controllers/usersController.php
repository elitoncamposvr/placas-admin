<?php
class usersController extends controller
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

		$this->loadTemplate('users', $data);
	}

	public function create()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();

		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$pass = addslashes($_POST['password']);

			$a = $u->create($email, $pass, 1, 2, 0);

			if ($a == '1') {
				header("Location: " . BASE_URL . "users");
			} else {
				$data['error'] = "E-mail já está cadastrado!";
			}
		}
		$this->loadTemplate('users_create', $data);
	}

	public function update($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();


		if (isset($_POST['password']) && !empty($_POST['password'])) {
			$pass = addslashes($_POST['password']);


			$u->update($pass, $id);
			header("Location: " . BASE_URL . "users");
		}
		$data['user_info'] = $u->getInfo($id);

		$this->loadTemplate('users_update', $data);
	}

	public function destroy($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();

		$u->destroy($id);
		header("Location: " . BASE_URL . "users");
	}

	public function block($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();

		$u->isBlock($id, 2);
		header("Location: " . BASE_URL . "users");
	}


	public function unblock($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();

		$u->isBlock($id, 1);
		header("Location: " . BASE_URL . "users");
	}


	// public function permissions()
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {

	// 		$permissions = new Permissions();
	// 		$data['permissions_list'] = $permissions->getList($u->getSchool());

	// 		$this->loadTemplate('permissions', $data);
	// 	} else {

	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }

	// public function permissions_group()
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {

	// 		$permissions = new Permissions();
	// 		$data['permissions_groups_list'] = $permissions->getGroupList($u->getSchool());

	// 		$this->loadTemplate('permissions_group', $data);
	// 	} else {

	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }


	// public function permissions_add()
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {
	// 		$permissions = new Permissions();

	// 		if (isset($_POST['name']) && !empty($_POST['name'])) {
	// 			$pname = addslashes($_POST['name']);
	// 			$permission_title = addslashes($_POST['permission_title']);
	// 			$permissions->add($pname, $permission_title, $u->getSchool());
	// 			header("Location: " . BASE_URL . "users/permissions");
	// 		}

	// 		$this->loadTemplate('permissions_add', $data);
	// 	} else {
	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }

	// public function permissions_add_group()
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {
	// 		$permissions = new Permissions();

	// 		if (isset($_POST['name']) && !empty($_POST['name'])) {
	// 			$pname = addslashes($_POST['name']);
	// 			$plist = $_POST['permissions'];

	// 			$permissions->addGroup($pname, $plist, $u->getSchool());
	// 			header("Location: " . BASE_URL . "users/permissions_group");
	// 		}

	// 		$data['permissions_list'] = $permissions->getList($u->getSchool());

	// 		$this->loadTemplate('permissions_addgroup', $data);
	// 	} else {
	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }

	// public function permissions_delete($id)
	// {

	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {
	// 		$permissions = new Permissions();
	// 		$permissions->delete($id);
	// 		header("Location: " . BASE_URL . "users/permissions");
	// 	} else {
	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }

	// public function permissions_delete_group($id)
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {
	// 		$permissions = new Permissions();
	// 		$permissions->deleteGroup($id);
	// 		header("Location: " . BASE_URL . "users/permissions_group");
	// 	} else {
	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }

	// public function permissions_edit_group($id)
	// {
	// 	$data = array();
	// 	$u = new Users();
	// 	$u->setLoggedUser();
	// 	$company = new Companies($u->getSchool());
	// 	$data['company_name'] = $company->getName();
	// 	$data['user_email'] = $u->getEmail();

	// 	if ($u->hasPermission('permissions_view')) {
	// 		$permissions = new Permissions();

	// 		if (isset($_POST['name']) && !empty($_POST['name'])) {
	// 			$pname = addslashes($_POST['name']);
	// 			$plist = $_POST['permissions'];

	// 			$permissions->editGroup($pname, $plist, $id, $u->getSchool());
	// 			header("Location: " . BASE_URL . "users/permissions_group");
	// 		}

	// 		$data['permissions_list'] = $permissions->getList($u->getSchool());
	// 		$data['group_info'] = $permissions->getGroup($id, $u->getSchool());

	// 		$this->loadTemplate('permissions_editgroup', $data);
	// 	} else {
	// 		header("Location: " . BASE_URL . "home/unauthorized");
	// 	}
	// }
}
