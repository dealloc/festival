<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\News;

use Festival\Http\Requests\News\CreateNewsRequest;

class CreateNewsCommand
{
	private $title;
	private $content;

	/**
	 * CreateNewsCommand constructor.
	 * @param \Festival\Http\Requests\News\CreateNewsRequest $request
	 */
	public function __construct(CreateNewsRequest $request)
	{
		$this->title = $request->get('title');
		$this->content = $request->get('content');
	}
	
	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}
}