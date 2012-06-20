<?php
class CompetenciesController extends AppController {

	var $name = 'Competencies';
	
	function index() {
		$this->Competency->recursive = 0;
		$this->set('competencies', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiger Kompetenzbereich', true));
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
		
		$this->set('competency', $this->Competency->read(null, $id), $this->paginate('Exercise', array('Exercise.aspect_id LIKE' => $id)));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Competency->create();
			if ($this->Competency->save($this->data)) {
				$this->Session->setFlash(__('Der Kompetenzbereich wurde gespeichert.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Der Kompetenzbereich konnte nicht gespeichert werden.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid competency', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Competency->save($this->data)) {
				$this->Session->setFlash(__('Die Änderung wurde gespeichert.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die Änderung konnte nicht gespeichert werden.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Competency->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiger Kompetenzbereich', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Competency->delete($id)) {
			$this->Session->setFlash(__('Der Kompetenzbereich wurde gelöscht.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Der Kompetenzbereich konnte nicht gelöscht werden.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>