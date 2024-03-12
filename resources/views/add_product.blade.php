@extends('layouts.app')

@php

@endphp
@section('content')
    <div class="m-4 container">
        <div class="row">
            <div class="col-sm-12 card d-flex flex-row p-2" style="justify-content:space-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="card m-2">
            <label class="h5 m-2">Product Details</label>

            <div class="card-body">
                <div class="">
                    <form method="post" action="{{ route('add.product') }}">
                        @csrf
                        <input type="hidden" name="id" class="form-control" placeholder="Product name" value={{ $product->id ?? '' }}>

                        <div class="row">
                            <div class="col">
                                <input type="text" name="product_name" class="form-control" placeholder="Sub Category name" value={{ $product->name ?? '' }}>
                            </div>
                            <div class="col">

                                <select  name="category_id" class="form-control category_id" id="exampleFormControlSelect2">
                                    @foreach ($categories as $category_new)
                                            <option value="{{ $category_new->id }}" @if(!empty($category))

                                                @if($category_new->id ==$category->category_id )

                                                    selected
                                                @endif
                                            @endif>{{ $category_new->category_name }}</option>

                                    @endforeach

                                  </select>
                                </div>
                            <div class="col">
                        @if(!empty($sub_categories))
                            <select  name="sub_category_id" class="form-control sub_category_id " id="exampleFormControlSelect2"   >
                                @foreach ($sub_categories as $category_new)
                                <option value="">Please Select Sub Category</option>
                                        <option value="{{ $category_new->id }}" @if(!empty($product))

                                            @if($category_new->id ==$product->sub_category_id )

                                                selected
                                            @endif
                                        @endif>{{ $category_new->sub_category_name }}</option>

                                @endforeach

                              </select>
                              @endif
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
    <script type="text/javascript">
    $(document).ready(function(){
        $('.category_id').on('change',function(){
            const categoryId = $(this).val();
            $.ajax({
                method:'POST',
                data:{'categoryId':categoryId},
                url : "{!! route('get_subcategories') !!}",
                headers :{
                    'X-CSRF-TOKEN' :  $('meta[name="csrf-token"]').attr('content'),
                },
                success:function (response){
                    $('.sub_category_id').empty();

                    let appendSubCategory  = '';
                       $.each(response,function(index,value){
                        appendSubCategory += '<option value = ' + value.id+ '>' + value.sub_category_name + '</option> '
                       })
                       $('.sub_category_id').append(appendSubCategory);
                       $('.sub_category_id').show();

                }
            })

        })
    })
    </script>
@endsection

