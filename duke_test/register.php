<?php
class register {
    private $db_conn;

    function __construct($db_conn){
        $this->db_conn = $db_conn;
    }

    public function defaultMethod() {
        // We can add back-end data verification here
        if ($this->db_conn->checkEmail($_POST['email'])) {
            echo json_encode(array('status'=>'failed', 'message'=>'This email address has been registered. Please use another one.'));
            return;
        }
        if ($this->db_conn->register(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['city'],
            $_POST['postal_code'],
            $_POST['unit_size'],
            $_POST['hear_about'],
            $_POST['price'],
            $_POST['broker'],
            $_POST['casl']
        )) {
            echo json_encode(array('status'=>'success'));
            return;
        } else {
            echo json_encode(array('status'=>'failed', 'message'=>'Database connection failed. Please try again later'));
            return;
        }
    }
}