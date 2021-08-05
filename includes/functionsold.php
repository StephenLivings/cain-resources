<?php
require_once('connect.php');
session_start();

/* format arrays */
function formatcode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

}

/* select statement */
function selectAll(){
    global $conn;
    $data = array();
    $stmt = $conn->prepare('SELECT * FROM cain_temp');
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) 
    $_SESSION['message'] = array('type'=>'danger', msg=>'There are no records currently stored in the database.');
    $row = $result->fetch_assoc();
    while ($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

/* select single statement */
function selectSingle($id = NULL) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM cain_temp WHERE temp_keyid = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) echo ('No rows');
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/*insert staement */
function insert($temp_name = NULL){
global $conn;
$stmt = $conn->prepare('INSERT INTO cain_temp (temp_name) VALUES (?)');
$stmt->bind_param('s', $temp_name);
$stmt->execute();
$stmt->close();
header('Location: update.php?id='.$conn->insert_id);
}


/*update statement */

function update($temp_name = NULL,$id){
global $conn;
$stmt = $conn->prepare('UPDATE cain_temp SET temp_name =? WHERE temp_keyid=?');
$stmt->bind_param('si', $temp_name, $id);
$stmt->execute();
if($stmt->affected_rows === 0) echo ('No rows updated');
$stmt->close();

}

/*delete statement */

function delete($id){
    global $conn;
    $stmt = $conn->prepare('DELETE FROM cain_temp WHERE temp_keyid=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header('Location: allfiles.php?');
    }
?>