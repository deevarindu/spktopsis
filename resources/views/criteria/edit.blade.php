@extends('layouts.app')

@section('container')
<div class="container-fluid pt-5">
  <h4>Assessment Criteria</h4>
  <hr>
  <div class="card p-3">
    <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control" id="kode" name="kode" value="{{ $criteria->kode }}">
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Kriteria</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $criteria->nama }}">
      </div>
      <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select class="form-select" id="jenis" name="jenis">
          <option value="Benefit" {{ $criteria->jenis === 'Benefit' ? 'selected' : '' }}>Benefit</option>
          <option value="Cost" {{ $criteria->jenis === 'Cost' ? 'selected' : '' }}>Cost</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="bobot" class="form-label">Bobot</label>
        <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $criteria->bobot }}">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
