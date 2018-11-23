<?php

/*
 * To change this license header, choose Licensphp://input',true);
  print_r($data);
  }e Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author nikhil
 */
class Login extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('common');
    }

    public function signUp() {
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "insert into user (first_name,last_name,email,password) values ('" . $data['firstName'] . "','" . $data['lastName'] . "','" . $data['email'] . "','" . $data['password'] . "')";
        $res = $this->common->insertUpdateDelete($sql);
        $data['success'] = $res;
        echo json_encode($data);
    }

    public function login() {
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "SELECT * from user where email='" . $data['emailLogin'] . "' AND password='" . $data['passwordLogin'] . "'";
        $res = $this->common->getData($sql);
        if (!empty($res)) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }

    public function index() {
        $this->load->view('task');
    }

    public function getAllData() {
        $sql = "SELECT * from student";
        $res = $this->common->getData($sql);
        echo json_encode($res);
    }

    public function postStudentData() {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id'])) {
            $sql = "update student set studentName='" . $data['studentName'] . "',fatherName='" . $data['fatherName'] . "',email='" . $data['email'] . "',contact='" . $data['contact'] . "' where id='" . $data['id'] . "'";
        } else {
            $sql = "insert into student (studentName,fatherName,email,contact) values ('" . $data['studentName'] . "','" . $data['fatherName'] . "','" . $data['email'] . "','" . $data['contact'] . "')";
        }
        $res = $this->common->insertUpdateDelete($sql);
        $data['success'] = $res;
        echo json_encode($data);
    }

    public function delete() {
        $sql = "delete from student where id=" . $_GET['id'];
        $res = $this->common->insertUpdateDelete($sql);
        if ($res) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }

}
