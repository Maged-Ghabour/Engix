@extends('Front.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container p-5 col-6 bg-light">
                    <form action="{{ route('profile.updateing', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="Phone" class="form-label">Phone</label>
                            <input type="Phone" name="phone" value="{{ $user->phone }}" class="form-control"
                                id="Phone" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
