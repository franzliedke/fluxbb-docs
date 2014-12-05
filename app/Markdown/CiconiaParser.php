<?php namespace FluxBB\Docs\Markdown;

use Ciconia\Ciconia;
use Ciconia\Extension\Gfm\FencedCodeBlockExtension;
use Illuminate\Contracts\Routing\UrlGenerator;

class CiconiaParser implements ParserInterface {

	public function __construct(UrlGenerator $url)
	{
		$this->parser = new Ciconia(new HtmlRenderer($url));
		$this->parser->addExtension(new FencedCodeBlockExtension());
	}

	public function parse($markdown)
	{
		return $this->parser->render($markdown);
	}

}
