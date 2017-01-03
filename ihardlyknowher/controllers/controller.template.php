<?
final class TemplateController extends Controller {
	public static function init() {
		return;
	}

	public function standard() {
		$this->title = isset($this->args['settings']['title']) ?
			$this->args['settings']['title'] : 'I Hardly Know Her';
		$this->js = isset($this->args['settings']['js']) ?
			$this->args['settings']['js'] : array();
		$this->css = isset($this->args['settings']['css']) ?
			$this->args['settings']['css'] : array();
		$this->content = $this->args['content'];
	}
}
?>
