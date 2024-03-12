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
            </div>

        </div>
        <div class="card m-2">
            <label class="h5 m-2">Category Details</label>

            <div class="card-body">
                <div class="">
                    <form method="post" action="{{ route('add.category') }}">
                        @csrf
                        <input type="hidden" name="id" class="form-control" placeholder="Category name" value={{ $category->id ?? '' }}>

                        <div class="row">
                            <div class="col">
                                <input type="text" name="category_name" class="form-control" placeholder="Category name" value={{ $category->category_name ?? '' }}>
                            </div>

                        </div>
                        <div class="col mt-2">
                            <button type="submit" class="btn btn-primary">Submit Category</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>


    </div>
@endsection
