<?php
class ExercisesController extends AppController
{

	var $name = 'Exercises';

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('stats', 'to_Cart', 'view_content');

	}

	// Add, Index, Edit and View/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function index($deleteViewContent = false)
	{
		$this->Exercise->recursive = 0;
		$this->Session->delete('exercisesForViewContent');
		$exercisesInCart = $this->Session->read('exercisesInCart');
		$this->set(compact('exercisesInCart'));
		$this->set('exercises', $this->paginate());
	}

	function view($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(__('Ungültige Übungsaufgabe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('exercise', $this->Exercise->read(null, $id));
	}

	function add()
	{
		if(!empty($this->data))
		{
			$this->Exercise->create();
			$user = $this->Exercise->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));			
			$this->Exercise->set('user_id', $user['User']['id']);
			if($this->Exercise->save($this->data))
			{
				$this->Session->setFlash(__('Die Testaufgabe wurde gespeichert', true));
				$exercise = $this->Exercise->find('first', array('conditions' => array('title' => $this->data['Exercise']['title'])));
				$this->redirect(array('action' => 'view', $exercise['Exercise']['id']));
			}
			else
			{
				$this->Session->setFlash(__('Die Testaufgabe konnte nicht gespeichert werden.', true));
			}
		}
		$lugs = $this->Exercise->Lug->find('list');
		$aspects = $this->Exercise->Aspect->find('list');
		$competencies = $this->Exercise->Competency->find('list');
		$goals = $this->Exercise->Goal->find('list');
		$niveaus = $this->Exercise->Niveau->find('list', array('order' => array('level ASC')));
		$this->set(compact('lugs', 'aspects', 'competencies', 'goals', 'niveaus'));
	}

	function edit($id = null)
	{
		if(!$id && empty($this->data))
		{
			$this->Session->setFlash(__('Ungültige Aufgabe', true));
			$this->redirect(array('action' => 'index'));
		}
		if(!empty($this->data))
		{
			if($this->Exercise->save($this->data))
			{
				$this->Session->setFlash(__('Die Änderung wurde gespeichert', true));
				$this->redirect(array('action' => 'view', $id));
			}
			else
			{
				$this->Session->setFlash(__('Die Aufgabe konnte nicht gespeichert werden..', true));
			}
		}
		if(empty($this->data))
		{
			$this->data = $this->Exercise->read(null, $id);
			$this->data['Exercise']['content'] = htmlspecialchars_decode($this->data['Exercise']['content']);
		}
		$lugs = $this->Exercise->Lug->find('list');
		$aspects = $this->Exercise->Aspect->find('list');
		$competencies = $this->Exercise->Competency->find('list');
		$goals = $this->Exercise->Goal->find('list');
		$niveaus = $this->Exercise->Niveau->find('list', array('order' => array('level ASC')));
		$this->set(compact('lugs', 'aspects', 'competencies', 'goals', 'niveaus'));
	}

	function delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(__('Die Aufgabe konnte nicht gelöscht werden.', true));
			$this->redirect(array('action' => 'index'));
		}
		if($this->Exercise->delete($id))
		{
			$this->Session->setFlash(__('Die Aufgabe wurde gelöscht.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Die Aufgabe konnte nicht gelöscht werden.', true));
		$this->redirect(array('action' => 'index'));
	}

	// Other/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function auto_select_goal()
	{

		if(($this->data['Exercise']['aspect_id'] == null) && ($this->data['Exercise']['competency_id'] == null))
		{
			$goals = $this->Exercise->Goal->find('list');
		} elseif($this->data['Exercise']['aspect_id'] == null)
		{
			$goals = $this->Exercise->Goal->find('list', array('conditions' => array('Goal.competency_id' => $this->data['Exercise']['competency_id'])));
		} elseif(($this->data['Exercise']['competency_id'] == null))
		{
			$goals = $this->Exercise->Goal->find('list', array('conditions' => array('Goal.aspect_id' => $this->data['Exercise']['aspect_id'])));
		}
		else
		{
			$goals = $this->Exercise->Goal->find('list', array('conditions' => array('Goal.aspect_id' => $this->data['Exercise']['aspect_id'], 'Goal.competency_id' => $this->data['Exercise']['competency_id'])));
		}
		$lugs = $this->Exercise->Lug->find('list');
		$aspects = $this->Exercise->Aspect->find('list');
		$competencies = $this->Exercise->Competency->find('list');

		$this->set(compact('lugs', 'aspects', 'competencies', 'goals'));
	}

	function auto_select_aspect()
	{
		if($this->data['Exercise']['goal_id'] != null)
		{
			$goals = $this->Exercise->Goal->find('list', array('conditions' => array('Goal.id' => $this->data['Exercise']['goal_id']), 'fields' => array('Goal.id', 'Goal.aspect_id')));
			$aspects = $this->Exercise->Aspect->find('list', array('conditions' => array('Aspect.id' => $goals[$this->data['Exercise']['goal_id']]['aspect_id'])));
		}
		else
		{
			$aspects = $this->Exercise->Aspect->find('list');
		}
		$lugs = $this->Exercise->Lug->find('list');
		$competencies = $this->Exercise->Competency->find('list');
		$goals = $this->Exercise->Goal->find('list');
		$this->set(compact('lugs', 'aspects', 'competencies', 'goals'));
	}

	function auto_select_competency()
	{
		if($this->data['Exercise']['goal_id'] != null)
		{
			$goals = $this->Exercise->Goal->find('list', array('conditions' => array('Goal.id' => $this->data['Exercise']['goal_id']), 'fields' => array('Goal.id', 'Goal.competency_id')));
			$competencies = $this->Exercise->Competency->find('list', array('conditions' => array('Competency.id' => $goals[$this->data['Exercise']['goal_id']]['competency_id'])));
		}
		else
		{
			$competencies = $this->Exercise->Competency->find('list');
		}
		$lugs = $this->Exercise->Lug->find('list');
		$aspects = $this->Exercise->Aspect->find('list');
		$goals = $this->Exercise->Goal->find('list');
		$this->set(compact('lugs', 'aspects', 'competencies', 'goals'));
	}

	function view_content($id = null, $class = null)
	{
		$temp = $this->Session->read('exercisesForViewContent');
		if(empty($temp[$id]) || !$temp[$id])
		{
			$view = true;
			$temp[$id] = true;

		}
		else
		{
			$view = false;
			$temp[$id] = false;
		}
		$this->Session->write('exercisesForViewContent', $temp);
		$content = $this->Exercise->find('list', array('conditions' => array('id' => $id), 'fields' => array('content')));
		$solution = $this->Exercise->find('list', array('conditions' => array('id' => $id), 'fields' => array('solution')));
		$description = $this->Exercise->find('list', array('conditions' => array('id' => $id), 'fields' => array('description')));
		$modified = $this->Exercise->find('list', array('conditions' => array('id' => $id), 'fields' => array('modified')));
		$userID = $this->Exercise->find('list', array('conditions' => array('id' => $id), 'fields' => array('user_id')));
		$user = $this->Exercise->User->find('list', array('conditions' => array('id' => $userID[$id]), 'fields' => array('name')));
		$this->set(array('view' => $view, 'class' => $class, 'content' => $content[$id], 'solution' => $solution[$id], 'description' => $description[$id], 'modified' => $modified[$id], 'user' => "RamirezZ"));
	}

	function to_Cart($id = null, $add = 0, $altrow = false)
	{
		$temp = $this->Session->read('exercisesInCart');
		if($add)
		{
			$temp[$id] = true;
		}
		else
		{
			unset($temp[$id]);
		}

		$this->Session->write('exercisesInCart', $temp);
		$this->set(compact('id', 'add', 'altrow'));
		$this->set(array('exercise' => $this->Exercise->read(null, $id)));
	}

	function stats($id = null)
	{

	}

}
?>