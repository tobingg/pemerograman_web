@extends('layouts.app')

@section('content')
    <style>
        .containerr {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40%;
        }
    </style>

    <br><br>
    <!-- pembungkus tag -->
    <div class="containerr">
        <img src="/assets/mt.jpg" alt="">
    </div>

    <br><br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>PENDAFTARAN MAHASISWA BARU </h2>
                {{-- <a href="{{ route('login') }}" class="btn btn-primary">Login</a> --}}

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i
                        class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Lengkap</th>
            <th>Umur</th>
            <th>Tanggal Pendaftaran</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->introduction }}</td>
                <td>{{ $project->location }}</td>
                <td>{{ $project->cost }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('projects.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $projects->links() !!}

    <br><br><br><br>
@endsection
