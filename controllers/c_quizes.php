<?php
class quizes_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect('/users/login');
		}
	}

	public function score($quiznumber){
		$this->template->content = View::instance('v_quizes_score');
		$this->template->title   = "View Quiz Score";

		$query = "Select * from users_quizes_questions_answers WHERE user_id ='".$this->user->user_id."' AND quiz_number = '".$quiznumber."'";
		$quizquestions = DB::instance(DB_NAME)->select_rows($query);

		$quizquestionscount = count($quizquestions);
		$numcorrect = 0;
		$numincorrect = 0;

		foreach($quizquestions as $question){
			$queryquestioninfo = "Select correct_answer FROM questions WHERE question_no = '".$question['question_number']."'";
			$correctanswer = DB::instance(DB_NAME)->select_field($queryquestioninfo);
			if ($question['user_answer'] != $correctanswer){
				$numincorrect = $numincorrect+1;
			} else {
				$numcorrect = $numcorrect+1;
			}
		}

		$this->template->content->numcorrect = $numcorrect;
		$this->template->content->numincorrect = $numincorrect;

		# Render template
		echo $this->template;
	}

	public function take($quizid){
		# Setup view
		$this->template->content = View::instance('v_quizes_take');
		$this->template->title   = "View Quiz";

		# See if they've already taken this quize
		$checkquizhistoryquery = "SELECT * FROM users_quizes_questions_answers WHERE user_id = '".$this->user->user_id."' AND quiz_number = '".$quizid."'";
		$quizcheck = DB::instance(DB_NAME)->select_rows($checkquizhistoryquery);
		if (count($quizcheck) > 0){
			$this->template->content->error = "You've already taken this quiz. You cannot take it again. Check your score: <a href='/quizes/score/".$quizid."'>here</a>";
		}

		$quizquery = "Select * from quizes WHERE quiz_number = '".$quizid."'";
		# Run the query, store the results in the variable $posts
		$quiz= DB::instance(DB_NAME)->select_row($quizquery);

		# Get the list of quiz questions
		$quizquestionsquery = "Select * from quiz_questions WHERE quiz_number='".$quizid."'";
		$quizquestions = DB::instance(DB_NAME)->select_rows($quizquestionsquery);

		$questionsarray = array();

		foreach($quizquestions as $question){
			$questionquery = "Select * from questions WHERE question_no='".$question['question_number']."'";
			$quizquestion = DB::instance(DB_NAME)->select_row($questionquery);
			array_push($questionsarray, $quizquestion);
		}

		# Pass data to the View
		$this->template->content->quizinfo = $quiz;
		$this->template->content->quizquestions = $questionsarray;

		# Render template
		echo $this->template;
	}

	public function add($error = NULL) {

		# Setup view
		$this->template->content = View::instance('v_quizes_add');
		$this->template->title   = "New Quiz";
		$this->template->content->error = $error;

		# Render template
		echo $this->template;

	}

	public function p_register_quiz(){

		#echo $this->user->user_id;
		if (trim($_POST['quiz_number']) == false || $_POST['quiz_questions_count'] < 1){
			echo "Problem...";
			#Router::redirect("/quizes/take/error");
		}

		#echo $_POST['quiz_questions_count'];

		for ($x=1; $x<=$_POST['quiz_questions_count']; $x++){
			#echo $this->user->user_id." and ".$_POST['user_answer'.$x];
			#$newquiz = Array('quiz_name' => $_POST['newquiz_name']);
			#DB::instance(DB_NAME)->insert('quizes', $newquiz);
			$quizuserquestionanswer = Array(
							'user_id' => $this->user->user_id,
							'quiz_number' => $_POST['quiz_number'],
							'question_number' => $_POST['question_number'],
							'user_answer' => $_POST['user_answer'.$x]);
			DB::instance(DB_NAME)->insert('users_quizes_questions_answers', $quizuserquestionanswer);
		}
		Router::redirect("/quizes/score/".$_POST['quiz_number']);
	}



	public function p_add() {

		# Make sure there's at least one question
		if (trim($_POST['newquiz_question1']) == false){
			Router::redirect("/posts/add/error");
		}

		#Determine the next quiz number
		$query = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_NAME = 'quizes'";
		$result = DB::instance(DB_NAME)->query($query);

		$array = $result->fetch_assoc();
		$nextquizno=$array['AUTO_INCREMENT'];

		#Now Actually Add the quiz to the quiz table
		$newquiz = Array('quiz_name' => $_POST['newquiz_name']);
		DB::instance(DB_NAME)->insert('quizes', $newquiz);

		#Add all the questions to the questions table
		for ($x=1; $x<=10; $x++){
			if (array_key_exists('newquiz_question'.$x, $_POST)){
				$question = Array(
					'question_content' => $_POST['newquiz_question'.$x],
					'answer_a' => $_POST['newquiz_question'.$x.'_answerA'],
					'answer_b' => $_POST['newquiz_question'.$x.'_answerB'],
					'answer_c' => $_POST['newquiz_question'.$x.'_answerC'],
					'answer_d' => $_POST['newquiz_question'.$x.'_answerD'],
					'correct_answer' => $_POST['correct_answer'.$x]);

				#Get the next question increment value
				$questionsquery = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_NAME = 'questions'";
				$questionsresult = DB::instance(DB_NAME)->query($questionsquery);

				$questionsarray = $questionsresult->fetch_assoc();
				$nextquestionno=$questionsarray['AUTO_INCREMENT'];

				#Insert the question
				DB::instance(DB_NAME)->insert('questions', $question);

				#Build the associative table insert
				$quiz_question = Array(
					'quiz_number' => $nextquizno,
					'question_number' => $nextquestionno);

				#Insert the keys into the quiz question table
				DB::instance(DB_NAME)->insert('quiz_questions', $quiz_question);

			}
  		}

		echo "Quiz Added!";
	}

	public function index() {

		$q = "Select * from quizes";

		# Run the query, store the results in the variable $posts
		$quizes = DB::instance(DB_NAME)->select_rows($q);

		# Set up the View
		$this->template->content = View::instance('v_quizes_index');
		$this->template->title   = "All Quizes";

		# Pass data to the View
		$this->template->content->quizes = $quizes;

		# Render the View
		echo $this->template;

	}

}