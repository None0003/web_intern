@extends('app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container my-5 d-flex justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Forgot Password</h2>
            <form>
                <div class="mb-3">
                    <label for="emailInput" class="form-label fs-5">Email</label>
                    <input type="text" class="form-control" id="emailInput">
                </div>
                <button type="submit" class="btn btn-dark">Retrive my password</button>
            </form>
        </div>
    </div>
@endsection
