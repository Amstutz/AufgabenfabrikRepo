<?php
class LugsController extends AppController {

	var $name = 'Lugs';
	
	function index() {
		$this->Lug->recursive = 0;
		$this->set('lugs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültige LUG', true));
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
		
		$this->set('lug', $this->Lug->read(null, $id), $this->paginate('Exercise', array('Exercise.lug_id LIKE' => $id)));	

	}

	function add() {
		if (!empty($this->data)) {
			$this->Lug->create();
			if ($this->Lug->save($this->data)) {
				$this->Session->setFlash(__('Die LUG wurde gespeichert.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die LUG konnte nicht gespeichert werden.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Ungültige LUG', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Lug->save($this->data)) {
				$this->Session->setFlash(__('Die LUG wurde geändert.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die LUG konnte nicht geändert werden.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Lug->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültige Lug', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lug->delete($id)) {
			$this->Session->setFlash(__('Die LUG wurde gelöscht.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Die Lug konnte nicht gelöscht werden.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>