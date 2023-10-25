@extends('layouts.app')

@section('container')

<div class="container-fluid pt-5">
  <h4>Assessment Criteria</h4>
  <hr>
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
            <th scope="col">ID</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Jenis</th>
            <th scope="col">Bobot</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($criterias as $c)
          <tr class="text-center">
            <th scope="row">C{{ $c->id }}</th>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->jenis }}</td>
            <td>{{ $c->bobot }}</td>
            <td>
              <a href="{{ route('criteria.edit', $c->id) }}"class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square" style="color: white;"></i>
              </a>

            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
