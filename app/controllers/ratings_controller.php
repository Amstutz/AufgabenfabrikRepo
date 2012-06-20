<?php
class RatingsController extends AppController
{

	var $name = 'Ratings';



	function back()
	{
		$index = $this->Session->read('ratingIndex');
		$index = $index - 1;
		$this->Session->write('ratingIndex', $index);
		if($index < 0)
		{
			$this->redirect(array('controller' => 'questionaries','action' => 'second',0));
		}
		else
		{
			$this->redirect(array('action' => 'add'));
		}
	}
	
	function continueRating()
	{
		$user = $this->Rating->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));	
		$index = $numExercises = $this->Rating->find('count', array('conditions' => array('Rating.user_id' => $user['User']['id'])));
		$this->Session->write('ratingIndex', $index);
		if($index>0)
		{
			$this->redirect(array('action' => 'add'));
		}
		else
			{
				$this->redirect(array('controller'=>'questionaries','action' => 'first'));				
			}
	}
	
	function add()
	{
		$index = $this->Session->read('ratingIndex');
		if(empty($index)||(!empty($index)&&$index<0))
		{
			$index = 0;
		}
		$numExercises = $this->Rating->Exercise->find('count');
		$user = $this->Rating->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
		if($user['User']['id']%2==0)
		{
			$exercises = $this->Rating->Exercise->find('all', array('order' => array('title DESC')));
		}
		else
			{
				$exercises = $this->Rating->Exercise->find('all', array('order' => array('title ASC')));
			}
		//Falls Daten gesendet wurden, letzte Übung speichern
		if(!empty($this->data))
		{
			if($this->data['Rating']['competency_id'] != null && $this->data['Rating']['aspect_id'] != null)
			{
				if(!empty($this->data['Rating']['comment']))
				{
					$comment = $this->data['Rating']['comment'];
				}
				else
				{
					$comment = "";
				}
				$exercise = $exercises[$index];

				if($this->Rating->find('first', array('conditions' => array('exercise_id' => $exercise['Exercise']['id'], 'Rating.user_id' => $user['User']['id']))))
				{
					$storredRating = $this->Rating->find('first', array('conditions' => array('exercise_id' => $exercise['Exercise']['id'], 'Rating.user_id' => $user['User']['id'])));
					$this->Rating->updateAll(array('user_id' => $user['User']['id'], 'exercise_id' => $exercise['Exercise']['id'], 'competency_id' => $this->data['Rating']['competency_id'], 'aspect_id' => $this->data['Rating']['aspect_id'], 'comment' => "'" . $comment . "'"), array('Rating.id' => $storredRating['Rating']['id']));
				}
				else
				{
					$this->Rating->create();
					$this->Rating->set(array('user_id' => $user['User']['id'], 'exercise_id' => $exercise['Exercise']['id'], 'competency_id' => $this->data['Rating']['competency_id'], 'aspect_id' => $this->data['Rating']['aspect_id'], 'comment' => "'" . $comment . "'", ));
					$this->Rating->save();
				}
				$index++;
				$this->Session->write('ratingIndex', $index);
			}
			else
			{
				$this->Session->setFlash(__('Bitte geben Sie einen Handlungsaspekt und einen Kompetenzbereich an.', true));
			}
		}
		if($index >= $numExercises)
		{
			$this->redirect(array('controller' => 'questionaries','action' => 'third'));
		}
		$exercise = $exercises[$index];

		if($this->Rating->find('first', array('conditions' => array('exercise_id' => $exercise['Exercise']['id'], 'Rating.user_id' => $user['User']['id']))))
		{
			$storredRating = $this->Rating->find('first', array('conditions' => array('exercise_id' => $exercise['Exercise']['id'], 'Rating.user_id' => $user['User']['id'])));
			$this->data = $this->Rating->read(null, $storredRating['Rating']['id']);
		}
		
		$this->loadModel('Goal');

		if(($this->data['Rating']['aspect_id'] != null) && ($this->data['Rating']['competency_id'] != null))
		{
			$goals = $this->Goal->find('list', array('conditions' => array('Goal.aspect_id' => $this->data['Rating']['aspect_id'], 'Goal.competency_id' => $this->data['Rating']['competency_id'])));
		}
		else
		{
			$goals = null;
		}
		
		$aspects = $this->Rating->Aspect->find('list');
		$competencies = $this->Rating->Competency->find('list');

		$this->set(compact('exercise', 'index', 'aspects', 'competencies','goals', 'numExercises','storredRating'));
	}

	function change_competency()
	{
		if($this->data['Rating']['competency_id'] != null)
		{
			$competency = $this->Rating->Competency->find('list', array('conditions' => array('Competency.id' => $this->data['Rating']['competency_id']), 'fields' => array('Competency.description')));
			$description = $competency[$this->data['Rating']['competency_id']];
		}
		else
		{
			$description = null;
		}
		$this->set(compact('description'));
	}

	function change_aspect()
	{
		if($this->data['Rating']['aspect_id'] != null)
		{
			$aspect = $this->Rating->Aspect->find('list', array('conditions' => array('Aspect.id' => $this->data['Rating']['aspect_id']), 'fields' => array('Aspect.description')));
			$description = $aspect[$this->data['Rating']['aspect_id']];
		}
		else
		{
			$description = null;
		}
		$this->set(compact('description'));
	}

	function auto_select_goal()
	{
		$this->loadModel('Goal');

		if(($this->data['Rating']['aspect_id'] != null) && ($this->data['Rating']['competency_id'] != null))
		{
			$goals = $this->Goal->find('list', array('conditions' => array('Goal.aspect_id' => $this->data['Rating']['aspect_id'], 'Goal.competency_id' => $this->data['Rating']['competency_id'])));
		}
		else
		{
			$goals = null;
		}
		$aspects = $this->Rating->Aspect->find('list');
		$competencies = $this->Rating->Competency->find('list');

		$this->set(compact('aspects', 'competencies', 'goals'));
	}

}
?>