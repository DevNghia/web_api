@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form autocomplete="off" method="POST" action="{{route('user.update',[$users->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" value="{{$users->name}}" class="form-control" name="name">
                              <input type="text" value="{{$users->email}}" class="form-control" name="email">
                            <input type="submit" name="themdanhmuc" class="btn btn-primary mt-2" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
