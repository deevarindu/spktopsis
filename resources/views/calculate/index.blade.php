@extends('layouts.app')

@section('container')
    {{-- kode membuat perhitungan topsis --}}
    @php
      $criterias = $criterias;
      $alternatives = $alternatives;

      // Mengkonversikan ke dalam bentuk fuzzy
      $fuzzyAlternatives = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        for ($j = 0; $j < count($criterias); $j++) {
          $x = $alternatives[$i][$criterias[$j]['kode']];
          if ($alternatives[$i][$criterias[$j]['kode']] <= 50) {
            $fuzzyAlternatives[$i][$j] = 0.25;
          } elseif ($alternatives[$i][$criterias[$j]['kode']] <= 70) {
            $fuzzyAlternatives[$i][$j] = 0.5;
          } elseif ($alternatives[$i][$criterias[$j]['kode']] <= 90) {
            $fuzzyAlternatives[$i][$j] = 0.75;
          } else {
            $fuzzyAlternatives[$i][$j] = 1;
          }
        }
      }

      // Menghitung matriks ternormalisasi
      $squaredMatrix = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        for ($j = 0; $j < count($criterias); $j++) {
          $squaredMatrix[$i][$j] = round(pow($fuzzyAlternatives[$i][$j], 2), 5);
        }
      }

      $sumSquared = [];
      for ($j = 0; $j < count($criterias); $j++) {
        $sumSquared[$j] = 0;
        for ($i = 0; $i < count($alternatives); $i++) {
          $sumSquared[$j] += $squaredMatrix[$i][$j];
        }
      }

      $sqrtSumSquared = [];
      for ($j = 0; $j < count($criterias); $j++) {
        $sqrtSumSquared[$j] = round(sqrt($sumSquared[$j]), 5);
      }

      $normalizedMatrix = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        for ($j = 0; $j < count($criterias); $j++) {
          $normalizedMatrix[$i][$j] = round($fuzzyAlternatives[$i][$j] / $sqrtSumSquared[$j], 5);
        }
      }

      // Menghitung matriks ternormalisasi terbobot
      $normalizedWeightedMatrix = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        for ($j = 0; $j < count($criterias); $j++) {
        $normalizedWeightedMatrix[$i][$j] = round($normalizedMatrix[$i][$j] * $criterias[$j]['bobot'], 5);
        }
      }

      // Menghitung solusi ideal positif dan negatif
      $idealPositive = [];
      $idealNegative = [];

      for ($j = 0; $j < count($criterias); $j++) {
        $max = $normalizedWeightedMatrix[0][$j];
        $min = $normalizedWeightedMatrix[0][$j];
        for ($i = 1; $i < count($alternatives); $i++) {
          if ($normalizedWeightedMatrix[$i][$j] > $max) {
            $max = $normalizedWeightedMatrix[$i][$j];
          }
          if ($normalizedWeightedMatrix[$i][$j] < $min) {
            $min = $normalizedWeightedMatrix[$i][$j];
          }
        }
        $idealPositive[$j] = $max;
        $idealNegative[$j] = $min;
      }

      // Menghitung jarak solusi ideal positif dan negatif
      $positiveDistance = [];
      $negativeDistance = [];

      for ($i = 0; $i < count($alternatives); $i++) {
        $positiveDistance[$i] = 0;
        $negativeDistance[$i] = 0;
        for ($j = 0; $j < count($criterias); $j++) {
          $positiveDistance[$i] += pow($normalizedWeightedMatrix[$i][$j] - $idealPositive[$j], 2);
          $negativeDistance[$i] += pow($normalizedWeightedMatrix[$i][$j] - $idealNegative[$j], 2);
        }
        $positiveDistance[$i] = round(sqrt($positiveDistance[$i]), 5);
        $negativeDistance[$i] = round(sqrt($negativeDistance[$i]), 5);
      }

      // Menghitung preferensi relatif
      $preferences = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        $preferences[$i] = round($negativeDistance[$i] / ($positiveDistance[$i] + $negativeDistance[$i]), 5);
      }

      // Mengurutkan alternatif berdasarkan preferensi relatif
      $sortedAlternatives = [];
      for ($i = 0; $i < count($alternatives); $i++) {
        $sortedAlternatives[$i] = $alternatives[$i];
        $sortedAlternatives[$i]['preference'] = $preferences[$i];
      }
      usort($sortedAlternatives, function ($a, $b) {
        return $b['preference'] <=> $a['preference'];
      });

    @endphp

<div class="container-fluid pt-5">
  <h4>Penilaian Kinerja Guru dengan Metode TOPSIS</h4>
  <hr>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>1. Matriks keputusan:</h6>
      <hr>
    </div>

    {{-- Menampilkan matriks keputusan --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          @foreach ($criterias as $criteria)
            <th>{{ $criteria['nama'] }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($alternatives as $key => $alternative)
          <tr>
            <th>{{ $alternative['nama'] }}</th>
            @foreach ($criterias as $criteria)
              <td>{{ $alternative[$criteria['kode']] }}</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>2. Mengkonversikan data ke dalam bentuk fuzzy:</h6>
      <hr>
    </div>

    {{-- Menampilkan table fuzzy --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          @foreach ($criterias as $criteria)
            <th>{{ $criteria['nama'] }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($fuzzyAlternatives as $key => $fuzzyAlternative)
          <tr>
            <th>{{ $alternatives[$key]['nama'] }}</th>
            @foreach ($fuzzyAlternative as $fuzzy)
              <td>{{ $fuzzy }}</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>3. Matriks yang ternormalisasi:</h6>
      <hr>
    </div>

    {{-- Menampilkan matriks ternormalisasi --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          @foreach ($criterias as $criteria)
            <th>{{ $criteria['nama'] }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($normalizedMatrix as $key => $normalized)
          <tr>
            <th>{{ $alternatives[$key]['nama'] }}</th>
            @foreach ($normalized as $normal)
              <td>{{ $normal }}</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>4. Matriks ternormalisasi yang terbobot:</h6>
      <hr>
    </div>

    {{-- Menampilkan matriks ternormalisasi yang terbobot --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          @foreach ($criterias as $criteria)
            <th>{{ $criteria['nama'] }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($normalizedWeightedMatrix as $key => $normalizedWeighted)
          <tr>
            <th>{{ $alternatives[$key]['nama'] }}</th>
            @foreach ($normalizedWeighted as $normalWeighted)
              <td>{{ $normalWeighted }}</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>5. Menentukan solusi ideal Positif (A+) dan ideal Negatif (A-)</h6>
      <hr>
    </div>

    {{-- Menampilkan solusi ideal positif dan negatif --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Kriteria</th>
          <th>A+</th>
          <th>A-</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($criterias as $key => $criteria)
          <tr>
            <th>{{ $criteria['nama'] }}</th>
            <td>{{ $idealPositive[$key] }}</td>
            <td>{{ $idealNegative[$key] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>6. Menghitung jarak solusi ideal Positif (D+) dan solusi ideal Negatif (D-)</h6>
      <hr>
    </div>

    {{-- Menampilkan jarak solusi ideal positif dan negatif --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          <th>D+</th>
          <th>D-</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($alternatives as $key => $alternative)
          <tr>
            <th>{{ $alternative['nama'] }}</th>
            <td>{{ $positiveDistance[$key] }}</td>
            <td>{{ $negativeDistance[$key] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>7. Menghitung preferensi relatif</h6>
      <hr>
    </div>

    {{-- Menampilkan preferensi relatif --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Alternatif</th>
          <th>V</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($alternatives as $key => $alternative)
          <tr>
            <th>{{ $alternative['nama'] }}</th>
            <td>{{ $preferences[$key] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card px-3 pt-3 mb-4">
    <div>
      <h6>8. Hasil Perankingan</h6>
      <hr>
    </div>

    {{-- Menampilkan hasil perankingan --}}
    <table class="table table-bordered table-hover text-center">
      <thead class="align-middle">
        <tr class="table-secondary">
          <th>Ranking</th>
          <th>Alternatif</th>
          <th>V</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sortedAlternatives as $key => $sortedAlternative)
          <tr>
            <th>{{ $key + 1 }}</th>
            <td>{{ $sortedAlternative['nama'] }}</td>
            <td>{{ $sortedAlternative['preference'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
