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
		Edit and Update
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('books.update', $books->id) }}">
			<div class="form-group">
				@csrf
				<!-- Hidden Toekn -->
				@method('PATCH')
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="{{ $books->title }}"/>
			</div>
			<div class="form-group">
				<label for="author">Author</label>
				<input type="text" class="form-control" name="author" value="{{ $books->author }}"/>
			</div>
			<div class="form-group">
				<label for="desc">Description</label>
				<input type="text" class="form-control" name="desc" value="{{ $books->desc }}"/>
			</div>
			<div class="form-group">
				<label for="series">From Series</label>
				<input type="text" class="form-control" name="series" value="{{ $books->series }}"/>
			</div>
			<div class="form-group">
				<label for="country">Country</label>
				<input type="text" class="form-control" name="country" value="{{ $books->country }}"/>
			</div>
			<div class="form-group">
				<label for="avaliable">Is Avaliable</label>
				<input type="checkbox" name="avaliable" value="{{ $books->avaliable }} ? true:false"/>
			</div>
			<button type="submit" class="btn btn-block btn-danger">Update</button>
		</form>
	</div>
</div>
@endsection