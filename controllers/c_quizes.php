<?php
class quizes_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect('/users/login');
		}
	}

	public function add($error = NULL) {

		# Setup view
		$this->template->content = View::instance('v_quizes_add');
		$this->template->title   = "New Quiz";
		$this->template->content->error = $error;

		# Render template
		echo $this->template;

	}

	public function p_add() {

	}

	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_quizes_index');
		$this->template->title   = "All Quizes";

		# Render the View
		echo $this->template;

	}

}