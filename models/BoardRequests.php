<?php
class BoardRequests extends model
{

    public function getList()
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM boardrequests WHERE status = 1 OR status = 2");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getListAll($offset)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM boardrequests LIMIT $offset, 20");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getCountActive()
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests WHERE status = 1");
        $sql->execute();

        $row = $sql->fetch();
        $r = $row['c'];

        return $r;
    }

    public function getCountAll()
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests");
        $sql->execute();

        $row = $sql->fetch();
        $r = $row['c'];

        return $r;
    }

    public function getInfo($id)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM boardrequests WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getSearch($search)
	{

		$array = array();

		$sql = $this->db->prepare("SELECT * FROM boardrequests WHERE license_plate LIKE '%$search%' OR license_name LIKE '%$search%' OR cpf LIKE '%$search%'");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

    public function changeStatus($id, $status)
    {
        $sql = $this->db->prepare("UPDATE boardrequests SET status = :status WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':status', $status);
        $sql->execute();
    }
}
