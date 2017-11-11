<?php

	$table = $action;
	$ajax = checkajax();
	if(!DEFINED('CORE')) include('core.php');


	if(!$ajax) {

		initlist();

		$cmsmain->assign('title','Bicycles');

		$data = getlistdata('SELECT *, 
	(SELECT IF(status="out",(SELECT CONCAT(firstname," ",lastname) FROM people WHERE id = people_id),"") FROM bicycle_transaction AS t WHERE t.bicycle_id = b.id ORDER BY transaction_date DESC LIMIT 1) AS user, 
	(SELECT IF(status="out",transaction_date,0) FROM bicycle_transaction AS t WHERE t.bicycle_id = b.id ORDER BY transaction_date DESC LIMIT 1) AS date
FROM bicycles AS b WHERE NOT b.deleted');

		addcolumn('text','Name','label');
		addcolumn('text','Rented out to','user');
		addcolumn('datetime','Date','date');
		
		listsetting('add', 'Add a new bike');

		$cmsmain->assign('data',$data);
		$cmsmain->assign('listconfig',$listconfig);
		$cmsmain->assign('listdata',$listdata);
		$cmsmain->assign('include','cms_list.tpl');

	} else {
		switch ($_POST['do']) {
		    case 'move':
				$ids = json_decode($_POST['ids']);
		    	list($success, $message, $redirect) = listMove($table, $ids);
		        break;

		    case 'delete':
				$ids = explode(',',$_POST['ids']);
		    	list($success, $message, $redirect) = listDelete($table, $ids);
		        break;

		    case 'copy':
				$ids = explode(',',$_POST['ids']);
		    	list($success, $message, $redirect) = listCopy($table, $ids, 'menutitle');

		        break;

		    case 'hide':
				$ids = explode(',',$_POST['ids']);
		    	list($success, $message, $redirect) = listShowHide($table, $ids, 0);
		        break;

		    case 'show':
				$ids = explode(',',$_POST['ids']);
		    	list($success, $message, $redirect) = listShowHide($table, $ids, 1);
		        break;
		}

		$return = array("success" => $success, 'message'=> $message, 'redirect'=>$redirect);

		echo json_encode($return);
		die();
	}
