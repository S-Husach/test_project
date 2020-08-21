@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-6">
<h2>Donations page</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/donate/submit" method="post">
    @csrf

    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="John"
    id="name" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="email@exaple.com"
    id="email" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="amount">Your donation</label>
    <input type="text" name="amount" placeholder="10$"
    id="amount" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="message">Enter your message (optionaly)</label>
    <textarea name="message" placeholder="Message"
    id="message" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</div>

@endsection