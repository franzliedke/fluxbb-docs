<?php namespace FluxBB\Docs;

use League\Flysystem\FileNotFoundException;
use League\Flysystem\FilesystemInterface;

class Documentation {

	/**
	 * @var FilesystemInterface
	 */
	protected $root;

	public function __construct(FilesystemInterface $files)
	{
		$this->root = $files;
	}

	/**
	 * @return string
	 */
	public function getIndex()
	{
		return $this->get('toc');
	}

	/**
	 * @param string $name
	 * @return string
	 */
	public function get($name)
	{
		try {
			return $this->root->read("$name.md");
		} catch (FileNotFoundException $e) {
			throw new \InvalidArgumentException("File $name not found.");
		}
	}

} 
