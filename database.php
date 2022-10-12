<?php

class database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "phpcrudoop";
    private $mysqli = null;
    private $result = array();

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername,   $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->result = $this->mysqli;
        }
    }

    public function insertUser($fname, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (fname,email,pass) VALUES ('$fname','$email','$password')";

        $this->result = $this->mysqli->query($sql);
    }

    public function displayData($id)
    {
        $sql = "SELECT * FROM user where id=$id";
        $this->result = $this->mysqli->query($sql);
        if ($this->result->num_rows > 0) {
            $row =  $this->result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function displayAllData()
    {
        $sql = "SELECT * FROM user";
        $this->result = $this->mysqli->query($sql);
        if ($this->result->num_rows > 0) {
            $data = array();
            while ($row = $this->result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM user WHERE id=$id";
        $this->result = $this->mysqli->query($sql);
        if ($this->result == true) {
            header("Location:displaydata.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function updateData($fname, $email, $id)
    {
        $sql = "UPDATE user SET fname='$fname', email='$email' WHERE id= '$id'";

        $this->result = $this->mysqli->query($sql);
        if ($this->result == true) {
            header("Location:displaydata.php?msg2=update");
        } else {
            $this->errorMessage();
        }
    }

    public function filter($var)
    {
        $return = mysqli_real_escape_string($this->mysqli, $var);
        return $return;
    }

    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    public function errorMessage()
    {
        trigger_error("Error: " . mysqli_error($this->mysqli));
    }
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
