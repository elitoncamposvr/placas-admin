<?php
class Users extends model
{

	private $userInfo;

	public function isLogged()
	{

		if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
			return true;
		} else {
			return false;
		}
	}

	public function doLogin($email, $password)
	{

		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password AND status = 1 AND type_user = 2");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':password', md5($password));

		$sql->execute();


		if ($sql->rowCount() > 0) {
			$row = $sql->fetch();

			$_SESSION['ccUser'] = $row['id'];

			return true;
		} else {
			return false;
		}
	}

	public function setLoggedUser()
	{
		if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
			$id = $_SESSION['ccUser'];

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$this->userInfo = $sql->fetch();
			}
		}
	}

	public function logout()
	{
		unset($_SESSION['ccUser']);
	}

	public function getCompany()
	{
		if (isset($this->userInfo['id_company'])) {
			return $this->userInfo['id_company'];
		} else {
			return 0;
		}
	}
	public function getEmail()
	{
		if (isset($this->userInfo['email'])) {
			return $this->userInfo['email'];
		} else {
			return '';
		}
	}

	public function getId()
	{
		if (isset($this->userInfo['id'])) {
			return $this->userInfo['id'];
		} else {
			return '';
		}
	}

	public function getInfo($id)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}


	public function findUsersInGroup($id)
	{

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :group");
		$sql->bindValue(":group", $id);
		$sql->execute();
		$row = $sql->fetch();
		if ($row['c'] == '0') {
			return false;
		} else {
			return true;
		}
	}

	public function getList()
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM users WHERE type_user = 2");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function getListAll($school_id)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM users WHERE school_id = :school_id");
		$sql->bindValue(":school_id", $school_id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function create($email, $pass, $status, $type_user, $id_company)
	{
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();
		$row = $sql->fetch();

		if ($row['c'] == '0') {
			$sql = $this->db->prepare("INSERT INTO users SET email = :email, password = :password, status = :status, type_user = :type_user, id_company = :id_company");
			$sql->bindValue(":email", $email);
			$sql->bindValue(":password", md5($pass));
			$sql->bindValue(":status", $status);
			$sql->bindValue(":type_user", $type_user);
			$sql->bindValue(":id_company", $id_company);
			$sql->execute();

			return '1';
		} else {
			return '0';
		}
	}

	public function update($pass, $id)
	{
		if (!empty($pass)) {
			$sql = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
			$sql->bindValue(":password", md5($pass));
			$sql->bindValue(":id", $id);
			$sql->execute();
		}
	}

	public function destroy($id)
	{
		$sql = $this->db->prepare("DELETE FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function isBlock($id, $status)
	{
		$sql = $this->db->prepare("UPDATE users SET status = :status WHERE id = :id");
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}
