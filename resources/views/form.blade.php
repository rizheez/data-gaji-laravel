@extends('layouts.main')

@section('title', 'Form Input Gaji')


@push('css')
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
@endpush


@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">

            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Input Data Gaji Karyawan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('formgaji') }}" id="myForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nik">NOMOR INDUK KARYAWAN</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control"
                                                        placeholder="Nomor Induk Karyawan" id="nik" name="nik">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-badge"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama">NAMA KARYAWAN</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama Karyawan"
                                                        id="nama" name="nama">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jabatan">JABATAN</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="jabatan" name="jabatan">
                                                    <option selected>Pilih Jabatan</option>
                                                    <option value="direktur">Direktur</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="staf">Staf</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="gajibulan">GAJI BULAN</label>
                                                <div class="position-relative">
                                                    <input type="month" class="form-control" id="gajibulan"
                                                        name="gajibulan" value="{{ date('Y-m') }}" min="2023-01"
                                                        max="2028-12">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="telat">JUMLAH HARI TELAT</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control"
                                                        placeholder="Jumlah Hari Telat" id="telat" name="telat"
                                                        min="0" max="31">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            {{-- <button id="success" class="btn btn-outline-success btn-lg btn-block">Success</button> --}}
                                            <button id="success" type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        document.querySelector('#myForm').addEventListener('submit', (e) => {
            e.preventDefault();

            // Get the form data
            const formData = new FormData(e.target);

            // Validasi apakah semua field diisi
            if (!formData.get('nik') || !formData.get('nama') || !formData.get('telat')) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Harap isi semua field',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            // Submit form jika data sudah diisi
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data berhasil disimpan',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            })
        });
    </script>
@endpush
