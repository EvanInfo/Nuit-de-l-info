<?php

class QuestionManager {
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }

    public function getQuestionById($id)
    {
        $query = $this->_db->prepare("SELECT idQuestion, Question, OptionA, OptionB, OptionC FROM question WHERE idQuestion = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
    public function getMaxQuestionId() {
        $query = $this->_db->query("SELECT MAX(idQuestion) FROM question");
        return $query->fetchColumn();
    }
}

