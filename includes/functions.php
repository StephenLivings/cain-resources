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
    $stmt = $conn->prepare('SELECT * FROM cain_resourceitems');
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0): 
    $_SESSION['message'] = array('type'=>'danger', 'msg'=>'There are no records currently stored in the database.');
else:
    while ($row = $result->fetch_assoc()){
        $data[] = $row;
    }
endif;
    $stmt->close();
    return $data;
}

/* select single statement */
function selectSingle($id = NULL) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM cain_resourceitems WHERE resource_keyid = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/*insert statement */
function insert($resource_title = NULL, $resource_cain = NULL, $resource_teacher = NULL, $resource_url = NULL, $resource_source = NULL, $resource_sectionni = NULL, $resource_sectionjunior = NULL, $resource_sectionleaving = NULL, $resource_subsectionni = NULL, $resource_subsectionjunior = NULL, $resource_subsectionleaving = NULL, $resource_in_irl = NULL, $resource_year = NULL, $resource_info = NULL){
global $conn;
$stmt = $conn->prepare('INSERT INTO cain_resourceitems (resource_title, resource_cain, resource_teacher, resource_url, resource_source, resource_sectionni, resource_sectionjunior, resource_sectionleaving, resource_subsectionni, resource_subsectionjunior, resource_subsectionleaving, resource_in_irl, resource_year, resource_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('siisiiiiiiiiis', $resource_title, $resource_cain, $resource_teacher, $resource_url, $resource_source, $resource_sectionni, $resource_sectionjunior, $resource_sectionleaving, $resource_subsectionni, $resource_subsectionjunior, $resource_subsectionleaving, $resource_in_irl, $resource_year, $resource_info);
$stmt->execute();
$stmt->close();
$_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully added a record');
header('Location: update.php?id='.$conn->insert_id);
exit();
}


/*update statement */

function update($resource_title = NULL,$id){
global $conn;
$stmt = $conn->prepare('UPDATE cain_resourceitems SET resource_title =?, resource_cain=? WHERE resource_keyid=?');
$id = $_GET['id'];
$stmt->bind_param('sii', $resource_title, $resource_cain, $id);
$stmt->execute();
if($stmt->affected_rows === 0):
    $_SESSION['message'] = array('type'=>'danger', 'msg'=>'No changes were made.');
else:
    $_SESSION['message'] = array('type'=>'success', 'msg'=>'Record successfully updated');
endif;

$stmt->close();

}

/*delete statement */

function delete($id){
    global $conn;
    $stmt = $conn->prepare('DELETE FROM cain_resourceitems WHERE resource_keyid=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully deleted the record');
    header('Location: allfiles.php?');
    exit();
    }
?>