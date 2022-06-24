@extends('dashboard.layout.main')
@section('content')
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List Users</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabel
                </div>
                <a type="button" class="btn btn-primary" href="tambah">Tambah</a>
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">email</th>
                                <th scope="col">edit/delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>

                                    <td class="row">
                                        <a type="button" href="tambah/{{ $item->id }}/edit" class="btn btn-warning col-4">Edit</a>
                                        <!-- <a href="hapusUser/{{ $item->id }}" class="btn btn-danger">Hapus</a> -->
                                        <form action="tambah/{{ $item->id }}" class="col-4" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('beneran mau hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
</main>
@endsection