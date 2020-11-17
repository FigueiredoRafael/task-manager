<?php



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
        
    if (isset($_POST['task-update-submit'])) {
        
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

    } else if (isset($_POST["task-delete-submit"])) {

        require "dbh.inc.php";
        $taskId = $_POST['task-id'];

        $sql = "DELETE FROM tasks WHERE taskId='$taskId'";
        if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?task-remove=success");
        } else {
        header("Location: ../index.php?task-remove=error");
        }
        $taskRemovedSuccessAlert;
        exit();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } else if (isset($_POST["task-user-action"])) {
        require "dbh.inc.php";
        $action = $_POST['user-action'];
        $taskId = $_POST['taskId'];
    
        if ($action == "start") {
            $sql = "SELECT tasks_stat FROM tasks WHERE taskId='$taskId'";
            $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['tasks_stat'] == "Em Progresso" || $row['tasks_stat'] == "Concluido" ) {
                        header('Location: ../index.php?updatetask-error=invalid-action');
                        exit();
                    } else {
                        $taskStat = "Em Progresso";
                        $sql = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                        if ($conn->query($sql) === TRUE) {
                        header("Location: ../index.php?task-update=success");
                        } else {
                        header("Location: ../index.php?task-update=error");
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
                        if ($row['tasks_stat'] == "Aberto" || $row['tasks_stat'] == "Concluido" ) {
                            header('Location: ../index.php?updatetask-error=invalid-action');
                            exit();
                        } else {
                            $taskStat = "Concluido";
                            $sql = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                            if ($conn->query($sql) === TRUE) {
                            header("Location: ../index.php?task-update=success");
                            } else {
                            header("Location: ../index.php?task-update=error");
                            }
                            $taskUpdatedSuccessAlert;
                            exit();
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                        }
                    }
            
            } else {
            header('Location: ../index.php?updatetask-error=noaction-set');
            exit();
        }
        header('Location: ../index.php?addtask-error=notask-added');
        exit(); 
    
    } else {
        header('Location: ../index.php?updatetask-error=notask-updated');
        exit();
    }
    
}


    

?>