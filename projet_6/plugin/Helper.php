<?php

namespace Find_a_nanny;

trait Helper
{
    public function render(string $template, $vars = [])
    {
        ob_start();
        require_once plugin_dir_path(__FILE__).'views/'.$template.'.html.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content ?? null;
    }

	public function script(string $js, $vars = [])
	{
		$filePath = plugin_dir_path(__FILE__).'assets/js/'.$js.'.js';
		if (file_exists($filePath)){
			ob_start();
			require_once $filePath;
			$content = '<script>'.ob_get_contents().'</script>';
			ob_end_clean();
		}
		return $content ?? null;
	}

	public function style(string $css, $vars = [])
	{
		$filePath = plugin_dir_path(__FILE__).'assets/css/'.$css.'.css';
		if (file_exists($filePath)){
			ob_start();
			require_once $filePath;
			$content = '<style>'.ob_get_contents().'</style>';
			ob_end_clean();
		}

		return $content.$this->addCustom() ?? null;
	}

	public function addCustom(  ) {
		$customCssPath = plugin_dir_path(__FILe__).'assets/css/custom.css';
		ob_start();
		require_once $customCssPath;
		$content = '<style>'.ob_get_contents().'</style>';
		ob_end_clean();
		return $content ?? null;
	}
}