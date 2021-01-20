@extends('layout')

@section('content')

<style>
	.push-top {
		margin-top: 50px;
	}

	.top-right {
		float: right;
	}
</style>

<div class="push-top">
	<div class="card-header">
        Libary Manager Application

        @if(Auth::user()->hasPermission('book-create'))
        <a href="{{ route('books.create') }}" class="btn btn-xs btn-danger pull-right top-right">Add Book</a>
        @else
            <button class="btn btn-xs btn-secondary pull-right top-right"> Add Book </button>
        @endif

	</div>
	<table class="table table-bordered thead-dark">
		<thead>
			<tr>
				<td>ID</td>
				<td>Title</td>
				<td>Author</td>
				<td>Description</td>
				<td>From Series</td>
				<td>Country</td>
				<td>Avaliable</td>
				<td class="text-center">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr class="table-warning">
				<td>{{ $book->id }}</td>
				<td>{{ $book->title }}</td>
				<td>{{ $book->author }}</td>
				<td>{{ $book->desc }}</td>
				<td>{{ $book->series }}</td>
				<td>{{ $book->country }}</td>
				@if ($book->avaliable == 1)
				<td>Yes</td>
				@else
				<td>No</td>
                @endif

                <td class="text-center">
                @if(Auth::user()->hasPermission('book-update'))
                <a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                @else
                 <button class="btn btn-secondary btn-sm"> Edit </button>
                @endif

                @if(Auth::user()->hasPermission('book-delete'))
                <form action=" {{ route('books.destroy', $book->id)}}" method="post" style="display: inline-block">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger btn-sm"" type=" submit">Delete</button>
                </form>
                @else
                    <button class="btn btn-secondary btn-sm"> Delete </button>
                @endif

				</td>
			</tr>
			@endforeach
		<tbody>
	</table>
	<div class="card-footer">
		<a href="{{ route('home') }}" class="btn btn-xs btn-danger bottom-right">Back to Homepage</a>

	</div>
	<div>
		@endsection
