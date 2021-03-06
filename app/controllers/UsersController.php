<?php

class UsersController extends \BaseController {

	public function index()
	{
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	public function show($id)
	{
		$user = User::findOrFail($id);
		$topics = Topic::Whose($user->id)->Recent()->limit(10)->get();
		$replies = Reply::Whose($user->id)->Recent()->limit(10)->get();
		return View::make('users.show', compact('user', 'topics', 'replies'));
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

	public function replies($id)
	{
		$user = User::findOrFail($id);
		$replies = Reply::Whose($user->id)->Recent()->paginate(15);
		return View::make('users.replies', compact('user', 'replies'));
	}

	public function topics($id)
	{
		$user = User::findOrFail($id);
		$topics = Topic::Whose($user->id)->Recent()->paginate(15);
		return View::make('users.topics', compact('user', 'topics'));
	}

	public function favorites($id)
	{
		$user = User::findOrFail($id);
		$topics = $user->favoriteTopics()->paginate(15);
		return View::make('users.favorites', compact('user', 'topics'));
	}
}