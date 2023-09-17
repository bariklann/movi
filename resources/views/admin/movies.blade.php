@extends('admin.layouts.base')
@section('title', 'Movies')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">Movies</div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.movie.create') }}" class="btn btn-warning">Create Movies</a>
                        </div>
                    </div>
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <table id="movie" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Thumbnail</th>
                                        <th>Thumbnail</th>
                                        <th>Categories</th>
                                        <th>Casts</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $movie->title }}</td>
                                            <td><img src="{{ asset('storage/thumbnail/' . $movie->small_thumbnail) }}"
                                                    alt="Small Thumbnail" width="100"></td>
                                            <td><img src="{{ asset('storage/thumbnail/' . $movie->large_thumbnail) }}"
                                                    alt="Large Thumbnail" width="100"></td>
                                            <td>{{ $movie->categories }}</td>
                                            <td>{{ $movie->casts }}</td>
                                            <td>
                                                <!-- Tambahkan tombol edit dan delete sesuai kebutuhan -->
                                                <a href="{{ route('admin.movie.edit', $movie->id) }}"
                                                    class="btn btn-secondary d-inline" title="Edit">
                                                    <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.movie.destroy', $movie->id) }}" method="post"
                                                    title="hapus" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
        $('#movie').DataTable(); // Menginisialisasi DataTables pada tabel
    </script>
@endsection
