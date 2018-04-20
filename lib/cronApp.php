<?php
$pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
$time = time();
$query = 'select * from queue;';
$stm = $pdo->query($query);//returned a PDO statement object
$stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
foreach ($stm as $row){
    $dif = $time - (int)$row['time'];
    if ($dif > 60){
        $query = 'delete from queue where url=\''.$row['url'].'\';';
        $pdo->query($query);//returned a PDO statement object
    }
}
?>