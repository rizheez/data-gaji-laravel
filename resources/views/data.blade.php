@extends('layouts.main')

@section('title', 'Data Gaji')




@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fs-3">DATA GAJI KARYAWAN</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>NIK</th>
                                            <th>NAMA KARYAWAN</th>
                                            <th>JABATAN</th>
                                            <th>GAJI BULAN</th>
                                            <th>TELAT</th>
                                            <th>GAJI POKOK</th>
                                            <th>DENDA</th>
                                            <th>TOTAL GAJI</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nik }}</td>
                                                <td>{{ strtoupper($d->nama) }}</td>
                                                <td>{{ strtoupper($d->jabatan) }}</td>
                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $d->gajibulan)->isoFormat('MMMM Y') }}
                                                </td>
                                                <td>{{ $d->telat }} Hari</td>
                                                <td>Rp. {{ number_format($d->nominalgaji, 0, ',', '.') }}</td>
                                                <td>Rp. {{ number_format($d->denda, 0, ',', '.') }}</td>
                                                <td>Rp. {{ number_format($d->totalgaji, 0, ',', '.') }}</td>
                                                {{-- <td>Rp. {{ $d->denda }}</td>
                                                <td>Rp. {{ $d->totalgaji }}</td> --}}

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
@endpush
