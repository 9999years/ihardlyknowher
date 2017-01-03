<?
final class MainController extends Controller {
	public static function init() {
		return;
	}

	public function home() {
		$this->settings['title'] = 'I Hardly Know Her';
	}

	public function faq() {
		$this->settings['title'] = 'I Hardly Know Her FAQ';
	}
}
?>
