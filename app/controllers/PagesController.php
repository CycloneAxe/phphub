<?php

class PagesController extends \BaseController {

	protected $topic;

	public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

	/**
	 * 首页
	 */
	public function home()
	{
		$topics = $this->topic->getTopicsWithFilter('excellent');
		$nodes  = Node::allLevelUp();

		return View::make('pages.home', compact('topics', 'nodes'));
	}

	/**
	 * 关于我们
	 */
	public function about()
	{
		return View::make('pages.about');
	}

	/**
	 * 社区 WIKI
	 */
	public function wiki()
	{
		$topics = $this->topic->getWikiList();
		return View::make('pages.wiki', compact('topics'));
	}
	
	/**
	 * 搜索功能
	 */
	public function search()
	{
		$query = Security::clean(Input::get('q'));
		return Redirect::away('https://www.google.com/search?q=site:phphub.org ' . $query, 301);
	}


}
