<?php
class Dispatchers extends model
{

	public function getList()
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM companies ORDER BY status ASC");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getInfo($id)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM companies WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getCount($school_id)
	{
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM students WHERE school_id = :school_id");
		$sql->bindValue(':school_id', $school_id);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];

		return $r;
	}

	public function create($company_name, $social_reason, $cnpj, $email, $site, $phone, $mobile_phone, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state, $status)
	{

		$sql = $this->db->prepare("INSERT INTO companies SET company_name = :company_name, social_reason = :social_reason, cnpj = :cnpj, email = :email, site = :site, phone = :phone, mobile_phone = :mobile_phone, address_zipcode = :address_zipcode, address = :address, address2 = :address2, address_number = :address_number, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, status = :status");
		$sql->bindValue(":company_name", $company_name);
		$sql->bindValue(":social_reason", $social_reason);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":mobile_phone", $mobile_phone);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->bindValue(":status", $status);
		$sql->execute();
	}

	public function update($id, $company_name, $social_reason, $cnpj, $email, $site, $phone, $mobile_phone, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state)
	{

		$sql = $this->db->prepare("UPDATE companies SET company_name = :company_name, social_reason = :social_reason, cnpj = :cnpj, email = :email, site = :site, phone = :phone, mobile_phone = :mobile_phone, address_zipcode = :address_zipcode, address = :address, address2 = :address2, address_number = :address_number, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":company_name", $company_name);
		$sql->bindValue(":social_reason", $social_reason);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":mobile_phone", $mobile_phone);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->execute();
	}

	public function changeStatus($id, $status)
	{
		$sql = $this->db->prepare("UPDATE companies SET status = :status WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":status", $status);
		$sql->execute();
	}

	public function destroy($id)
	{
		$sql = $this->db->prepare("DELETE FROM companies WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function search($search)
	{
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM companies WHERE company_name LIKE '%$search%' OR social_reason LIKE '%$search%'");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	// public function getInfoSeries($id, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("SELECT * FROM students_classes WHERE id = :id AND school_id = :school_id");
	// 	$sql->bindValue(':id', $id);
	// 	$sql->bindValue(':school_id', $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetch();
	// 	}

	// 	return $array;
	// }

	// public function importStudents($student_name, $id, $series_id, $school_id)
	// {
	// 	$student_class_id = $id;
	// 	for ($i = 0; $i < sizeof($student_name); $i++) {
	// 		$sql = $this->db->prepare("INSERT INTO students SET student_name = '$student_name[$i]', student_class_id = :student_class_id, series_id = :series_id, school_id = :school_id");
	// 		$sql->bindValue(':student_class_id', $student_class_id);
	// 		$sql->bindValue(':series_id', $series_id);
	// 		$sql->bindValue(':school_id', $school_id);
	// 		$sql->execute();
	// 	}
	// }
}
