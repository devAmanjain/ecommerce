@extends('layouts.app')


@section('content')
    <div class="m-4 container">
        <div class="row">
            <div class="col-sm-12 card d-flex flex-row p-2" style="justify-content:space-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
                <div class="float-right" >
                    <a class="btn btn-primary" href="{{ route('add_category.form') }}"> Add Category </a>
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index=>$category )
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('edit.category',$category) }}" class="btn btn-primary"> Edit</a>

                            <a href="{{ route('delete.category',$category) }}" class="btn btn-danger"> Delete</a>
                        </td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
        </div>


    </div>
@endsection
