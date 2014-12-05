<?php namespace FluxBB\Docs\Http\Controllers;

use FluxBB\Docs\Documentation;
use FluxBB\Docs\Http\Requests;

class DocsController extends Controller {

	/**
	 * @var Documentation
	 */
	protected $docs;

	/**
	 * @var \Parsedown
	 */
	protected $parser;

	public function __construct(Documentation $docs, \Parsedown $parsedown)
	{
		$this->docs = $docs;
		$this->parser = $parsedown;
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
		$html = $this->parser->text($contents);

		return view('docs.page', [
			'index'   => $this->getIndex(),
			'content' => $html,
		]);
	}

	protected function getIndex()
	{
		$contents = $this->docs->getIndex();
		return $this->parser->text($contents);
	}

}
