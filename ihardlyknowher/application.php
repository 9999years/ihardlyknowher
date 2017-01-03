<?
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(BASE_DIR.'config.php');
require_once(BASE_DIR.'controller.php');
require_once(BASE_DIR.'cache.php');	
require_once(BASE_DIR.'flickr.php');
require_once(BASE_DIR.'db.php');

abstract class Application {
	private static $_nsid;
	
	public static function run() {
		if(array_key_exists('controller', $_GET)
		&& array_key_exists('view', $_GET)) {
			$controller_name = $_GET['controller'];
			$view_name = $_GET['view'];
		} else {
			$controller_name = 'main';
			$view_name = 'home';
		}

		$controller = Controller::withName($controller_name);
		$content = $controller->renderView($view_name);
		$template = isset($controller->settings['template']) ?
			$controller->settings['template'] : 'standard';
		
		if($template === 'blank') {
			echo $content;
		} else {
			$args = array('content'=>$content);
			if(isset($controller->settings)) {
				$args['settings'] = $controller->settings;
			}
			echo Controller::withName('template')->renderView($template,$args);
		}
		
		DB::shutdown();
	}
	
	public static function getNSID() {
		if(!self::$_nsid) {
			if(preg_match('/^[0-9]+@[A-Z]{1}[0-9]+$/',$_GET['user'])) {
				self::$_nsid = $_GET['user'];
			} else {
				self::$_nsid = Flickr::NSIDforURLname($_GET['user']);
			}
		}
		return self::$_nsid;
	}
}
?>
