@extends('layouts.app')

@section('content')
<div class="container">
     @if (Session()->has('success'))
                        <div class="alert alert-success" >
                         <p>{{Session()->get('success')}}</p>
                        </div>
                    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh mục bài viết</div>
                <a href="{{url('/home')}}">Back</a>
                <div class="card-body">
                   

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Quản lý</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                
                            @endphp
                            @foreach ($category as $categories)
                                  <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$categories->title}}</td>
                            <td>
                                <form action="{{route('category.destroy',[$categories->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger mb-2 btn-sm " value="Delete" />
                                </form>
                                 <a class="btn btn-success mb-2 btn-sm" href="{{route('category.show',[$categories->id])}}">Edit</a>
                            </td>
                           
                            </tr>
                            @endforeach
                          
                            
                           
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
