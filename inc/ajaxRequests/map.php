<?php 

include "../../config.php";

if(isset($_POST['lat']) && isset($_POST['lng'])){
    
    $lat=$_POST['lat'];
    $lon=$_POST['lng'];
    echo json_decode(Server::sendRequest("https://map.ir/reverse",['lat'=>$lat,'lon'=>$lon],"get",['x-api-key'=>'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2In0.eyJhdWQiOiIxMzYzNiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2IiwiaWF0IjoxNjE4OTgzNTcxLCJuYmYiOjE2MTg5ODM1NzEsImV4cCI6MTYyMTU3NTU3MSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.WEx2apjQCZ56KFgqBiw0n1SOGTv5QIPzNuRSa54wkaAexEqhLXgNvUV7qa-7RDjBlYe44SQtJMM8XJvcIOpsmRK1g-ZsUeiAafuWjGJAax_whkDOutwQxXvUL-Zpp0yhbNfBA8tMdFpcJwIWJPZvvOYvE-Eo_TivRT0qDX0nRizQKfwRPFQjzd7h36U1_b2U6Ole_4wPUERRlJAMaQbZAr3sM6L12vJtZEc_7k_a12WDphx13poN6M2PrFA7UkeAMwWg93YN7DEDyza7n3oFNQDXxQTEQvNYZMper4xWnWCKRncoAv3YZh0MCBu-ehq9jZCKWozFodCWNUKTRakoBA']))->address_compact;
}
