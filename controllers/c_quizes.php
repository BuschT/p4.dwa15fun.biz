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

		$quiztitlequery = "Select quiz_name FROM quizes WHERE quiz_number = '".$quiznumber."'";
		$quiztitle = DB::instance(DB_NAME)->select_field($quiztitlequery);

		$query = "Select * from users_quizes_questions_answers WHERE user_id ='".$this->user->user_id."' AND quiz_number = '".$quiznumber."'";
		$quizquestions = DB::instance(DB_NAME)->select_rows($query);

		$quizquestionscount = count($quizquestions);
		$numcorrect = 0;
		$numincorrect = 0;

		$data = array();

		foreach($quizquestions as $question){
			$queryquestioninfo = "Select * FROM questions WHERE question_no = '".$question['question_number']."'";
			$questioninfo = DB::instance(DB_NAME)->select_row($queryquestioninfo);

			$tmp = Array(
					'question' => $questioninfo,
					'user_answer' => $question['user_answer']);
			array_push($data, $tmp);

			if ($question['user_answer'] != $questioninfo['correct_answer']){
				$numincorrect = $numincorrect+1;
			} else {
				$numcorrect = $numcorrect+1;
			}
		}

		$this->template->content->numcorrect = $numcorrect;
		$this->template->content->numincorrect = $numincorrect;
		$this->template->content->quiz_title = $quiztitle;
		$this->template->content->questions = $data;

		# Render template
		echo $this->template;
	}

	public function myquizes(){

		$this->template->content = View::instance('v_quizes_report');
		$this->template->title   = "Quiz History";

		$checkquizhistoryquery = "SELECT DISTINCT user_id, quiz_number FROM users_quizes_questions_answers WHERE user_id = '".$this->user->user_id."'";
		$quizcheck = DB::instance(DB_NAME)->select_rows($checkquizhistoryquery);

		$takenquizesarray = array();

		foreach($quizcheck as $quiztaken){
			$getquizinfoquery = "SELECT quiz_name from quizes WHERE quiz_number = '".$quiztaken['quiz_number']."'";
			$quizname = DB::instance(DB_NAME)->select_field($getquizinfoquery);
			$tmp = Array(
				'quiz_name' => $quizname,
				'quiz_number' => $quiztaken['quiz_number']);

			array_push($takenquizesarray, $tmp);
		}
		$this->template->content->takenquizes = $takenquizesarray;

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
		$newquiz = Array('quiz_name' => $_POST['newquiz_name'],
						 'quiz_description' =>$_POST['newquiz_description'],
						 'creator_user_id' =>$this->user->user_id);
		DB::instance(DB_NAME)->insert('quizes', $newquiz);

		#Add all the questions to the questions table
		for ($x=1; $x<=$_POST['num_questions']; $x++){
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

		Router::redirect("/quizes");
	}

	public function index() {

		$q = "Select * from quizes ORDER BY quiz_number DESC";

		# Run the query, store the results in the variable $posts
		$quizes = DB::instance(DB_NAME)->select_rows($q);

		# Set up the View
		$this->template->content = View::instance('v_quizes_index');
		$this->template->title   = "All Quizes";

		$data = array();

		# Get the user ids for the quizes
		foreach($quizes as $tmpquiz){
			$getuser = "SELECT first_name, last_name FROM users WHERE user_id = '".$tmpquiz['creator_user_id']."'";
			$user = DB::instance(DB_NAME)->select_row($getuser);
			$quizes_array = Array(
				'quiz_number' => $tmpquiz['quiz_number'],
				'quiz_name' => $tmpquiz['quiz_name'],
				'quiz_description' => $tmpquiz['quiz_description'],
				'quiz_creator_name' => $user['first_name']." ".$user['last_name']);
			array_push($data, $quizes_array);
		}

		# Pass data to the View
		$this->template->content->quizes = $data;
		#$this->template->

		# Render the View
		echo $this->template;

	}

}