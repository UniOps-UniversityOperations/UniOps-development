<?php

class M_Lecturer {
    private $db;
    private $uid;

    public function __construct(){
        $this->db = new Database();
        $this->uid = $_SESSION['user_id'];
    }

    public function getTimeTable($current_Day) {
        $current_day = $current_Day;
        $this->db->query("SELECT * FROM lecturertimetables WHERE l_code = :uid AND day_of_week = :current_day ORDER BY start_time");
        $this->db->bind(':uid',$this->uid);
        $this->db->bind(':current_day',$current_day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "";
        }
    }

    public function viewRooms() {
        $this->db->query("SELECT * FROM rooms");
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function viewBookings($date,$roomId) {

        $sql = "SELECT
        rb.r_id,
        rb.start_time,
        rb.end_time,
        rb.event AS event,
        NULL AS subject,
        rb.booked_by AS booked_by
        FROM roombookings rb
        WHERE rb.r_id = :room_id and rb.booking_date = :dates
        UNION ALL
        SELECT
        lb.r_id,
        lb.start_time,
        lb.end_time,
        'Lecture' AS event,
        lb.subject AS subject,
        NULL AS booked_by
        FROM lecturebookings lb
        WHERE lb.r_id = :room_id and lb.day_of_week = :day_of_week
        ORDER BY start_time
        ";

        $day = date("l",strtotime($date));

        $this->db->query($sql);
        $this->db->bind(':room_id',$roomId);
        $this->db->bind(':dates',$date);
        $this->db->bind(':day_of_week',$day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function viewProfile() {
        $this->db->query("SELECT * FROM lecturers WHERE l_email = :uid");
        $this->db->bind(':uid',$this->uid);
        $result = $this->db->single();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function viewBookingGrid($dateSelected) {
        $sql = "SELECT 
        r.id,
        r.name,
        rb.booking_date AS date,
        rb.start_time,
        rb.end_time,
        rb.event AS booking_name,
        rb.booked_by,
        'event' AS booking_type
    FROM 
        rooms r
    LEFT JOIN 
        roombookings rb ON r.id = rb.r_id

        WHERE rb.booking_date = :dates
    
    UNION ALL
    
    SELECT 
        r.id,
        r.name,
        lb.day_of_week AS date,
        lb.start_time,
        lb.end_time,
        lb.subject AS booking_name,
        lb.type AS booked_by,
        'lecture' AS booking_type
    FROM 
        rooms r
    LEFT JOIN 
        lecturebookings lb ON r.id = lb.r_id AND lb.day_of_week = :day_of_week
        
    ORDER BY 
        id, start_time;
    
     
        ";

        $day = date("l",strtotime($dateSelected));

        $this->db->query($sql);
        $this->db->bind(':dates',$dateSelected);
        $this->db->bind(':day_of_week',$day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function roomBookingRequest($r_id,$booking_date,$startTime,$endTime,$purpose){

        $sql = "INSERT INTO roombookingrequests (r_id,request_date,start_time,end_time,purpose,requested_by) VALUES (?,?,?,?,?,?);";
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$booking_date);
        $this->db->bind(3,$startTime);
        $this->db->bind(4,$endTime);
        $this->db->bind(5,$purpose);
        $this->db->bind(6,$this->uid);
        return $this->db->execute();
    }

    public function viewAssignedSubjects(){
        $sql = 'SELECT assignedSubjects.subject_code,subjects.sub_name, subjects.sub_year, subjects.sub_stream, subjects.sub_semester, subjects.sub_credits 
        FROM assignedSubjects 
        INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code 
        INNER JOIN lecturers ON assignedSubjects.lecturer_code = lecturers.l_code
        WHERE lecturers.l_email = :uid';
        $this->db->query($sql);
        $this->db->bind(':uid',$_SESSION['user_id']);
        //return $this->db->execute();
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function viewPrefferedSubjects(){
        $sql = 'SELECT requestedsubjects.subject_code,subjects.sub_name, subjects.sub_year, subjects.sub_stream, subjects.sub_semester, subjects.sub_credits 
        FROM requestedsubjects 
        INNER JOIN subjects ON requestedsubjects.subject_code = subjects.sub_code 
        INNER JOIN lecturers ON requestedsubjects.lecturer_code = lecturers.l_code
        WHERE lecturers.l_email = :uid;';
        $this->db->query($sql);
        $this->db->bind(':uid',$_SESSION['user_id']);
        //return $this->db->execute();
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function numofLecHours() {
        $sql = 'SELECT
        day_of_week,
        SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time))/60 AS total_hours
        FROM
            lecturertimetables
        WHERE
            l_code = :l_email
        GROUP BY
            day_of_week
        ORDER BY
            FIELD(day_of_week, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        ';

        $this->db->query($sql);
        $this->db->bind(':l_email',$_SESSION['user_id']);
        $result = $this->db->resultSet();

        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function viewSubjects() {
        /* $sql = 'SELECT sub_code,sub_name,sub_year,sub_semester,sub_stream,sub_credits FROM SUBJECTS ORDER BY sub_stream,sub_year,sub_semester ASC;'; */
        $sql = "SELECT s.*
        FROM subjects s
        LEFT JOIN requestedsubjects r ON s.sub_code = r.subject_code
        WHERE r.lecturer_code IS NULL OR r.lecturer_code <> :uid;
        ";

        $this->db->query($sql);
        $this->db->bind(':uid',$_SESSION['user_id']);
        $result = $this->db->resultSet();

        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function timeTable() {
        

    }

    public function updateProfilePicture($fileDestination) {
        $sql = "UPDATE users SET profilePicture=:path WHERE user_id = :uid;";
        $this->db->query($sql);
        $this->db->bind(':path',$fileDestination);
        $this->db->bind(':uid',$_SESSION['user_id']);
        return $this->db->execute();
    }

    public function requestSubject($sub_code) {
        $sql = "INSERT INTO requestedsubjects (lecturer_code,subject_code) values (:uid,:sub_code);";
        $this->db->query($sql);
        $this->db->bind(':uid',$_SESSION['user_id']);
        $this->db->bind(':sub_code',$sub_code);
        return $this->db->execute();
    }
}