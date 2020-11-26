<?php

// if (isset($_POST['taskDelete'])) {

//     require "dbh.inc.php";
//     $taskId = $_POST['taskDelete'];

//     $sql = "DELETE FROM tasks WHERE taskId='$taskId'";
//     if ($conn->query($sql) === TRUE) {
//         echo "1";
//         header("Location: ../index.php?task-remove=success");
//     } else {
//         echo "2";
//         header("Location: ../index.php?task-remove=error");
//     }
//     $taskRemovedSuccessAlert;
//     exit();
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);


// } 


if (isset($_POST['task-submit'])) {
    require "dbh.inc.php";
    
    
    $taskTitle          = $_POST['task-title'];
    $taskResponsible    = $_POST['userId']; 
    $taskConclusionDate = $_POST['conclusion-date'];
    $taskDescription    = $_POST['task-description'];
    
    
    if (empty($taskTitle)) {
        header('Location: ../index.php?addtask-error=empty-title');
        exit();
    } elseif (empty($taskDescription)) {
        header('Location: ../index.php?addtask-error=empty-description');
        exit();
    } else {
        
        $sql = "INSERT INTO tasks (tasks_title, tasks_resp, tasks_concl, tasks_descr) VALUES ('$taskTitle', '$taskResponsible', '$taskConclusionDate', '$taskDescription')";
        mysqli_query($conn, $sql);
        
        header ("Location: ../index.php?addtask=success");
        $taskAddedSuccessAlert;
        exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
} else {
        
    if (isset($_POST['task_update_submit'])) {
        
        require 'dbh.inc.php';
        $taskId             = $_POST['task-id'];
        $taskTitle          = $_POST['task-title'];
        $taskResponsible    = $_POST['userId']; 
        $taskConclusionDate = $_POST['conclusion-date'];
        $taskDescription    = $_POST['task-description'];
        
        
        if (empty($taskTitle)) {
            header('Location: ../index.php?updatetask-error=empty-title');
            exit();
        } elseif (empty($taskDescription)) {
            header('Location: ../index.php?updatetask-error=empty-description');
            exit();
        } else {
            $sql = "UPDATE tasks SET tasks_title='$taskTitle', tasks_concl='$taskConclusionDate', tasks_descr='$taskDescription' WHERE taskId='$taskId'";
            if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?task-update=success");
            } else {
            header("Location: ../index.php?task-update=error");
            }
            $taskUpdatedSuccessAlert;
            exit();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

    } else if (isset($_POST["task_delete_submit"])) {

        require "dbh.inc.php";
        $taskId = $_POST['taskId'];

        $sql = "DELETE FROM tasks WHERE taskId='$taskId'";
        if ($conn->query($sql) === TRUE) {
            echo "1";
            exit();
        } else {
            echo "0";
            // header("Location: ../index.php?task-remove=error");
            exit();
        }
        $taskRemovedSuccessAlert;
        exit();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } else if (isset($_POST["task_user_action"])) {
        require "dbh.inc.php";
        $action = $_POST['action'];
        $taskId = $_POST['taskId'];
        if ($action == "start") {
            $sql = "SELECT tasks_stat FROM tasks WHERE taskId='$taskId'";
            $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['tasks_stat'] == "Em Progresso" || $row['tasks_stat'] == "Concluido") {
                        header('Location: ../index.php?updatetask-error=invalid-action-start');
                        exit();
                    } else {
                        $taskStat = "Em Progresso";
                        $sql = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                        if ($conn->query($sql) === TRUE) {
                            if(isset($POST['from-taskdetails'])) {
                                header("Location: ../index.php?task-update=success");
                                exit();
                            } else {
                            echo "1";
                            exit();
                            }
                        } else {
                            if(isset($POST['from-taskdetails'] )) {
                                header("Location: ../index.php?task-update=error");
                                exit();
                            } else {
                                echo "0";
                                exit();
                            }
                        }
                        $taskUpdatedSuccessAlert;
                        exit();
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }
                }
            
            } else if ($action == "finish") {
                $sql = "SELECT tasks_stat FROM tasks WHERE taskId='$taskId'";
                $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        if ($row['tasks_stat'] == "Concluido" ) {
                            header('Location: ../index.php?updatetask-error=invalid-action-finish'.$row['tasks_stat']);
                            exit();
                        } else {
                            $taskStat = "Concluido";
                            $sql = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                            if ($conn->query($sql) === TRUE) {
                                if(isset($POST['from-taskdetails'])) {
                                    header("Location: ../index.php?task-update=success");
                                    exit();
                                } else {
                                    echo "1";
                                    exit();
                                }
                            } else {
                                if(isset($POST['from-taskdetails'])) {
                                    header("Location: ../index.php?task-update=error");
                                    exit();
                                } else {
                                    echo "0";
                                    exit();
                                }
                            }
                            $taskUpdatedSuccessAlert;
                            exit();
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                        }
                    }
            
            }
        header('Location: ../index.php?updatetask-error=noaction-set');
        exit(); 
    
    } else {
        header('Location: ../index.php?updatetask-error=notask-updated');
        exit();
    }
    
}


    

?>