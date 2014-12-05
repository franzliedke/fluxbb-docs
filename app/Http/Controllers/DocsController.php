<?php namespace FluxBB\Docs\Http\Controllers;

use FluxBB\Docs\Documentation;
use FluxBB\Docs\Http\Requests;
use FluxBB\Docs\Markdown\ParserInterface;

class DocsController extends Controller {

	/**
	 * @var Documentation
	 */
	protected $docs;

	/**
	 * @var ParserInterface
	 */
	protected $parser;

	public function __construct(Documentation $docs, ParserInterface $parser)
	{
		$this->docs = $docs;
		$this->parser = $parser;
	}

	/**
	 * Show the documentation home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show a specific documentation page.
	 *
	 * @return Response
	 */
	public function page($name)
	{
		$contents = $this->docs->get($name);
		$html = $this->parser->parse($contents);

		return view('docs.page', [
			'index'   => $this->getIndex(),
			'content' => $html,
		]);
	}

	protected function getIndex()
	{
		$contents = $this->docs->getIndex();

		return $this->parser->parse($contents);
	}

}


