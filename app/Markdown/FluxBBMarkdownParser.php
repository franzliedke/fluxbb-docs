<?php namespace FluxBB\Docs\Markdown;

use FluxBB\Markdown\Parser;
use FluxBB\Markdown\Extension\Gfm\FencedCodeBlockExtension;
use Illuminate\Contracts\Routing\UrlGenerator;

class FluxBBMarkdownParser implements ParserInterface {

	public function __construct(UrlGenerator $url)
	{
		$this->parser = new Parser(new HtmlRenderer($url));
		$this->parser->addExtension(new FencedCodeBlockExtension());
	}

	public function parse($markdown)
	{
		return $this->parser->render($markdown);
	}

}
