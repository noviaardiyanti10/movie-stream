@extends('admin.layouts.base');

@section('title', 'Movies');
    
@section('content')
  
<div class="row">
  <div class="col-md-12">

    {{-- Alert Here --}}
    {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif --}}

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Create Movie</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.store') }}">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="e.g Guardian of The Galaxy" value="{{old('title')}}">
            <span class="text-danger error-message" data-field="title"></span>


            @error('title')
            <span class="text-danger error-message" data-field="title">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video url" value="{{old('trailer')}}">

            @error('trailer')
            <span class="text-danger error-message" data-field="trailer">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="movie">Movie</label>
            <input type="text" class="form-control" id="movie" name="movie" placeholder="Movie url" value="{{old('movie')}}">
            
            @error('movie')
            <span class="text-danger error-message" data-field="movie">{{ $message }}</span>
            @enderror
          
          </div>
          
          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" placeholder="1h 39m" value="{{old('duration')}}">
           
            @error('duration')
            <span class="text-danger error-message" data-field="duration">{{ $message }}</span>
            @enderror
          
          </div>
          
          <div class="form-group">
            <label>Date:</label>
            <div class="input-group date" id="release-date" data-target-input="nearest">
              <input type="text" name="release_date" class="form-control datetimepicker-input" placeholder="YYYY-MM-DD" data-target="#release-date" value="{{old('release_date')}}"/>
              <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>

            @error('release_date')
            <span class="text-danger error-message" data-field="release_date">{{ $message }}</span>
            @enderror

          </div>
          
          <div class="form-group">
            <label for="casts">Casts</label>
            <input type="text" class="form-control" id="casts" name="casts" placeholder="Jackie Chan" value="{{old('casts')}}">
            
            @error('casts')
            <span class="text-danger error-message" data-field="casts">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="categories">Categories</label>
            <input type="text" class="form-control" id="categories" name="categories" placeholder="Action, Fantasy" value="{{old('categories')}}">
            
            @error('categories')
            <span class="text-danger error-message" data-field="categories">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="small-thumbnail">Small Thumbnail</label>
            <input type="file" class="form-control" name="small_thumbnail">

            @error('small_thumbnail')
            <span class="text-danger error-message" data-field="small_thumbnail">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="large-thumbnail">Large Thumbnail</label>
            <input type="file" class="form-control" name="large_thumbnail">

            @error('large_thumbnail')
            <span class="text-danger error-message" data-field="large_thumbnail">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="short-about">Short About</label>
            <input type="text" class="form-control" id="short_about" name="short_about" placeholder="Awesome Movie" value="{{old('short_about')}}">

            @error('short_about')
            <span class="text-danger error-message" data-field="short_about">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label for="short-about">About</label>
            <input type="text" class="form-control" id="about" name="about" placeholder="Awesome Movie" value="{{old('about')}}">
           
            @error('about')
            <span class="text-danger error-message" data-field="about">{{ $message }}</span>
            @enderror

          </div>

          <div class="form-group">
            <label>Featured</label>
            <select class="custom-select" name="featured">
              <option value="0" {{old('featured') === '0' ? 'selected' : ""}}>No</option>
              <option value="1" {{old('featured') === '1' ? 'selected' : ""}}>Yes</option>
            </select>

            @error('featured')
            <span class="text-danger error-message" data-field="featured">{{ $message }}</span>
            @enderror

          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary btn-create">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script>
    formatDatePicker("#release-date");
    validationForm();
  </script>
@endsection