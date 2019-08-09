<?php 
if (! defined('PATH_SYSTEM')) {
	die('Bad requested!');
}


class FT_Controller{
	protected $view    = NULL;
	protected $model   = NULL;
	protected $library = NULL;
	protected $helper  = NULL;
	protected $config  = NULL;

	public function __construct(){

	}
	
	public function load($controller, $action){
			 // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
		$controller = ucfirst(strtolower($controller)) . '_Controller';

		    // chuyển đổi tên action vì nó có định dạng {name}Action
		$action = strtolower($action) . 'Action';

		    // Kiểm tra file controller có tồn tại hay không
		if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
			die ('Controller không tồn tại');
		}

		require_once PATH_APPLICATION . '/controller/' . $controller . '.php';

		    // Kiểm tra class controller có tồn tại hay không
		if (!class_exists($controller)){
			die ('Controller không tồn tại');
		}

		    // Khởi tạo controller
		$controllerObject = new $controller();

		    // Kiểm tra action có tồn tại hay không
		if ( !method_exists($controllerObject, $action)){
			die ('Action không tồn tại');
		}

		    // Gọi tới action
		$controllerObject->{$action}();
	}
}
?>