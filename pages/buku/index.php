<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2022
 * Time: 15:22
 * @var $connection PDO
 */
try{
    /**
     * Prepare query
     */
    $statement = $connection->prepare("select * from buku order by created_at desc");
    $isOk = $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $reply['data'] = $results;
}catch (Exception $exception){
    $reply['error'] = $exception->getMessage();
    echo json_encode($reply);
    http_response_code(400);
    exit(0);
}

if(!$isOk){
    $reply['error'] = $statement->errorInfo();
    http_response_code(400);
}
/*
 * Query OK
 * set status == true
 * Output JSON
 */
$reply['status'] = true;
echo json_encode($reply);