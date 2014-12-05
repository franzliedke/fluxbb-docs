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
		if (isset($options['href']) && Str::endsWith($options['href'], '.md'))
		{
			$page = substr($options['href'], 0, -3);
			$options['href'] = $this->url->route('docs', ['page' => $page]);
		}

		return parent::renderLink($content, $options);
	}

}
