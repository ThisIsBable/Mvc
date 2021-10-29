<?php
//use \models;

class controllerArticles
{
	public function index()
	{
		// get data from database-table
		$this->data = [  ['id' =>"1",  'title' =>"Home",  'content' =>"Hello all"],
						 ['id' => "3", 'title' =>"Cool",  'content' => "Coding is cool"],
						 ['id' =>"7",  'title' =>"Party", 'content' =>"A finished <b>project</b> end"]
		]
		;
		$this->title = 'All articles';
		return true;
	}

	public function show()
	{
		$this->data = ['apple','pear', 'lemon', 'peach'];  // test array naar view
		$this->string = "Hello show-view of articles";     // test string naar view
		$this->title = 'one article';
		return true;
	}

    public function home()
    {
        $this->data = ['apple','pear', 'lemon', 'peach'];  // test array naar view
        $this->string = "Hello show-view of articles";     // test string naar view
        $this->title = 'one article';
        return true;
    }

	public function add()
	{
        $this->data = ['apple','pear', 'lemon', 'peach'];  // test array naar view
        $this->string = "Hello show-view of articles";     // test string naar view
        $this->title = 'one article';
		return true;
	}


	public function update()
	{
		return true;
	}

	public function delete()
	{
		return true;
	}
	
}