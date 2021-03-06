@extends('layouts.default')

@section('title')
{{{ $user->name }}} 的帖子列表_@parent
@stop

@section('content')


<div class="users-show main-col">

  <div class="panel panel-default">

    @include('users.partials.infonav', ['current' => 'replies'])

    <div class="panel-body remove-padding-vertically remove-padding-horizontal">

      @if (count($replies))
	      @include('users.partials.replies')
	      <div class="pull-right add-padding-vertically">
	        {{ $replies->links(); }}
	      </div>
      @else
	       <div class="empty-block">还未留下任何评论~~</div>
      @endif

    </div>

  </div>
</div>

@stop
