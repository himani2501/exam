<?php

class Config
{
    private $HOSTNAME = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB = "book_movie";

    private $login = "login";

    public $conn;

    public function connect()
    {
        $this->conn = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB);
        return $this->conn;
    }


    public function insertdata($Name,$Email)
    {

        $this->connect();

        $query = "INSERT INTO Login (Name, Email) VALUES('$Name','$Email');";
        return mysqli_query($this->conn, $query); 

    }

    public function fetchdata()
    {
        $this->connect();

        $query = "SELECT * FROM Login;";

        $res = mysqli_query($this->conn, $query);
        return $res;
    }
    public function deletedata($id)
    {
        $this->connect();

        $query = "DELETE FROM Login WHERE Id = $id ;";

        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    public function fetchsingledata($id)
    {
        $this->connect();

        $query = "SELECT * FROM Login WHERE Id = $id ;";

        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    public function updatedata($Name,$Email,$id)
    {
        $this->connect();

        $query = "UPDATE Login SET Name = '$Name', Email = '$Email' WHERE Id = $id ;";
        
        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    public function insertmovie($name)
    {
        $this->connect();

        $isDepartment = $this->fetchsingledata($name);

        if ($isDepartment) {
            $query = "INSERT INTO $this->login (name) VALUES('$name');";

            return mysqli_query($this->conn, $query);
        } else {
            return false;
        }
    }
}
?>