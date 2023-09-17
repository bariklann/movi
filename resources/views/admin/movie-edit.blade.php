@extends('admin.layouts.base')
@section('title', 'Edit Movies')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Movie</h3>
                </div>
                {{-- /.card-header --}}
                {{-- form start --}}
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.update', $movie->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body row">
                        <div class="form-group col-xs-12 col-sm-12 col-lg-6 col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Love and thunder" value="{{ $movie->title }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-lg-6 col-md-6">
                            <label for="trailer">Trailer</label>
                            <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video Url"
                                value="{{ $movie->trailer }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-lg-6 col-md-6">
                            <label for="movie">movie</label>
                            <input type="text" class="form-control" id="movie" name="movie" placeholder="Video Url"
                                value="{{ $movie->movie }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="duration">Durasi</label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="1H 30M"
                                value="{{ $movie->duration }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="release_date">Date: </label>
                            <input type="date" class="form-control" id="release_date" name="release_date"
                                value="{{ $movie->release_date }}">
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="casts">Casts</label>
                            <input type="text" class="form-control" id="casts" name="casts"
                                placeholder="Chris Evan" value="{{ $movie->casts }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="categories">Categories</label>
                            <input type="text" class="form-control" id="categories" name="categories"
                                placeholder="Action,Fantasy" value="{{ $movie->categories }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label class="small-thumbnail">Small Thumbnail</label>
                            <input type="file" class="form-control" name="small_thumbnail">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label class="large-thumbnail">Large Thumbnail</label>
                            <input type="file" class="form-control" name="large_thumbnail">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="short-about">Short About</label>
                            <input type="text" class="form-control" id="short-about" name="short_about"
                                placeholder="Awesome Movie" value="{{ $movie->short_about }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="about">About</label>
                            <input type="text" class="form-control" id="about" name="about"
                                placeholder="Awesome Movie" value="{{ $movie->about }}">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-lg-6 col-md-6">
                            <label for="featured">Featured</label>
                            <select class="custom-select" name="featured">
                                <option value="0" {{ old('featured') === '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured') === '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-lg-12 col-md-12">
                        <label for=""><i class="fa fa-pen"></i></label>
                        <input type="submit" class="form-control btn btn-primary" value="Submit">
                    </div>
                    {{-- ./card-body --}}

                </form>
            </div>
        </div>
    </div>
@endsection