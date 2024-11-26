<?php

class Bucketlist
{
    // Proprties
    private $db;
    private $name;
    private $description;
    private $priority;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // Method to set buckets
    public function addBucket(string $name, string $description, string $priority): bool
    {
        if (!$this->setName($name))
            return false;
        if (!$this->setDescription($description))
            return false;
        if (!$this->setPriority($priority))
            return false;

        //Store in database
        $sql = "INSERT INTO m2_bucketlist (name, description, priority) VALUES ('" . $this->name . "','" . $this->description . "','" . $this->priority . "')";
        $result = $this->db->query($sql);

        return $result;
    }

    // Method to get buckets with highest priority
    public function getPrio1Buckets(): array
    {

        $sql = "SELECT * FROM m2_bucketlist WHERE priority = 1";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Method to get buckets with middle priority
    public function getPrio2Buckets(): array
    {

        $sql = "SELECT * FROM m2_bucketlist WHERE priority = 2";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Method to get buckets with lowest priority
    public function getPrio3Buckets(): array
    {

        $sql = "SELECT * FROM m2_bucketlist WHERE priority = 3";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Method to delete buckets
    public function deleteBucket(int $id) : bool {
        //Sanitize ID to avoid SQL Injection
        $id = $this->db->real_escape_string($id);

        //SQL query
        $sql = "DELETE FROM m2_bucketlist WHERE id = '$id'";

        // Execute query
        if ($this->db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    } 

    //Setters and getters

    // set name
    public function setName(string $name): bool {
        if($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        }
        return false;
    }

    // get name
    public function getName(): string {
        return $this->name;
    }

    // set description
    public function setDescription(string $description): bool {
        if($description != "") {
            $this->description = $this->db->real_escape_string($description);
            return true;
        }
        return false;
    }

    // get description
    public function getDescription(): string {
        return $this->description;
    }

        // set priority
        public function setPriority(string $priority): bool {
            if($priority != "") {
                $this->priority = $this->db->real_escape_string($priority);
                return true;
            }
            return false;
        }
    
        // get priority
        public function getPriority(): string {
            return $this->priority;
        }

    // Destruct
    function __destruct()
    {
        $this->db->close();
    }
}