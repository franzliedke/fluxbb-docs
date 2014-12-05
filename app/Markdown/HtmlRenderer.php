<?php namespace FluxBB\Docs\Markdown;

use Ciconia\Renderer\HtmlRenderer as BaseRenderer;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Str;

class HtmlRenderer extends BaseRenderer {

	protected $url;

	public function __construct(UrlGenerator $url)
	{
		$this->url = $url;
	}

	public function renderLink($content, array $options = array())
	{
		if (Str::endsWith($options['href'], '.md'))
		{
			$path = substr($options['href'], 0, -3);
			$options['href'] = $this->url->to($path);
		}

		return parent::renderLink($content, $options);
	}

}
