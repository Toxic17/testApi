<?php 

	namespace App\Http\Controller;

	use Core\View;

	class HomeController
	{
		public function main()
		{
			return View::view('main.index');
		}
	}
?>