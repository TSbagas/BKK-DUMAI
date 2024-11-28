@extends('templates.template')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h5 class="mb-3 card-title text-uppercase">Import Data</h5>
                    <p class="mb-0 text-body"><i class="menu-icon tf-icons ti ti-files"></i> Silahkan import data yang
                        sudah diunduh dari <b class="text-primary">Sinkarkes</b>.</p>
                </div>
                <div class="card-body p-5">

                    @if ($errors->any())
                    <div class="alert alert-danger pt-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="list-style: none">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/bank_data/import_data" method="POST" enctype="multipart/form-data" class="">
                        @csrf
                        <div class="border-dotted p-3" style="border: 2px dotted #ccc; border-radius: 5px;">
                            <input class="form-control form-control-lg" id="formFileLg" name="file" type="file">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Import</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card h-100 mt-5 p-5">
                <!-- Ajax Sourced Server-side -->
                <div class="p-2" style="border: 2px dotted #ccc; border-radius: 5px;">
                    {{-- <h5 class="card-header">Ajax Sourced Server-side</h5> --}}
                    <div class="card-datatable text-nowrap">
                        <table class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Nama Balai Karkes</th>
                                    <th class="bg-primary text-white">No Registrasi IMO</th>
                                    <th class="bg-primary text-white">Nama Kapal</th>
                                    <th class="bg-primary text-white">Jenis Kapal</th>
                                    <th class="bg-primary text-white">Bendera Kapal</th>
                                    <th class="bg-primary text-white">Berat</th>
                                    <th class="bg-primary text-white">Pelabuhan Kedatangan</th>
                                    <th class="bg-primary text-white">Pelabuhan Berikutnya</th>
                                    <th class="bg-primary text-white">Jumlah ABK WNA</th>
                                    <th class="bg-primary text-white">Jumlah ABK WNI</th>
                                    <th class="bg-primary text-white">Jumlah Penumpang WNA</th>
                                    <th class="bg-primary text-white">Jumlah Penumpang WNI</th>
                                    <th class="bg-primary text-white">Tanggal Terbit</th>
                                    <th class="bg-primary text-white">Jam Terbit</th>
                                    <th class="bg-primary text-white">Nama Penerbit</th>
                                    <th class="bg-primary text-white">Berlaku Sampai Tanggal</th>
                                    <th class="bg-primary text-white">Nama Petugas</th>
                                    <th class="bg-primary text-white">Keterangan</th>
                                    <th class="bg-primary text-white">Tanggal Published</th>
                                    <th class="bg-primary text-white">QR Code</th>
                                    <th class="bg-primary text-white">Nama Wajib Bayar</th>
                                    <th class="bg-primary text-white">NPN</th>
                                    <th class="bg-primary text-white">NTB</th>
                                    <th class="bg-primary text-white">Jam Bayar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--/ Ajax Sourced Server-side -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-fluid">
            <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </div>
                <div class="d-none d-lg-inline-block">
                    <b>BKK Dumai</b>
                </div>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
@endsection
