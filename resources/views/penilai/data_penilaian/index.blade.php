@extends('layouts.penilai.master')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('penilai.data_penilaian.create') }}" class="btn btn-success float-right"><i
                    class="fas fa-fw fa-plus-circle"></i>
                Tambah Nilai</a>
            <h5 class="m-0 font-weight-bold text-primary">Penilaian Calon</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr style="text-align: center">
                            <th width="50px">No</th>
                            <th width="200px">Nama Calon</th>
                            @foreach ($kriteria->sortBy('kode_kriteria') as $kriteriaItem)
                                <th>{{ $kriteriaItem->kode_kriteria }}</th>
                            @endforeach
                            <th width="10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($calon as $item)
                            @if ($item->dataPenilaian->isNotEmpty())
                                <tr style="text-align: center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_calon }}</td>
                                    @foreach ($kriteria->sortBy('kode_kriteria') as $kriteriaItem)
                                        @php
                                            $penilai_id = Auth::guard('penilaiMiddle')->user()->id;
                                            $penilaian = $item->dataPenilaian
                                                ->where('id_kriteria', $kriteriaItem->kriteria_id)
                                                ->where('penilai_id', $penilai_id)
                                                ->first();
                                            $nilai = $penilaian ? $penilaian->nilai : 0;
                                        @endphp
                                        <td>{{ $nilai }}</td>
                                    @endforeach
                                    <td style="width: 200px; text-align: center">
                                        <div>
                                            <a href="{{ route('penilai.data_penilaian.edit', ['id_calon' => $item->calon_id, 'id_kriteria' => $kriteriaItem->kriteria_id, 'penilai_id' => Auth::guard('penilaiMiddle')->user()->id]) }}"
                                                class="btn btn-sm btn-primary">Edit Nilai</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
