<?php
class AspectsController extends AppController {
	var $name = 'Aspects';	
	
	function index() {
		$this->Aspect->recursive = 0;
		$this->set('aspects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiger Aspekt', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->loadModel('Lug');
		$Lug = $this->Lug->find('list');
		$this->loadModel('Goal');
		$Goal= $this->Goal->find('list');
		$this->loadModel('Aspect');
		$Aspect = $this->Aspect->find('list');		
		$this->loadModel('Competency');
		$Competency = $this->Competency->find('list');		
		$this->loadModel('Niveau');
		$Niveau = $this->Niveau->find('list');	
		$exercisesInCart = $this->Session->read('exercisesInCart');
		$this->set(compact('exercisesInCart'));			
		$this->set(compact('Lug','Goal','Competency','Niveau','Aspect' ));	
		
		$this->set('aspect', $this->Aspect->read(null, $id), $this->paginate('Exercise', array('Exercise.aspect_id LIKE' => $id)));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Aspect->create();
			if ($this->Aspect->save($this->data)) {
				$this->Session->setFlash(__('Der Handlungsaspekt wurde gespeichert.', true));
				$aspect = $this->Aspect->find('first',array('conditions' => array('name' => $this->data['Aspect']['name'])));
				$this->redirect(array('action' => 'view', $aspect['Aspect']['id']));
			} else {
				$this->Session->setFlash(__('Der Handlungsaspekt konnte nicht gespeichert werden.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Ungültiger Aspekt', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Aspect->save($this->data)) {
				$this->Session->setFlash(__('Die Änderung wurde gespeichert.', true));
				$aspect = $this->Aspect->find('first',array('conditions' => array('name' => $this->data['Aspect']['name'])));
				$this->redirect(array('action' => 'view', $aspect['Aspect']['id']));
			} else {
				$this->Session->setFlash(__('Der Handlungsaspekt konnte nicht gespeichert werden.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Aspect->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungülter Handlungsapekt', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Aspect->delete($id)) {
			$this->Session->setFlash(__('Der Handlungsaspekt wurde gelöscht.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Der Handlungsaspekt konnte nicht gelöscht werden', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>