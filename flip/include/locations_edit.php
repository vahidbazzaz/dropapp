<?

	include($_SERVER['DOCUMENT_ROOT'].'/flip/lib/functions.php');

	$table = 'locations';
	$action = 'locations_edit';

	if($_POST) {


		$handler = new formHandler($table);

		$savekeys = array('label', 'visible', 'camp_id');
		$id = $handler->savePost($savekeys);

		redirect('?action='.$_POST['_origin']);
	}

	$data = db_row('SELECT * FROM '.$table.' WHERE id = :id',array('id'=>$id));

	if (!$id) {
		$data['visible'] = 1;
	}

	// open the template
	$cmsmain->assign('include','cms_form.tpl');

	// put a title above the form
	$cmsmain->assign('title','Location');

	addfield('hidden','','id');
	addfield('text','Label','label');
	addfield('select', 'Camp', 'camp_id', array('required'=>true,'width'=>2, 'multiple'=>false, 'query'=>'SELECT id AS value, name AS label FROM camps ORDER BY name'));

	addfield('checkbox','Visible','visible',array('aside'=>true));
	

	// place the form elements and data in the template
	$cmsmain->assign('data',$data);
	$cmsmain->assign('formelements',$formdata);
	$cmsmain->assign('formbuttons',$formbuttons);

