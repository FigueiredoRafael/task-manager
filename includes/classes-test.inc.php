<?php 

class user{
    public $username;
    public $usermail;
    private $userCpf;
    public $userFname;
    public $userLname;
    public $userGender;
    public $userAddress;     

    function __construct($username, $usermail, $userCpf, $userFname, $userLname, $userGender, $userAddress) {
        $this->username = $username;
        $this->userMail = $usermail;
        $this->userCpf = $userCpf;
        $this->userFname = $userFname;
        $this->userLname = $userLname;
        $this->userGender = $userGender;
        $this->userAddress = $userAddress;

    }

}
class employeeTasks extends user {
    public $taskTitle;
    public $taskConclusion;
    public $taskReponsible;
    public $taskDescription;
    public $taskStatus;

    public function getTaskTitle () {
        return $this->taskTitle;
    }
    public function setTaskTitle ($taskTitle) {
        $this->taskTitle = $taskTitle;
    }
    public function getTaskConclusion () {
        return $this->taskConclusion;
    }
    public function setTaskConclusion ($taskConclusion) {
        $this->taskConclusion = $taskConclusion;
    }
    public function getTaskResponsible () {
        return $this->taskResponsible;
    }
    public function setTaskResponsible ($taskResponsible) {
        $this->taskResponsible = $taskResponsible;
    }
    public function getTaskDescription () {
        return $this->taskDescription;
    }
    public function setTaskDescription ($taskDescription) {
        $this->taskDescription = $taskDescription;
    }
    public function getTaskStatus () {
        return $this->taskStatus;
    }
    public function setTaskStatus ($taskStatus) {
        $this->taskStatus = $taskStatus;
    }
}

?>