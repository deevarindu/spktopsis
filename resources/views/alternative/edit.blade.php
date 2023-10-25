@extends('layouts.app')

@section('container')
<div class="container-fluid pt-5">
  <h4>Alternative Data</h4>
  <hr>

  <div class="card p-3">
      <form action="{{ route('alternative.update', $alternative->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternative->nama }}">
        </div>
        @foreach ($criterias as $c)
        <div class="mb-3">
            <label for="c{{ $c->id }}" class="form-label">{{ $c->nama }}</label>
            <input type="text" class="form-control" id="c{{ $c->id }}" name="c{{ $c->id }}" value="{{ $alternative['c'.$c->id] }}">
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
</div>
@endsection
