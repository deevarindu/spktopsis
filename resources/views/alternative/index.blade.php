@extends('layouts.app')

@section('container')

<div class="container-fluid pt-5">
  <h4>Alternative Data</h4>
  <hr>

  <div class="mb-3">
    <a href="{{ route('alternative.create') }}" class="btn btn-success">+ Tambah Alternatif</a>
  </div>

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-12 mt-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card p-3">
    <div class="table-responsive col-lg-12">
      <table class="table table-hover table-bordered table-sm">
        <thead class="text-center">
          <tr class="table-secondary">
            <th scope="col">Nama Alternatif</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">C5</th>
            <th scope="col">C6</th>
            <th scope="col">C7</th>
            <th scope="col">C8</th>
            <th scope="col">C9</th>
            <th scope="col">C10</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach ($alternatives as $a)
          <tr class="text-center">
            <th>{{ $a->nama }}</th>
            <td>{{ $a->c1 }}</td>
            <td>{{ $a->c2 }}</td>
            <td>{{ $a->c3 }}</td>
            <td>{{ $a->c4 }}</td>
            <td>{{ $a->c5 }}</td>
            <td>{{ $a->c6 }}</td>
            <td>{{ $a->c7 }}</td>
            <td>{{ $a->c8 }}</td>
            <td>{{ $a->c9 }}</td>
            <td>{{ $a->c10 }}</td>
            <td>
              <a href="{{ route('alternative.edit', $a->id) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square" style="color: white;"></i>
              </a>
              <form action="{{ route('alternative.destroy', $a->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash" style="color: white;"></i>
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

@endsection
