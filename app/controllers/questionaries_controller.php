<?php
class QuestionariesController extends AppController
{

	var $name = 'Questionaries';

	function start()
	{

	}

	function first($status = 0)//0=start,1=ajax,2=end
	{
		$questionaryNumber = 1;
		if($status == 0)
		{
			$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
			$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));
			$entries["gender"] = $storredQuestionary["Questionary"]['item1'];
			$entries["age"] = $storredQuestionary["Questionary"]['item2'];
			$entries["exp"] = $storredQuestionary["Questionary"]['item3'];
			$entries["mathExp"] = $storredQuestionary["Questionary"]['item4'];
			$entries["math"] = $storredQuestionary["Questionary"]['item5'];
			$entries["expHarm"] = $storredQuestionary["Questionary"]['item6'];
			$entries["aspects"] = $storredQuestionary["Questionary"]['item7'];
			$entries["competencies"] = $storredQuestionary["Questionary"]['item8'];
			$entries["cat"] = $storredQuestionary["Questionary"]['item9'];
			$entries["know"] = $storredQuestionary["Questionary"]['item10'];
			$entries["learn"] = $storredQuestionary["Questionary"]['item11'];
		}

		else
		{
			$entries = $this->data["questionary"];
		}
		if(!empty($entries) && $status == 2)
		{
			if(!empty($entries["gender"]) && !empty($entries["math"])  && !empty($entries["expHarm"]) && //
			(!empty($entries["aspects"]) || (!empty($entries["expHarm"]) && $entries["expHarm"] == 1)) && (!empty($entries["competencies"]) || (!empty($entries["expHarm"]) && //
			$entries["expHarm"] == 1)) && !empty($entries["cat"]) && !empty($entries["know"]) && !empty($entries["learn"]))
			{
				if($entries["expHarm"] == 1)
				{
					$entries["aspects"] = 0;
					$entries["competencies"] = 0;
				}
				$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
				if($this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id']))))
				{
					$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));
					$this->Questionary->updateAll(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber, 'item1' => $entries["gender"], 'item2' => $entries["age"], //
					'item3' => $entries["exp"], 'item4' => $entries["mathExp"],'item5' => $entries["math"],  'item6' => $entries["expHarm"], 'item7' => $entries["aspects"], 'item8' => $entries["competencies"], //
					'item9' => $entries["cat"], 'item10' => $entries["know"], 'item11' => $entries["learn"]),   //'item3' => "'" . $comment . "'"),
					array('Questionary.id' => $storredQuestionary['Questionary']['id']));
				}
				else
				{
					$this->Questionary->create();
					$this->Questionary->set(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber, 'item1' => $entries["gender"], 'item2' => $entries["age"], //
					'item3' => $entries["exp"], 'item4' => $entries["mathExp"],'item5' => $entries["math"],  'item6' => $entries["expHarm"], 'item7' => $entries["aspects"], 'item8' => $entries["competencies"], //
					'item9' => $entries["cat"], 'item10' => $entries["know"], 'item11' => $entries["learn"]),   //'item3' => "'" . $comment . "'"),
					array('Questionary.id' => $storredQuestionary['Questionary']['id']));
					$this->Questionary->save();
				}
				$this->redirect(array('action' => 'info'));
			}
						else
			{
				$this->Session->setFlash(__('Bitte alle erforderlichen Felder (rot markiert) ausfüllen.', true));
			}
		}
		$this->set(compact('entries'));
	}

	function info()
	{

	}

	function second($status = 0)//0=start,1=ajax,2=end
	{
		$questionaryNumber = 2;
		if($status == 0)
		{
			$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
			$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));
			$entries["understand"] = $storredQuestionary["Questionary"]['item1'];
			$entries["understandtext"] = $storredQuestionary["Questionary"]['itemText1'];
			$entries["know"] = $storredQuestionary["Questionary"]['item3'];
			$entries["order"] = $storredQuestionary["Questionary"]['item4'];
			$entries["orderself"] = $storredQuestionary["Questionary"]['item5'];
			$entries["develop"] = $storredQuestionary["Questionary"]['item6'];
			$entries["developself"] = $storredQuestionary["Questionary"]['item7'];
			$entries["help"] = $storredQuestionary["Questionary"]['item8'];
			$entries["helpself"] = $storredQuestionary["Questionary"]['item9'];
		}

		else
		{
			$entries = $this->data["questionary"];
		}
		if(!empty($entries) && $status == 2)
		{
			if(!empty($entries["understand"])&& //
			!empty($entries["know"]) && !empty($entries["order"]) && !empty($entries["orderself"]) &&   //
			!empty($entries["develop"]) && (!empty($entries["developself"])) && !empty($entries["help"]) && !empty($entries["helpself"]))
			{
				if(empty($entries["understandtext"]))
				{
					$entries["understandtext"] = "";
				}
				$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
				if($this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id']))))
				{
					$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));
					$this->Questionary->updateAll(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber, 'item1' => $entries["understand"], 'itemText1' => "'" . $entries["understandtext"] . "'",  //
						'item3' => $entries["know"], 'item4' => $entries["order"], 'item5' => $entries["orderself"], 'item6' => $entries["develop"],   //
						'item7' => $entries["developself"], 'item8' => $entries["help"], 'item9' => $entries["helpself"]),  //
					array('Questionary.id' => $storredQuestionary['Questionary']['id']));
				}
				else
				{
					$this->Questionary->create();
					$this->Questionary->set(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber, 'item1' => $entries["understand"], 'itemText1' => "'" . $entries["understandtext"] . "'",  //
						'item3' => $entries["know"], 'item4' => $entries["order"], 'item5' => $entries["orderself"], 'item6' => $entries["develop"],  //
						'item7' => $entries["developself"], 'item8' => $entries["help"], 'item9' => $entries["helpself"]));
					$this->Questionary->save();
				}
				$this->redirect(array('controller' => 'ratings', 'action' => 'add'));
			}
						else
			{
				$this->Session->setFlash(__('Bitte alle erforderlichen Felder (rot markiert) ausfüllen.', true));
			}
		}
		$this->set(compact('entries'));
	}

	function third($status = 0)
	{
		$questionaryNumber = 3;
		if($status == 0)
		{
			$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
			$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));

			$entries["know"] = $storredQuestionary["Questionary"]['item1'];
			$entries["order"] = $storredQuestionary["Questionary"]['item2'];
			$entries["orderself"] = $storredQuestionary["Questionary"]['item3'];
			$entries["develop"] = $storredQuestionary["Questionary"]['item4'];
			$entries["developself"] = $storredQuestionary["Questionary"]['item5'];
			$entries["help"] = $storredQuestionary["Questionary"]['item6'];
			$entries["helpself"] = $storredQuestionary["Questionary"]['item7'];
			$entries["say"] = $storredQuestionary["Questionary"]['itemText1'];
		}

		else
		{
			$entries = $this->data["questionary"];
		}
		if(!empty($entries) && $status == 2)
		{

			if(!empty($entries["know"]) && !empty($entries["order"]) && !empty($entries["orderself"]) &&   //
			!empty($entries["develop"]) && (!empty($entries["developself"])) && !empty($entries["help"]) && !empty($entries["helpself"]))
			{
				if(empty($entries["say"]))
				{
					$entries["say"] = "";
				}
				$user = $this->Questionary->User->find('first', array('conditions' => array('username' => $this->Auth->user('username'))));
				if($this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id']))))
				{
					$storredQuestionary = $this->Questionary->find('first', array('conditions' => array('number' => $questionaryNumber, 'Questionary.user_id' => $user['User']['id'])));
					$this->Questionary->updateAll(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber,  'itemText1' => "'" . $entries["say"] . "'",  //
						'item1' => $entries["know"], 'item2' => $entries["order"], 'item3' => $entries["orderself"], 'item4' => $entries["develop"],   //
						'item5' => $entries["developself"], 'item6' => $entries["help"], 'item7' => $entries["helpself"]),  //
					array('Questionary.id' => $storredQuestionary['Questionary']['id']));
				}
				else
				{
					$this->Questionary->create();
					$this->Questionary->set(array('user_id' => $user['User']['id'], 'number' => $questionaryNumber,  'itemText1' => "'" . $entries["say"] . "'",  //
						'item1' => $entries["know"], 'item2' => $entries["order"], 'item3' => $entries["orderself"], 'item4' => $entries["develop"],  //
						'item5' => $entries["developself"], 'item6' => $entries["help"], 'item7' => $entries["helpself"]));
					$this->Questionary->save();
				}
				$this->redirect(array('controller' => 'questionaries', 'action' => 'end'));
			}
						else
			{
				$this->Session->setFlash(__('Bitte alle erforderlichen Felder (rot markiert) ausfüllen.', true));
			}
		}
		$this->set(compact('entries'));
	}
	function end()
	{

	}
}
?>