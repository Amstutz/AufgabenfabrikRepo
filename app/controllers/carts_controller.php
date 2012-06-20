<?php
class CartsController extends AppController {

	var $name = 'Carts';
	
	function beforeFilter( ){
		parent::beforeFilter();
		$this->Auth->allow('delete_cart','preview_template','set_properties','download','remove_from_cart');
		
	}
	
	function index() {
		$date = getdate();
		$user = $this->Cart->User->find('first',array('conditions' => array('username' => $this->Auth->user('username'))));
		
		$cart = $this->Session->read('cart');
		if(empty($cart['title'])){$cart['title']="Testserie 1";}
		if(empty($cart['user_id'])){$cart['user_id']=null;}
		if(empty($cart['created_from'])){$cart['created_from']=$user['User']['name'];}
		if(empty($cart['template'])){$cart['template']="Standard";}
		if(empty($cart['date'])){$cart['date']=$date['year']. '-' .$date['mon']. '-' .$date['mday']    ;}

		$this->Session->write('cart',$cart);

		$this->Cart->recursive = 0;
		$this->loadModel('Lug');
		$Lug = $this->Lug->find('list');
		$this->loadModel('Exercise');
		$Exercise = $this->Exercise->find('all');
		$this->loadModel('Goal');
		$Goal= $this->Goal->find('list');
		$this->loadModel('Aspect');
		$Aspect = $this->Aspect->find('list');
		$this->loadModel('Competency');
		$Competency = $this->Competency->find('list');
		$this->loadModel('Niveau');
		$Niveau = $this->Niveau->find('list');
		$exercisesInCart = $this->Session->read('exercisesInCart');
		$this->set(compact('exercisesInCart','cart'));
		$this->set(compact('Lug','Goal','Competency','Niveau','Aspect','Exercise' ));
		$user = $this->Cart->User->find('first',array('conditions' => array('username' => $this->Auth->user('username'))));
		$this->set(compact('user'));		
		$this->set('carts', $this->paginate());
	}

	function load($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültige Testserie', true),fields);
			$this->redirect(array('action' => 'index'));
		}
		$cart = $this->Cart->find('first',array('conditions' => array('Cart.id' => $id),'fields' => array('user_id','created_from','title','template','show_solution','show_description','show_points','date')));
		unset($cart['Cart']['id']);
		$this->Session->delete('cart');
		$this->Session->write('cart',$cart['Cart']);
		$this->Session->delete('exercisesInCart');
		$exercisesInCart = array();

		foreach($cart['Item'] as $item)
		{
			$exercisesInCart[$item['exercise_id']]=true;
		}
		$this->Session->write('exercisesInCart',$exercisesInCart );
		$this->redirect(array('action' => 'index'));
	}

	function save() {
		//Testserie laden
		$user = $this->Cart->User->find('first',array('conditions' => array('username' => $this->Auth->user('username'))));
		$cart = $this->Session->read('cart');
		if(empty($cart['show_solution'])){$cart['show_solution']=0;}
		if(empty($cart['show_description'])){$cart['show_description']=0;}
		if(empty($cart['show_points'])){$cart['show_points']=0;}	

		//Teststerie speichern
		if($this->Cart->find('first',array('conditions' => array('title' => $cart['title'],'user_id'=>$user['User']['id']))))
		{
			$storredCart = $this->Cart->find('first',array('conditions' => array('title' => $cart['title'],'user_id'=>$user['User']['id'])));
			$this->Cart->updateAll(array('Cart.created_from'=>"'".$cart['created_from']."'",'Cart.template'=>"'".$cart['template']."'",'Cart.show_solution'=>$cart['show_solution'],'Cart.show_description'=>$cart['show_description'],'Cart.show_points'=>$cart['show_points'],'Cart.date'=>"'".$cart['date']."'"),array('Cart.id' => $storredCart['Cart']['id']));
			$this->Cart->updateAll(array('user_id'=>$user['User']['id']),array('Cart.id' => $storredCart ['Cart']['id']));
		}
		else 
		{
			$this->Cart->create();
			$this->Cart->set($cart);
			$this->Cart->set('user_id',$user['User']['id']);
			$this->Cart->save();
		}
		
		//Übungen der Testerie als Items speichern
		$cart = $this->Cart->find('first',array('conditions' => array('title' => $cart['title'])));
		$exercisesInCart = $this->Session->read('exercisesInCart');
			
		foreach($exercisesInCart as $exercise => $value)
		{
			if($value && !$this->Cart->Item->find('first',array('conditions' => array('cart_id'=>$cart['Cart']['id'],'exercise_id'=>$exercise))))
			{
				$this->Cart->Item->create();
				$this->Cart->Item->set('cart_id',$cart['Cart']['id']);
				$this->Cart->Item->set('exercise_id',$exercise);
				$this->Cart->Item->save();
			}
		}
		$items = $this->Cart->Item->find('list',array('conditions' => array('cart_id'=>$cart['Cart']['id']),'fields' => array('exercise_id')));
		foreach($items as $item)
		{
			$itemExists = false;
			foreach($exercisesInCart as $exercise => $value)
			{
					
				if($item ==$exercise)
				{
					$itemExists = true;
				}
			}
			if(!$itemExists)
			{
				$this->Cart->Item->deleteAll(array('cart_id'=>$cart['Cart']['id'],'exercise_id'=>$item));
			}
		}
		$this->Session->setFlash(__('Die Testserie wurde gespeichert', true));


		$this->redirect(array('action' => 'index'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cart', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cart->delete($id)) {
			$this->Session->setFlash(__('Die Testserie wurde gelöscht.', true));
			$items = $this->Cart->Item->deleteAll(array('cart_id'=>$id));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cart was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


	function remove_from_cart($id = null) {
		$temp = $this->Session->read('exercisesInCart');
		unset($temp[$id]);
		$this->Session->write('exercisesInCart',$temp);
		//$this->redirect(array('action' => 'index'));
		$this->set(compact('id'));
	}

	function set_properties($id = null) {
		$user = $this->Cart->User->find('first',array('conditions' => array('username' => $this->Auth->user('username'))));
		$date = getdate();
		$cart = $this->Session->read('cart');
		if(empty($cart['title'])){$cart['title']="Testserie 1";}
		if(empty($cart['user_id'])){$cart['user_id']=null;}
		if(empty($cart['created_from'])){$cart['created_from']=$user['User']['name'];}
		if(empty($cart['template'])){$cart['template']="Standard";}
		if(empty($cart['date'])){$cart['date']=$date['year']. '-' .$date['mon']. '-' .$date['mday']    ;}

		if (!empty($this->data))
		{
			$cart['title'] = $this->data['Cart']['title'];
			$cart['created_from'] = $this->data['Cart']['created_from'];
			$cart['template'] = $this->data['Cart']['template'];
			$cart['show_solution'] = $this->data['Cart']['show_solution'];
			$cart['show_points'] = $this->data['Cart']['show_points'];
			$cart['show_description'] = $this->data['Cart']['show_description'];
			$cart['date'] = $this->data['Cart']['date']['year']. '-' .$this->data['Cart']['date']['month']. '-' .$this->data['Cart']['date']['day'] ;

			$this->Session->write('cart',$cart);
			$this->Session->setFlash(__('Die Änderung wurde gespeichert', true));
			$this->redirect(array('action' => 'index'));
		}

		$this->Session->write('cart',$cart);
		$cart = $this->Session->read('cart');
		$this->set(compact('cart' ));
	}
	function delete_cart () {
		$this->Session->write('exercisesInCart',null);
		$this->redirect(array('action'=>'index'));
	}
	function save_cart () {

	}
	function preview_template() {
		$template = $this->data['Cart']['template'];
		$this->set(compact('template' ));
	}
	function download ($filename,$extension) {
		$this->loadModel('Exercise');
		$Exercise = $this->Exercise->find('all');
		$exercisesInCart = $this->Session->read('exercisesInCart');
		$cart = $this->Session->read('cart');
		$content =" ";
		$solution =" ";
		$description =" ";
		$totPoints = 0;
		$content = "<h1>Aufgaben</h1>";
		foreach ($Exercise as $exercise)
		{
			if(!empty($exercisesInCart[$exercise['Exercise']['id']]))
			{
				$content = $content."<h2>".$exercise['Exercise']['title']."</h2>";
				$content = $content.$exercise['Exercise']['content'];
				if(!empty($cart['show_points']))
				{
					$content = $content."Punktzahl: ____ von:  ".$exercise['Exercise']['points'];
					$totPoints +=$exercise['Exercise']['points'];
				}
			}
		}
		if(!empty($cart['show_points']))
		{
			$content = $content."<h1>Totale Punktzahl</h1>";
			$content = $content."Punktzahl: ____ von:  ".$totPoints;
		}
		if(!empty($cart['show_solution']))
		{
			$content = $content."<h1>Lösungen</h1>";
			foreach ($Exercise as $exercise)
			{
				if(!empty($exercisesInCart[$exercise['Exercise']['id']]))
				{
					$content  = $content."<h2>".$exercise['Exercise']['title']."</h2>";
					$content  = $content.$exercise['Exercise']['solution'];
				}
			}
		}
		if(!empty($cart['show_description']))
		{
			$content  = $content."<h1>Aufgabenbeschreibungen</h1>";
			foreach ($Exercise as $exercise)
			{
				if(!empty($exercisesInCart[$exercise['Exercise']['id']]))
				{
					$content = $content ."<h2>".$exercise['Exercise']['title']."</h2>";
					$content  = $content .$exercise['Exercise']['description'];
				}
			}
		}


		$k1=array("/Ä/"				,"/ä/"			,"/Ö/"			,"/ö/"			,"/Ü/"			,"/ü/"			) ;
		$k2=array('&Auml;'	,'&auml;'	,'&Ouml;'	,'&ouml;'	,'&Uuml;'	,'&uuml;'	);
		$content = preg_replace($k1, $k2, $content);
		$solution = preg_replace($k1, $k2, $solution );
		$description = preg_replace($k1, $k2, $description );

		require_once 'libs/phpdocx/classes/CreateDocx.inc';
		$docx = new CreateDocx();
		$docx->setTemplateSymbol('$');
		$docx->addTemplate(APP ."/media/templates/".$cart['template'].".docx");
		$docx->addTemplateVariable('Title', $cart['title']);
		$docx->addTemplateVariable('NameTeacher', "Erstellt von: ".$cart['created_from']);
		$docx->addTemplateVariable('NameStudent', 'Name: ________________');
		$docx->addTemplateVariable('Date',  $cart['date']);
		$docx->addTemplateVariable('content',$content,'html');
		//$docx->addTemplateVariable('solution',$solution,'html');
		//$docx->addTemplateVariable('description',$description,'html');

		$docx->createDocx(APP ."/media/".$cart['title']);

		$this->view = 'Media';
		$params = array(
		'id' => $cart['title'].".".$extension,
		'name' => $cart['title'],
		'download' => true,
		'extension' => $extension,
		'mimeType' => array('docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
		'path' => APP . 'media' . DS 
		);
		$this->set($params);
	}
}
?>