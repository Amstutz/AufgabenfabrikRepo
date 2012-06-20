<?php
class NiveausController extends AppController {

	var $name = 'Niveaus';
	
	function index() {
		$this->Niveau->recursive = 0;
		$this->set('niveaus', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiges Kompetenzniveau', true));
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
		
		$this->set('niveau', $this->Niveau->read(null, $id), $this->paginate('Exercise', array('Exercise.lug_id LIKE' => $id)));	
	}

	function add() {
		if (!empty($this->data)) {
			$this->Niveau->create();
			if ($this->Niveau->save($this->data)) {
				$this->Session->setFlash(__('Das Kompetenzniveau wurde gespeichert.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Kompetenzniveau konnte nicht gespeichert werden.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Ungültiges Kompetenzniveau', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Niveau->save($this->data)) {
				$this->Session->setFlash(__('Die Änderung wurde gespeichert', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die Änderung konnte nicht gespeichert werden.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Niveau->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ungültiges Kompetenzniveau', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Niveau->delete($id)) {
			$this->Session->setFlash(__('Das Kompetenzniveau wurde gelöscht.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Das Kompetenzniveau konnte nicht gelöscht werden.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>