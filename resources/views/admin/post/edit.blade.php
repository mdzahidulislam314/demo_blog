@extends('admin.app')

@section('main_content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{URL::to('admin/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{$post->title}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Post Sub Title</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                                               value="{{$post->subtitle}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                               value="{{$post->slug}}">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <label for="image">File input</label>
                                            <input type="file" name="image" id="image">
                                            <img src="{{ asset($post->image) }}" alt="" height="70px" width="100px">
                                        </div>
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="radio" name="status" value="1" {{$post->status == 1
                                                ?'checked' : '' }}> Publish
                                                <input type="radio" name="status" value="0" {{$post->status == 0
                                                ?'checked' : '' }}> Unpublished
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Select Tags: </label>
                                            <select class="form-control select2 select2-hidden-accessible" multiple=""
                                                    data-placeholder="Select a State" style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true" name="tags[]">
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}"

                                                            @foreach($post->tags as $postTag)
                                                            @if($postTag->id == $tag->id)
                                                            selected
                                                            @endif
                                                            @endforeach

                                                    >{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Select Category: </label>
                                            <select class="form-control select2 select2-hidden-accessible" multiple=""
                                                    data-placeholder="Select a State" style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true" name="categories[]">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"

                                                            @foreach($post->categories as $categoryTag)
                                                            @if($categoryTag->id == $category->id)
                                                            selected
                                                            @endif
                                                            @endforeach

                                                    >{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Bootstrap WYSIHTML5
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-default btn-sm" data-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                                <div class="box-body pad">
                                <textarea name="body_text"
                                          style="width: 100%;
                                 height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;
                                padding: 10px;" id="editor1">

                                {{$post->body_text}}</textarea>
                                </div>

                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary">
                                <a href='#' class="btn btn-warning">Back</a>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection