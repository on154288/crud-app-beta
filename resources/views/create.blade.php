@extends('layout')

@section('content')
<style>
	.container {
		max-width: 450px;
	}

	.push-top {
		margin-top: 50px;
	}
</style>

<div class="card push-top">
	<div class="card-header">
		Add Book
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('books.store') }}">
			<div class="form-group">
				@csrf
				<!-- Hidden Toekn -->
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" />
			</div>
			<div class="form-group">
				<label for="author">Author</label>
				<input type="text" class="form-control" name="author" />
			</div>
			<div class="form-group">
				<label for="desc">Description</label>
				<input type="text" class="form-control" name="desc" />
			</div>
			<div class="form-group">
				<label for="series">From Series</label>
				<input type="text" class="form-control" name="series" />
			</div>
			<div class="form-group">
				<label for="country">Country</label>
				<input type="text" class="form-control" name="country" />
			</div>
			<div class="form-group">
				<label for="avaliable">Is Avaliable</label>
				<input type="checkbox" name="avaliable" />
			</div>
			<button type="submit" class="btn btn-block btn-danger">Add Book to Database</button>
		</form>
	</div>
</div>
@endsection