<?php
class GoalsController extends AppController {

	var $name = 'Goals';
	
	function index() {
		$this->Goal->recursive = 0;
		$this->set('goals', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiges Lernziel', true));
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
		
		$this->set('goal', $this->Goal->read(null, $id), $this->paginate('Exercise', array('Exercise.lug_id LIKE' => $id)));			
	}

	function add() {
		if (!empty($this->data)) {
			$this->Goal->create();
			if ($this->Goal->save($this->data)) {
				$this->Session->setFlash(__('Das Lernziel wurde gespeichert', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Lernziel konnte nicht gespeichert werden.', true));
			}
		}
		$competencies = $this->Goal->Competency->find('list');
		$aspects = $this->Goal->Aspect->find('list');
		$this->set(compact('competencies', 'aspects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Ungültiges Lernziel', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Goal->save($this->data)) {
				$this->Session->setFlash(__('Das Lernziel wurde geändert', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Lernziel konnte nicht gespeichert werden.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Goal->read(null, $id);
		}
		$competencies = $this->Goal->Competency->find('list');
		$aspects = $this->Goal->Aspect->find('list');
		$this->set(compact('competencies', 'aspects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiges Lernziel', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Goal->delete($id)) {
			$this->Session->setFlash(__('Das Lernziel wurde gelöscht', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Das Lernziel konnte nicht gelöscht werden', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>