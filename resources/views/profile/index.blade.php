@extends('layouts.app')

@section('container')
<style>
    .profile-card {
        display: flex;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 20px;
    }
</style>

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <h4>Group Profile:</h4>
        <hr>
        <div class="col-md-10 my-2">
            <div class="card profile-card" style="border-radius:100px;">
                <div>
                    <div class="card-body">
                        <div class="profile-image" style="display: inline-block; vertical-align: middle;">
                            <img src="{{ asset('assets/img/rindu.jpg') }}" alt="Profile Image" style="max-width: 100%; height: auto;">
                        </div>
                        <div style="display: inline-block; vertical-align: middle;">
                            <h4>Deeva Rindu Wijarista Putri</h4>
                            <p>D4 Sistem Informasi Bisnis - 2141764143</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 mx-4 my-2 mb-5">
            <div class="card profile-card" style="border-radius:100px;">
                <div>
                    <div class="card-body">
                        <div class="profile-image" style="display: inline-block; vertical-align: middle;">
                            <img src="{{ asset('assets/img/kak bel-01.png') }}" alt="Profile Image" style="max-width: 100%; height: auto;">
                        </div>
                        <div style="display: inline-block; vertical-align: middle;">
                            <h4>Fiza Bella Rahmadanty Utomo</h4>
                            <p>D4 Sistem Informasi Bisnis - 2141764181</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6>Tentang Matakuliah:</h6>
        <hr>
        <div>
            <div class="card p-3 mb-3">
                <div>
                    <h5>Sistem Pendukung Keputusan (SPK)</h5>
                    <hr>
                    <p>Matakuliah Sistem Pendukung Keputusan (SPK) adalah mata kuliah yang membahas tentang konsep, metode, dan teknik yang digunakan dalam pengembangan sistem yang membantu pengambilan keputusan. Tujuan utama dari mata kuliah ini adalah mempelajari cara menggabungkan informasi, data, dan pengetahuan yang relevan untuk membantu pengambilan keputusan yang lebih baik dan lebih efektif.</p>
                    <hr>
                    <h6>Dosen Matakuliah:</h6>
                    <p>Ulla Delfana Rosiani, ST., MT., Dr.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
