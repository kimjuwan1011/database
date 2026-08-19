<?php
// sql 작성 -> sql 검증 -> 실행 -> 데이터 가공 -> 응답

// 작성
$sql = "SELECT * FROM album";
// 검증
$result = $db->prepare($sql);
// 실행
$result->execute();
// 가공
$data = $result->fetchAll(PDO::FETCH_ASSOC);
//응답
header("Content-Type: application/json");
echo json_encode($data);
?>
