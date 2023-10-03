<?php 

// In charge of all the CRUD operation with the assignment DB

function get_assignments_by_course($course_id){
    global $db;
    if ($course_id){
        $query = 'SELECT A.id, A.description, C.course_name FROM assignments A LEFT JOIN courses C ON A.course_id = C.course_id WHERE A.course_id = :course_id ORDER BY A.id';
        $statement = $db->prepare($query);
        $statement->bindValue('course_id',$course_id);

    }else{
        $query = 'SELECT A.id, A.description, C.course_name FROM assignments A LEFT JOIN courses C ON A.course_id = C.course_id ORDER BY C.course_id';
        $statement = $db->prepare($query);
        
    }

  
    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
}

//17min

function delete_assignment($assignment_id){
    global $db;
    $query = 'DELETE FROM assignments WHERE id =:assign_id';
    $statement = $db->prepare($query);
    $statement->bindValue('assign_id',$assignment_id);
    $statement->execute();
    $statement->closeCursor();

}

function add_assignment($course_id,$description){
    global $db;
    $query = 'INSERT INTO assignments (description, course_id) VALUES (:description, :course_id)';
    $statement = $db->prepare($query);
    $statement->bindValue('description',$description);
    $statement->bindValue('course_id',$course_id);
    $statement->execute();
    $statement->closeCursor();

}
?>