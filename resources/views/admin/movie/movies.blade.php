@extends('admin.layouts.base');

@section('title', 'Movies');
    
@section('content')
  
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Movies</h3>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('admin.movie.create')}}" class="btn btn-warning">Create Movie</a>
            </div>
          </div>

          @if (session()->has('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif

          <div class="row">
            <div class="col-md-12">
              <table id="movie-table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Small Thumbnail</th>
                    <th>Large Thumbnail</th>
                    <th>Categories</th>
                    <th>Casts</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $item)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->title}}</td>
                      <td>
                        <img src="{{asset('storage/assets/images/thumbnails/'.$item->small_thumbnail)}}" width="50" alt="small_thumbnail">
                      </td>
                      <td>
                        <img src="{{asset('storage/assets/images/thumbnails/'.$item->large_thumbnail)}}" width="50" alt="large_thumbnail">
                      </td>
                      <td>{{$item->categories}}</td>
                      <td>{{$item->casts}}</td>
                      <td>
                        <div class="d-flex justify-content-between">
                          <a href="{{route('admin.movie.edit', $item->id)}}" class="btn btn-secondary h-25" title="Edit"><i class="far fa-edit"></i></a>

                          <form method="POST" action="{{route('admin.movie.destroy',  $item->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                          </form>
                        </div>
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
  </div>
@endsection

@section('js')
<script>
  $('#movie-table').DataTable();
</script> 
@endsection