<?php

    class M_Room {

        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function createRoom($data){
            $this->db->query('INSERT INTO rooms (
                
                name,
                type,
                capacity,
                current_availability,
                no_of_tables,
                no_of_chairs,
                no_of_boards,
                no_of_projectors,
                no_of_computers,
                is_ac,
                is_wifi,
                is_media,
                is_lecture,
                is_lab,
                is_tutorial,
                is_meeting,
                is_seminar,
                is_exam)
                VALUES (
                    
                    :name,
                    :type,
                    :capacity,
                    :current_availability,
                    :no_of_tables,
                    :no_of_chairs,
                    :no_of_boards,
                    :no_of_projectors,
                    :no_of_computers,
                    :is_ac,
                    :is_wifi,
                    :is_media,
                    :is_lecture,
                    :is_lab,
                    :is_tutorial,
                    :is_meeting,
                    :is_seminar,
                    :is_exam)');
            //Bind values
            // $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':current_availability', $data['current_availability']);
            $this->db->bind(':no_of_tables', $data['no_of_tables']);
            $this->db->bind(':no_of_chairs', $data['no_of_chairs']);
            $this->db->bind(':no_of_boards', $data['no_of_boards']);
            $this->db->bind(':no_of_projectors', $data['no_of_projectors']);
            $this->db->bind(':no_of_computers', $data['no_of_computers']);
            $this->db->bind(':is_ac', $data['is_ac']);
            $this->db->bind(':is_wifi', $data['is_wifi']);
            $this->db->bind(':is_media', $data['is_media']);
            $this->db->bind(':is_lecture', $data['is_lecture']);
            $this->db->bind(':is_lab', $data['is_lab']);
            $this->db->bind(':is_tutorial', $data['is_tutorial']);
            $this->db->bind(':is_meeting', $data['is_meeting']);
            $this->db->bind(':is_seminar', $data['is_seminar']);
            $this->db->bind(':is_exam', $data['is_exam']);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getRooms(){
            $this->db->query('SELECT * FROM rooms WHERE r_isDeleted = 0');

            $results = $this->db->resultSet();

            return $results;
        }

        public function updateRoom($data){
            $this->db->query('UPDATE rooms SET 
                name = :name,
                type = :type,
                capacity = :capacity,
                current_availability = :current_availability,
                no_of_tables = :no_of_tables,
                no_of_chairs = :no_of_chairs,
                no_of_boards = :no_of_boards,
                no_of_projectors = :no_of_projectors,
                no_of_computers = :no_of_computers,
                is_ac = :is_ac,
                is_wifi = :is_wifi,
                is_media = :is_media,
                is_lecture = :is_lecture,
                is_lab = :is_lab,
                is_tutorial = :is_tutorial,
                is_meeting = :is_meeting,
                is_seminar = :is_seminar,
                is_exam = :is_exam
                WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':current_availability', $data['current_availability']);
            $this->db->bind(':no_of_tables', $data['no_of_tables']);
            $this->db->bind(':no_of_chairs', $data['no_of_chairs']);
            $this->db->bind(':no_of_boards', $data['no_of_boards']);
            $this->db->bind(':no_of_projectors', $data['no_of_projectors']);
            $this->db->bind(':no_of_computers', $data['no_of_computers']);
            $this->db->bind(':is_ac', $data['is_ac']);
            $this->db->bind(':is_wifi', $data['is_wifi']);
            $this->db->bind(':is_media', $data['is_media']);
            $this->db->bind(':is_lecture', $data['is_lecture']);
            $this->db->bind(':is_lab', $data['is_lab']);
            $this->db->bind(':is_tutorial', $data['is_tutorial']);
            $this->db->bind(':is_meeting', $data['is_meeting']);
            $this->db->bind(':is_seminar', $data['is_seminar']);
            $this->db->bind(':is_exam', $data['is_exam']);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getRoomById($id){
            $this->db->query('SELECT * FROM rooms WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deleteRoom($id){
            $this->db->query('UPDATE rooms SET r_isDeleted = 1 WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $id);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getCount(){
            $this->db->query('SELECT COUNT(*) AS count FROM rooms WHERE r_isDeleted = 0');
            $row = $this->db->single();
            return $row;
        }

    //a function to return true if the room exists else false
    public function roomExists($name){
        $this->db->query("SELECT * FROM rooms WHERE name = :name AND r_isDeleted = 0");
        $this->db->bind(':name', $name);
        $this->db->single();
        $row = $this->db->rowCount();
        if($row > 0){
            return true;
        } else {
            return false;
        }
    }

    //roomExists2($data['name'], $postId)
    public function roomExists2($name, $id){
        $this->db->query("SELECT * FROM rooms WHERE name = :name AND id != :id AND r_isDeleted = 0");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        $this->db->single();
        $row = $this->db->rowCount();
        if($row > 0){
            return true;
        } else {
            return false;
        }


    }
}








/*
    *Structure of the database table
    *id
    *name
    *type (lectureRoom, lab, meetingRoom)
    *capacity
    *current_availability
    *no_of_tables
    *no_of_chairs
    *no_of_boards
    *no_of_projectors
    *no_of_computers
    *is_ac
    *is wifi
    *is_media
    *is_lecture
    *is_lab
    *is_tutorial
    *is_meeting
    *is_seminar
    *is_exam
 */

