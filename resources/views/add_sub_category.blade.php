@extends('layouts.app')

@php

@endphp
@section('content')
    <div class="m-4 container">
        <div class="row">
            <div class="col-sm-12 card d-flex flex-row p-2" style="justify-content:space-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="card m-2">
            <label class="h5 m-2">Sub Category Details</label>

            <div class="card-body">
                <div class="">
                    <form method="post" action="{{ route('add.sub_category') }}">
                        @csrf
                        <input type="hidden" name="id" class="form-control" placeholder="Sub Category name" value={{ $category->id ?? '' }}>

                        <div class="row">
                            <div class="col">
                                <input type="text" name="category_name" class="form-control" placeholder="Sub Category name" value={{ $category->sub_category_name ?? '' }}>
                            </div>
                            <div class="col">

                            <select  name="category_id" class="form-control" id="exampleFormControlSelect2">
                                @foreach ($categories as $category_new)
                                        <option value="{{ $category_new->id }}" @if(!empty($category))

                                            @if($category_new->id ==$category->category_id )

                                                selected
                                            @endif
                                        @endif>{{ $category_new->category_name }}</option>

                                @endforeach

                              </select>
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
