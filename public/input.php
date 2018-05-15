<?php

ob_start();
session_start();

//いろいろな入力値の取得
/*
$name = (string)@$_POST['name'];
$name = @$_POST['name'] ?? ''; //PHP7以降
$name = (string)filter_input(INPUT_POST, 'name');
*/
/*
$name = @$_POST['name'] ?? '';
$address = @$_POST['address'] ?? '';
$body = @$_POST['body'] ?? '';
*/

$params = ['name', 'address', 'body'];
$input_data = [];
foreach($params as $p){
	$input_data[$p] = @$_POST[$p] ?? '';
}
//var_dump($input_data);

//valudate
$error_flg = [];
//「address と body」は必須入力

if('' === $input_data['address']){
	$error_flg['address_empty'] = 1;
}
if('' === $input_data['body']){
	$error_flg['body_empty'] = 1;
}
//
if([] != $error_flg){
	$_SESSION['input'] = $input_data;
	$_SESSION['error'] = $error_flg;
	
	//エラーが発生してる！
	header('Location: ./form.php');
	exit;
}


//DBへのINSERT


//
exit;
header('Location: fin.html');