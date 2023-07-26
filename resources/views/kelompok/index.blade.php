@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pemimpin Kelompok</div>

                <div class="card-body">
                    <div class="container">
                        <h1>Input Absensi</h1>
                        <p>Date: {{ $currentDate }}</p>
                        <h3>Piket Hadir: {{ $piketGroups['Piket Hadir'] }}</h3>
                        <h3>Cadangan Piket: {{ $piketGroups['Cadangan Piket'] }}</h3>
                        <h3>Lepas Piket: {{ $piketGroups['Lepas Piket'] }}</h3>

                        @if ($absensi)
                        <div class="alert alert-success">
                            <strong>Success!</strong> Indicates a successful or positive action.
                          </div>
                        @else

                        <form action="{{ route('kelompok.store') }}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Status Piket</th>
                                        <th>Ket. Ijin/Sakit/dll</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggotaHadir as $anggota)
                                        <tr>
                                            <td>{{ $anggota->nama }}<input type="hidden" name="anggota_id[]" value="{{ $anggota->id }}"></td>
                                            <td>{{ $anggota->jabatan }}</td>
                                            <td>
                                                <select name="status[{{ $anggota->id }}]" class="form-control">
                                                    <option value="Piket Hadir" selected='selected'>Piket Hadir</option>
                                                    <option value="Cadangan Piket">Cadangan Piket</option>
                                                    <option value="Lepas Piket">Lepas Piket</option>
                                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="keterangan" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($anggotaCadangan as $anggota)
                                        <tr>
                                            <td>{{ $anggota->nama }}<input type="hidden" name="anggota_id[]" value="{{ $anggota->id }}"></td>
                                            <td>{{ $anggota->jabatan }}</td>
                                            <td>
                                                <select name="status[{{ $anggota->id }}]" class="form-control">
                                                    <option value="Piket Hadir">Piket Hadir</option>
                                                    <option value="Cadangan Piket" selected='selected'>Cadangan Piket</option>
                                                    <option value="Lepas Piket">Lepas Piket</option>
                                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="keterangan" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($anggotaLepas as $anggota)
                                        <tr>
                                            <td>{{ $anggota->nama }}<input type="hidden" name="anggota_id[]" value="{{ $anggota->id }}"></td>
                                            <td>{{ $anggota->jabatan }}</td>
                                            <td>
                                                <select name="status[{{ $anggota->id }}]" class="form-control">
                                                    <option value="Piket Hadir" >Piket Hadir</option>
                                                    <option value="Cadangan Piket" >Cadangan Piket</option>
                                                    <option value="Lepas Piket" selected='selected'>Lepas Piket</option>
                                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="keterangan" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
