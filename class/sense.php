<?php
class sense{
public function image(){
$id=isset($_GET['id']);
$query = "select image from user WHERE id = :id"; 
$stmt = $con->prepare( $query );
$stmt->bindParam(':id',$id);
$stmt->execute();
$num = $stmt->rowCount();
 
if( $num ){
    $row = $stmt->fetch(PDO::FETCH_ASSOC());
    header("Content-type: image/jpg");
    print $row['data'];
    exit;
}else{
    echo "Not found";
}

}
}
?>