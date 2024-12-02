@extends('templates.template')

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <!-- Display success message if available -->
    @if(session('success'))
        <div style="background-color: #4CAF50; color: white; padding: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation errors if available -->
    @if($errors->any())
        <div style="background-color: #f44336; color: white; padding: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header pb-3">
                    <h5 class="mb-3 card-title text-uppercase">Laporan Hasil Pemeriksaan Kapal Dalam Karantina</h5>
                    <p class="mb-0 text-body text-uppercase"><i class="menu-icon tf-icons ti ti-files"></i>Quarantine
                        Inssfection Ship's Report</p>
                </div>
            </div>

            <div class="card h-100 mt-5 p-5">
                <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Data Umum</span>
                                    <span class="bs-stepper-subtitle">General Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#personal-info-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Data Khusus</span>
                                    <span class="bs-stepper-subtitle">Spesific Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-brand-instagram"></i> </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Kesimpulan</span>
                                    <span class="bs-stepper-subtitle">Conclution</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#recomendation-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-brand-instagram"></i> </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Rekomendasi</span>
                                    <span class="bs-stepper-subtitle">Recomendation</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form action="{{ route('cop.create') }}" method="POST">
                            <!-- Data Umum -->
                            @csrf
                            <div id="account-details-vertical" class="content">
                                <div class="row g-6">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="namakapal">Nama Kapal (Ship's Name)</label>
                                        <input type="text" name="namakapal" id="namakapal" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="namakapten">Nama Kapten (Master's Name)</label>
                                        <input type="text" name="namakapten" id="namakapten" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="bendera">Bendera (Flag)</label>
                                        <input type="text" name="bendera" id="bendera" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="besarkapal">Besar Kapal (GRT)</label>
                                        <input type="text" name="besarkapal" id="besarkapal" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="noimo">No. IMO (IMO Number)</label>
                                        <input type="text" name="noimo" id="noimo" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="agenkapal">Agen Kapal (Agent's Name)</label>
                                        <input type="text" name="agenkapal" id="agenkapal" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="pelabuhanasal">Pelabuhan Asal (Last Port)</label>
                                        <input type="text" name="pelabuhanasal" id="pelabuhanasal"
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="pelabuhantujuan">Pelabuhan Tujuan (Next
                                            Port)</label>
                                        <input type="text" name="pelabuhantujuan" id="pelabuhantujuan"
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label" for="tanggaltiba">Tanggal Tiba (Date Of
                                                    Arrival)</label>
                                                <input type="text" name="tanggaltiba" id="tanggaltiba date-mask"
                                                    class="form-control date-mask" placeholder="YYYY-MM-DD" />
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="jamtiba">Jam (Time Of Arrival)</label>
                                                <input type="text" name="jamtiba" id="jamtiba time-mask"
                                                    class="form-control time-mask" placeholder="hh:mm:ss" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="lokasitiba">Lokasi (Location)</label>
                                        <input type="text" name="lokasitiba" id="lokasitiba" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label" for="tanggalsandar">Tanggal Sandar (Date Of
                                                    Berthed)</label>
                                                <input type="text" name="tanggalsandar" id="tanggalsandar date-mask1"
                                                    class="form-control date-mask1" placeholder="YYYY-MM-DD" />
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <label class="form-label" for="jamsandar">Jam (Time Of
                                                        Berthed)</label>
                                                    <input type="text" name="jamsandar" id="jamsandar time-mask1"
                                                        class="form-control time-mask1" placeholder="hh:mm:ss" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="lokasisandar">Lokasi (Location)</label>
                                        <input type="text" name="lokasisandar" id="lokasisandar" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label" for="tanggaldiperiksa">Tanggal Diperiksa (Date
                                                    Of Inspection)</label>
                                                <input type="text" name="tanggaldiperiksa"
                                                    id="tanggaldiperiksa date-mask2" class="form-control date-mask2"
                                                    placeholder="YYYY-MM-DD" />
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <label class="form-label" for="jamdiperiksa">Jam (Time Of
                                                        Insfection)</label>
                                                    <input type="text" name="jamdiperiksa" id="jamdiperiksa time-mask2"
                                                        class="form-control time-mask2" placeholder="hh:mm:ss" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="lokasidiperiksa">Lokasi (Location)</label>
                                        <input type="text" name="lokasidiperiksa" id="lokasidiperiksa"
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="mb-0">Jumlah ABK (Number Of Crews)</h6>
                                        <label class="form-label" for="abkasing">Asing (Foreigner)</label>
                                        <input type="number" name="abkasing" id="abkasing" class="form-control" />

                                        <label class="form-label mt-4" for="abkri">RI (Indonesian)</label>
                                        <input type="number" name="abkri" id="abkri" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="mb-0">Jumlah Penumpang (Number Of Passengers)</h6>
                                        <label class="form-label" for="penumpangasing">Asing (Foreigner)</label>
                                        <input type="number" name="penumpangasing" id="penumpangasing"
                                            class="form-control" />

                                        <label class="form-label mt-4" for="penumpangri">RI (Indonesian)</label>
                                        <input type="number" name="penumpangri" id="penumpangri" class="form-control" />
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-label-secondary btn-prev" disabled>
                                            <i class="ti ti-arrow-left ti-xs me-sm-2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Data Khusus -->
                            <div id="personal-info-vertical" class="content">
                                <div class="row g-6">
                                    <div class="row">
                                        <ol type="A">
                                            <li class="mt-5">Pelanggaran Karantina (Quarantine Breach)</li>
                                            <ol type="1">
                                                <li>Isyarat Karantina (Quarantine Signal)</li>
                                                <div class="col mt-5">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp">
                                                            <input class="form-check-input" type="radio"
                                                                name="isyarat_karantina" value="Pasang"
                                                                id="customRadioTemp" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Pasang</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small class="option-text">Displayed</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col mt-5">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp1">
                                                            <input class="form-check-input" type="radio"
                                                                name="isyarat_karantina" value="Tidak Pasang"
                                                                id="customRadioTemp1" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Tidak Pasang</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small>Undisplayed</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <li class="mt-5">Aktivitas di Atas Kapal (Activity on Board)</li>
                                                <div class="col mt-5">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp2">
                                                            <input class="form-check-input" type="radio" value="Ada bongkar muat sebelum
                                                                    penerbitan Free Pratique" id="customRadioTemp2"
                                                                name="aktivitas_diatas_kapal" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Ada bongkar muat sebelum
                                                                    penerbitan Free Pratique</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small class="option-text">Discharge before Free
                                                                    Pratique Issued</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col mt-5">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp3">
                                                            <input class="form-check-input" type="radio" value="Menaikkan / menurunkan orang
                                                                    sebelum penerbiatan Free Pratique"
                                                                id="customRadioTemp3" name="aktivitas_diatas_kapal" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Menaikkan / menurunkan orang
                                                                    sebelum penerbiatan Free Pratique</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small>Carried up/down person before Free Pratique
                                                                    Issued</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col mt-5">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp4">
                                                            <input class="form-check-input" type="radio"
                                                                value="Tidak ada" id="customRadioTemp4"
                                                                name="aktivitas_diatas_kapal" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Tidak ada</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small>None</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </ol>
                                            <li class="mt-5">Dokumen Kesehatan (Health Document)</li>
                                            <div class="row border border-1 mt-5">
                                                <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                    <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                    <span>Pernyataan Kesehatan Maritim (Maritime declaration of
                                                        health)</span></h6>
                                                </div>
                                                <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                    <h6>Kondisi (Condition)</h6>
                                                    <div x-data="{ showRemark: false }">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div
                                                                    class="form-check custom-option custom-option-basic">
                                                                    <label
                                                                        class="form-check-label custom-option-content"
                                                                        for="customRadioTemp5">
                                                                        <input name="kes_maritim_kondisi"
                                                                            class="form-check-input" type="radio"
                                                                            value="Ada" id="customRadioTemp5"
                                                                            x-on:click="showRemark = false" />
                                                                        <span class="custom-option-header">
                                                                            <span class="h6 mb-0">Ada</span>
                                                                        </span>
                                                                        <span class="custom-option-body">
                                                                            <small>Available.</small>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div
                                                                    class="form-check custom-option custom-option-basic">
                                                                    <label
                                                                        class="form-check-label custom-option-content"
                                                                        for="customRadioTemp6">
                                                                        <input name="kes_maritim_kondisi"
                                                                            class="form-check-input" type="radio"
                                                                            value="Tidak Ada" id="customRadioTemp6"
                                                                            x-on:click="showRemark = true" />
                                                                        <span class="custom-option-header">
                                                                            <span class="h6 mb-0">Tidak Ada</span>
                                                                        </span>
                                                                        <span class="custom-option-body">
                                                                            <small>None.</small>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div x-show="showRemark" style="background-color:#eee;"
                                                            class="p-3 col-sm-12 mt-3">
                                                            <h6>Keterangan (Remark)</h6>
                                                            <div class="input-group m-2">
                                                                <span class="input-group-text">Alasan</span>
                                                                <textarea name="kes_maritim_alasan" class="form-control"
                                                                    aria-label="With textarea"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row border border-1 mt-5">
                                                <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                    <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                    <span>Sertifikat sanitasi kapal (Ship sanitation control/exemption
                                                        certificate)</span></h6>
                                                    <label class="form-label" for="tempatterbit">Tempat terbit (Place of
                                                        Issued)</label>
                                                    <input type="text" name="sani_kpl_tempat_terbit" id="tempatterbit"
                                                        class="form-control" />
                                                    <label class="form-label" for="tanggalterbit">Tanggal terbit (Date
                                                        of
                                                        Issued)</label>
                                                    <input type="text" name="sani_kpl_tanggal_terbit"
                                                        id="tanggalterbit date-mask3" class="form-control date-mask3"
                                                        placeholder="YYYY-MM-DD" />
                                                    <label class="form-label" for="berlakusampai">Berlaku sampai dengan
                                                        (Valid Until)</label>
                                                    <input type="text" name="sani_kpl_berlaku_sampai"
                                                        id="berlakusampai date-mask4" class="form-control date-mask4"
                                                        placeholder="YYYY-MM-DD" />
                                                </div>
                                                <div x-data="{ showInnerOptions: false, showRemark: false }">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp7">
                                                                    <input name="sani_kpl_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Ada" id="customRadioTemp7"
                                                                        x-on:click="showInnerOptions = true; showRemark = false" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>Available.</small>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="row mt-3" x-show="showInnerOptions">
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption5">
                                                                            <input name="sani_kpl_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Sesuai" id="innerOption5" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Relevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption6">
                                                                            <input name="sani_kpl_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Tidak Sesuai"
                                                                                id="innerOption6" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Tidak
                                                                                    Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Irrelevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp8">
                                                                    <input name="sani_kpl_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Tidak Ada" id="customRadioTemp8"
                                                                        x-on:click="showInnerOptions = false; showRemark = true" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Tidak
                                                                            Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>None.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div x-show="showRemark" style="background-color:#eee;"
                                                        class="p-3 col-sm-12 mt-3">
                                                        <h6>Keterangan (Remark)</h6>
                                                        <div class="input-group m-2">
                                                            <span class="input-group-text">Alasan</span>
                                                            <textarea class="form-control" aria-label="With textarea"
                                                                name="sani_kpl_alasan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row border border-1 mt-5">
                                    <div style="background-color:#eee;" class="p-3 col-sm-12">
                                        <h6>Jenis Dokumen (Kind Of Document)</h6>
                                        <span>Daftar ABK (Crew List)</span></h6>
                                    </div>
                                    <div style="background-color:#eee;" class="p-3 col-sm-12">
                                        <h6>Kondisi (Condition)</h6>
                                        <div x-data="{ showRemark: false }">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp9">
                                                            <input name="daftar_abk_kondisi" class="form-check-input"
                                                                type="radio" value="Ada" id="customRadioTemp9"
                                                                x-on:click="showRemark = false" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Ada</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small>Available.</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check custom-option custom-option-basic">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioTemp10">
                                                            <input name="daftar_abk_kondisi" class="form-check-input"
                                                                type="radio" value="Tidak Ada" id="customRadioTemp10"
                                                                x-on:click="showRemark = true" />
                                                            <span class="custom-option-header">
                                                                <span class="h6 mb-0">Tidak Ada</span>
                                                            </span>
                                                            <span class="custom-option-body">
                                                                <small>None.</small>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div x-show="showRemark" style="background-color:#eee;"
                                                class="p-3 col-sm-12 mt-3">
                                                <h6>Keterangan (Remark)</h6>
                                                <div class="input-group m-2">
                                                    <span class="input-group-text">Alasan</span>
                                                    <textarea name="daftar_abk_alasan" class="form-control"
                                                        aria-label="With textarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row border border-1 mt-5">
                                        <div style="background-color:#eee;" class="p-3 col-sm-12">
                                            <h6>Jenis Dokumen (Kind Of Document)</h6>
                                            <span>Daftar Vaksinasi (Vaccination List)</span></h6>
                                        </div>
                                        <div style="background-color:#eee;" class="p-3 col-sm-12">
                                            <h6>Kondisi (Condition)</h6>
                                            <div x-data="{ showRemark: false }">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check custom-option custom-option-basic">
                                                            <label class="form-check-label custom-option-content"
                                                                for="customRadioTemp11">
                                                                <input name="daftar_vaksinasi_kondisi"
                                                                    class="form-check-input" type="radio" value="Ada"
                                                                    id="customRadioTemp11"
                                                                    x-on:click="showRemark = false" />
                                                                <span class="custom-option-header">
                                                                    <span class="h6 mb-0">Ada</span>
                                                                </span>
                                                                <span class="custom-option-body">
                                                                    <small>Available.</small>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check custom-option custom-option-basic">
                                                            <label class="form-check-label custom-option-content"
                                                                for="customRadioTemp12">
                                                                <input name="daftar_vaksinasi_kondisi"
                                                                    class="form-check-input" type="radio"
                                                                    value="Tidak Ada" id="customRadioTemp12"
                                                                    x-on:click="showRemark = true" />
                                                                <span class="custom-option-header">
                                                                    <span class="h6 mb-0">Tidak Ada</span>
                                                                </span>
                                                                <span class="custom-option-body">
                                                                    <small>None.</small>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div x-show="showRemark" style="background-color:#eee;"
                                                    class="p-3 col-sm-12 mt-3">
                                                    <h6>Keterangan (Remark)</h6>
                                                    <div class="input-group m-2">
                                                        <span class="input-group-text">Alasan</span>
                                                        <textarea name="daftar_vaksinasi_alasan" class="form-control"
                                                            aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border border-1 mt-5">
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                <span>Buku ICV (International Certificate of
                                                    Vaccination)</span>
                                                </h6>
                                            </div>
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Kondisi (Condition)</h6>
                                                <div x-data="{ showInnerOptions: false, showRemark: false }">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp13">
                                                                    <input name="buku_icv_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Ada" id="customRadioTemp13"
                                                                        x-on:click="showInnerOptions = true; showRemark = false" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>Available.</small>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="row mt-3" x-show="showInnerOptions">
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption1">
                                                                            <input name="buku_icv_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Sesuai" id="innerOption1" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Relevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption2">
                                                                            <input name="buku_icv_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Tidak Sesuai"
                                                                                id="innerOption2" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Tidak
                                                                                    Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Irrelevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp14">
                                                                    <input name="buku_icv_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Tidak Ada" id="customRadioTemp14"
                                                                        x-on:click="showInnerOptions = false; showRemark = true" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Tidak
                                                                            Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>None.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div x-show="showRemark" style="background-color:#eee;"
                                                        class="p-3 col-sm-12 mt-3">
                                                        <h6>Keterangan (Remark)</h6>
                                                        <div class="input-group m-2">
                                                            <span class="input-group-text">Alasan</span>
                                                            <textarea name="buku_icv_alasan" class="form-control"
                                                                aria-label="With textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border border-1 mt-5">
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                <span>Sertifikat P3K (Medicine Certificate)</span></h6>
                                                <label class="form-label" for="tempatterbit">Tempat terbit
                                                    (Place of
                                                    Issued)</label>
                                                <input type="text" name="p3k_tempat_terbit" id="tempatterbit"
                                                    class="form-control" />
                                                <label class="form-label" for="tanggalterbit">Tanggal terbit
                                                    (Date
                                                    of
                                                    Issued)</label>
                                                <input type="text" name="p3k_tanggal_terbit"
                                                    id="tanggalterbit date-mask5" class="form-control date-mask5"
                                                    placeholder="YYYY-MM-DD" />
                                                <label class="form-label" for="berlakusampai">Berlaku sampai
                                                    dengan
                                                    (Valid Until)</label>
                                                <input type="text" name="p3k_berlaku_sampai"
                                                    id="berlakusampai date-mask6" class="form-control date-mask6"
                                                    placeholder="YYYY-MM-DD" />
                                            </div>
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Kondisi (Condition)</h6>
                                                <div x-data="{ showInnerOptions: false, showRemark: false }">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp15">
                                                                    <input name="p3k_kondisi" class="form-check-input"
                                                                        type="radio" value="Ada" id="customRadioTemp15"
                                                                        x-on:click="showInnerOptions = true; showRemark = false" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>Available.</small>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="row mt-3" x-show="showInnerOptions">
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption3">
                                                                            <input name="p3k_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Sesuai" id="innerOption3" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Relevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption4">
                                                                            <input name="p3k_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Tidak Sesuai"
                                                                                id="innerOption4" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Tidak
                                                                                    Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Irrelevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp16">
                                                                    <input name="p3k_kondisi" class="form-check-input"
                                                                        type="radio" value="Tidak Ada"
                                                                        id="customRadioTemp16"
                                                                        x-on:click="showInnerOptions = false; showRemark = true" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Tidak
                                                                            Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>None.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div x-show="showRemark" style="background-color:#eee;"
                                                        class="p-3 col-sm-12 mt-3">
                                                        <h6>Keterangan (Remark)</h6>
                                                        <div class="input-group m-2">
                                                            <span class="input-group-text">Alasan</span>
                                                            <textarea name="p3k_alasan" class="form-control"
                                                                aria-label="With textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border border-1 mt-5">
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                <span>Buku Kesehatan (Health Book)</span></h6>
                                                <label class="form-label" for="tempatterbit">Tempat terbit
                                                    (Place of
                                                    Issued)</label>
                                                <input type="text" name="buku_kesehatan_tempat_terbit" id="tempatterbit"
                                                    class="form-control" />
                                                <label class="form-label" for="tanggalterbit">Tanggal terbit
                                                    (Date
                                                    of
                                                    Issued)</label>
                                                <input type="text" name="buku_kesehatan_tanggal_terbit"
                                                    id="tanggalterbit date-mask7" class="form-control date-mask7"
                                                    placeholder="YYYY-MM-DD" />
                                            </div>
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Kondisi (Condition)</h6>
                                                <div x-data="{ showInnerOptions: false, showRemark: false }">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp17">
                                                                    <input name="buku_kesehatan_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Ada" id="customRadioTemp17"
                                                                        x-on:click="showInnerOptions = true; showRemark = false" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>Available.</small>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="row mt-3" x-show="showInnerOptions">
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption9">
                                                                            <input name="buku_kesehatan_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Sesuai" id="innerOption9" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Relevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div
                                                                        class="form-check custom-option custom-option-basic">
                                                                        <label
                                                                            class="form-check-label custom-option-content"
                                                                            for="innerOption9">
                                                                            <input name="buku_kesehatan_kondisi2"
                                                                                class="form-check-input" type="radio"
                                                                                value="Tidak Sesuai"
                                                                                id="innerOption9" />
                                                                            <span class="custom-option-header">
                                                                                <span class="h6 mb-0">Tidak
                                                                                    Sesuai</span>
                                                                            </span>
                                                                            <span class="custom-option-body">
                                                                                <small>Irrelevant.</small>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp18">
                                                                    <input name="buku_kesehatan_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Tidak Ada" id="customRadioTemp18"
                                                                        x-on:click="showInnerOptions = false; showRemark = true" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Tidak
                                                                            Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>None.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div x-show="showRemark" style="background-color:#eee;"
                                                        class="p-3 col-sm-12 mt-3">
                                                        <h6>Keterangan (Remark)</h6>
                                                        <div class="input-group m-2">
                                                            <span class="input-group-text">Alasan</span>
                                                            <textarea name="buku_kesehatan_alasan" class="form-control"
                                                                aria-label="With textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border border-1 mt-5">
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Jenis Dokumen (Kind Of Document)</h6>
                                                <span>Catatan Perjalanan (Voyage Memo)</span></h6>
                                            </div>
                                            <div style="background-color:#eee;" class="p-3 col-sm-12">
                                                <h6>Kondisi (Condition)</h6>
                                                <div x-data="{ showInnerOptions: false, showRemark: false }">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp19">
                                                                    <input name="ctt_perjalanan_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Ada" id="customRadioTemp19"
                                                                        x-on:click="showInnerOptions = true; showRemark = false" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>Available.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content"
                                                                    for="customRadioTemp20">
                                                                    <input name="ctt_perjalanan_kondisi"
                                                                        class="form-check-input" type="radio"
                                                                        value="Tidak Ada" id="customRadioTemp20"
                                                                        x-on:click="showInnerOptions = false; showRemark = true" />
                                                                    <span class="custom-option-header">
                                                                        <span class="h6 mb-0">Tidak
                                                                            Ada</span>
                                                                    </span>
                                                                    <span class="custom-option-body">
                                                                        <small>None.</small>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div x-show="showRemark" style="background-color:#eee;"
                                                        class="p-3 col-sm-12 mt-3">
                                                        <h6>Keterangan (Remark)</h6>
                                                        <div class="input-group m-2">
                                                            <span class="input-group-text">Alasan</span>
                                                            <textarea name="ctt_perjalanan_alasan" class="form-control"
                                                                aria-label="With textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="mt-5">Faktor Risiko PHEIC (Risk Factor of Public Health
                                            Emergency
                                            of International Concern)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp21">
                                                    <input class="form-check-input" type="radio" value=""
                                                        id="customCheckTemp21" name="faktor_resiko_pheic" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak Ada</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">None</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp22">
                                                    <input class="form-check-input" type="radio" value="Ada : Tanda Tanda kehidupan
                                                            vektor,
                                                            B3, NUBIKA, dll." id="customCheckTemp22"
                                                        name="faktor_resiko_pheic" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Ada : Tanda Tanda kehidupan
                                                            vektor,
                                                            B3, NUBIKA, dll.</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small>Available : Life signal of vektor, hazardous
                                                            materials,nuchlear / biological / chemicals,
                                                            etc.</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        </ol>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left ti-xs me-sm-2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Kesimpulan -->
                            <div id="social-links-vertical" class="content">
                                <div class="row g-6">
                                    <ol type="A">
                                        <li>Pelanggaran (Breach)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp23">
                                                    <input class="form-check-input" type="radio" value="Tidak Ada"
                                                        id="customCheckTemp23" name="pelanggaran_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak Ada</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">None</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp24">
                                                    <input class="form-check-input" type="radio" value="Ada"
                                                        id="customCheckTemp24" name="pelanggaran_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Ada</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Available</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <li class="mt-5">Dokument Kesehatan (Health Document)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp25">
                                                    <input class="form-check-input" type="radio"
                                                        value="Lengkap dan berlaku" id="customCheckTemp25"
                                                        name="dokumen_kesehatan_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Lengkap dan berlaku</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Complete & valid</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp26">
                                                    <input class="form-check-input" type="radio"
                                                        value="Tidak lengkap dan berlaku" id="customCheckTemp26"
                                                        name="dokumen_kesehatan_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak lengkap dan berlaku</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Incomplete & valid</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp27">
                                                    <input class="form-check-input" type="radio"
                                                        value="Lengkap dan tidak berlaku" id="customCheckTemp27"
                                                        name="dokumen_kesehatan_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">lengkap dan tidak berlaku</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Complete & invalid</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp28">
                                                    <input class="form-check-input" type="radio"
                                                        value="Tidak lengkap dan tidak berlaku" id="customCheckTemp28"
                                                        name="dokumen_kesehatan_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak lengkap dan tidak berlaku</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Incomplete & invalid</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <li class="mt-5">Masalah PHEIC (PHEIC Problem)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp29">
                                                    <input class="form-check-input" type="radio" value="Tidak Ada"
                                                        id="customCheckTemp29" name="masalah_pheic_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak Ada</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">None</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp30">
                                                    <input class="form-check-input" type="radio" value="Tidak Ada"
                                                        id="customCheckTemp30" name="masalah_pheic_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tidak Ada</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">None</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <li class="mt-5">Lainnya (Etc)</li>
                                        <div class="input-group m-2">
                                            <span class="input-group-text"></span>
                                            <textarea class="form-control" name="masalah_pheic_lainnya"
                                                aria-label="With textarea"></textarea>
                                        </div>
                                    </ol>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left ti-xs me-sm-2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="recomendation-links-vertical" class="content">
                                <div class="row g-6">
                                    <ol type="A">
                                        <li>Pelanggaran Karantina (Quarantine Breach)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp31">
                                                    <input class="form-check-input" type="radio"
                                                        value="Surat Pernyataan" id="customCheckTemp31"
                                                        name="pelanggaran_karantina_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Surat Pernyataan</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Statement letter</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp32">
                                                    <input class="form-check-input" type="radio" value="Proses verbal"
                                                        id="customCheckTemp32" name="pelanggaran_karantina_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Proses verbal</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Verbal process</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <li class="mt-5">Dokument Kesehatan (Health Document)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp33">
                                                    <input class="form-check-input" type="radio" value="Melengkapi"
                                                        id="customCheckTemp33" name="dokumen_kesehatan_kondisi2" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Melengkapi</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Fullfill</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp34">
                                                    <input class="form-check-input" type="radio" value="Memperbaharui"
                                                        id="customCheckTemp34" name="dokumen_kesehatan_kondisi2" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Memperbaharui</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Renew</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <li class="mt-5">Penanganan Masalah (Problem Solving of PHEIC)</li>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp35">
                                                    <input class="form-check-input" type="radio"
                                                        value="Tata laksana kasus" id="customCheckTemp35"
                                                        name="penanganan_masalah_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tata laksana kasus</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Case implementation</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp36">
                                                    <input class="form-check-input" type="radio" value="Tindakan sanitasi atau penyehatan
                                                            kapal" id="customCheckTemp36"
                                                        name="penanganan_masalah_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Tindakan sanitasi atau penyehatan
                                                            kapal</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Deratisation / desinsection /
                                                            desinfection / decontamination</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp37">
                                                    <input class="form-check-input" type="radio" value="Investigasi"
                                                        id="customCheckTemp37" name="penanganan_masalah_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Investigasi</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Investigation</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp38">
                                                    <input class="form-check-input" type="radio" value=""
                                                        id="customCheckTemp38" name="penanganan_masalah_lainnya" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Lainnya</span>
                                                    </span>
                                                    <div class="input-group m-2">
                                                        <span class="input-group-text"></span>
                                                        <textarea name="penanganan_masalah_lainnya" class="form-control"
                                                            aria-label="With textarea"></textarea>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>


                                        <li class="mt-5">Sertifikat Izin Karantina (Certificate of Pratique)</li>
                                        <div class="col mt-5">
                                            <label class="form-label" for="tanggalterbit">Tanggal (Date)</label>
                                            <input type="text" name="sertif_izin_karantina_tanggal"
                                                id="tanggalterbit date-mask8" class="form-control date-mask8"
                                                placeholder="YYYY-MM-DD" />
                                            <label class="form-label" for="berlakusampai">Jam (Time)</label>
                                            <input type="text" name="sertif_izin_karantina_jam" id="jamtiba time-mask3"
                                                class="form-control time-mask3" placeholder="hh:mm:ss" />
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp39">
                                                    <input class="form-check-input" type="radio"
                                                        value="Izin Lepas Karantina" id="customCheckTemp39"
                                                        name="sertif_izin_karantina_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Izin Lepas Karantina</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Free Pratique</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mt-5">
                                            <div class="form-check custom-option custom-option-basic">
                                                <label class="form-check-label custom-option-content"
                                                    for="customCheckTemp40">
                                                    <input class="form-check-input" type="radio"
                                                        value="Izin Lepas Terbatas Karantina" id="customCheckTemp40"
                                                        name="sertif_izin_karantina_kondisi" />
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">Izin Lepas Terbatas Karantina</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small class="option-text">Restricted Pratique</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="container mt-4">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Tanda Tangan Nahkoda -->
                                                    <div class="mb-3">
                                                        <h6>1. Tanda Tangan Nahkoda:</h6>
                                                        <label class="form-label" for="nama_nahkoda">Nama Nahkoda</label>
                                                        <input type="text" name="nama_nahkoda" id="nama_nahkoda"
                                                            class="form-control" />
                                                        <div class="mt-3">
                                                            <img id="preview-nahkoda" src=""
                                                                alt="Preview Tanda Tangan Nahkoda" class="border"
                                                                style="width: 500px; height: 300px; object-fit: contain;">
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modal-nahkoda">
                                                            Tanda Tangan Nahkoda
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!-- Tanda Tangan Petugas Pemeriksa -->
                                                    <h6>2. Tanda Tangan Petugas Pemeriksa:</h6>
                                                    <div class="mb-3">

                                                        <label class="form-label" for="nama_petugas_1">Nama Petugas
                                                            1</label>
                                                        <input type="text" name="nama_petugas_1" id="nama_petugas_1"
                                                            class="form-control" />
                                                        <div class="mt-3">
                                                            <img id="preview-petugas-1" src=""
                                                                alt="Preview Tanda Tangan Petugas 1" class="border"
                                                                style="width: 500px; height: 300px; object-fit: contain;">
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modal-petugas-1">
                                                            Tanda Tangan Petugas 1
                                                        </button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_petugas_2">Nama Petugas
                                                            1</label>
                                                        <input type="text" name="nama_petugas_2" id="nama_petugas_2"
                                                            class="form-control" />
                                                        <div class="mt-3">
                                                            <img id="preview-petugas-2" src=""
                                                                alt="Preview Tanda Tangan Petugas 2" class="border"
                                                                style="width: 500px; height: 300px; object-fit: contain;">
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modal-petugas-2">
                                                            Tanda Tangan Petugas 2
                                                        </button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_petugas_3">Nama Petugas
                                                            1</label>
                                                        <input type="text" name="nama_petugas_3" id="nama_petugas_3"
                                                            class="form-control" />
                                                        <div class="mt-3">
                                                            <img id="preview-petugas-3" src=""
                                                                alt="Preview Tanda Tangan Petugas 3" class="border"
                                                                style="width: 500px; height: 300px; object-fit: contain;">
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modal-petugas-3">
                                                            Tanda Tangan Petugas 3
                                                        </button>
                                                    </div>
                                                    <!-- Tombol Submit -->
                                                    <button type="button" class="btn btn-success"
                                                        id="submit-signatures">Simpan
                                                        Semua Tanda Tangan</button>

                                                </div>
                                            </div>


                                            <!-- Modal Tanda Tangan -->
                                            <div class="modal fade" id="modal-nahkoda" tabindex="-1"
                                                aria-labelledby="modalNahkodaLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalNahkodaLabel">Tanda Tangan
                                                                Nahkoda</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" id="signature-nahkoda-input"
                                                                name="signature_nahkoda" required>
                                                            <canvas id="signature-nahkoda" class="border" width="500"
                                                                height="300"></canvas>
                                                            <button type="button" class="btn btn-danger mt-2"
                                                                id="clear-nahkoda">Bersihkan</button>
                                                            <button type="button" class="btn btn-primary mt-2"
                                                                id="save-nahkoda">Simpan Tanda Tangan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal untuk Petugas Pemeriksa -->
                                            <!-- Modal Petugas 1 -->
                                            <div class="modal fade" id="modal-petugas-1" tabindex="-1"
                                                aria-labelledby="modalPetugas1Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalPetugas1Label">Tanda Tangan
                                                                Petugas 1</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" id="signature-petugas-1-input"
                                                                name="signature_petugas_1" required>
                                                            <canvas id="signature-petugas-1" class="border" width="500"
                                                                height="300"></canvas>
                                                            <button type="button" class="btn btn-danger mt-2"
                                                                id="clear-petugas-1">Bersihkan</button>
                                                            <button type="button" class="btn btn-primary mt-2"
                                                                id="save-petugas-1">Simpan Tanda Tangan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Petugas 2 -->
                                            <div class="modal fade" id="modal-petugas-2" tabindex="-1"
                                                aria-labelledby="modalPetugas2Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalPetugas1Label">Tanda Tangan
                                                                Petugas 2</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" id="signature-petugas-2-input"
                                                                name="signature_petugas_2" required>
                                                            <canvas id="signature-petugas-2" class="border" width="500"
                                                                height="300"></canvas>
                                                            <button type="button" class="btn btn-danger mt-2"
                                                                id="clear-petugas-2">Bersihkan</button>
                                                            <button type="button" class="btn btn-primary mt-2"
                                                                id="save-petugas-2">Simpan Tanda Tangan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Petugas 3 -->
                                            <div class="modal fade" id="modal-petugas-3" tabindex="-1"
                                                aria-labelledby="modalPetugas3Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalPetugas1Label">Tanda Tangan
                                                                Petugas 3</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" id="signature-petugas-3-input"
                                                                name="signature_petugas_3" required>
                                                            <canvas id="signature-petugas-3" class="border" width="500"
                                                                height="300"></canvas>
                                                            <button type="button" class="btn btn-danger mt-2"
                                                                id="clear-petugas-3">Bersihkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tambahkan modal petugas 2 dan 3 sesuai dengan pola di atas -->
                                        </div>
                                    </ol>
                                    
                                </div>
                                <div class="d-flex flex-row-reverse mt-2">
                                    <button class="btn btn-primary justi justify-content-right fs-5">Simpan Data</button>

                                </div>

                                <div class="col-12 d-flex justify-content-between mt-2">
                                    <button type="button" class="btn btn-label-secondary btn-prev">
                                        <i class="ti ti-arrow-left ti-xs me-sm-2"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span>
                                        <i class="ti ti-arrow-right ti-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const canvases = [
            { id: "signature-nahkoda", clearBtn: "clear-nahkoda", saveBtn: "save-nahkoda", preview: "preview-nahkoda", input: "signature-nahkoda-input" },
            { id: "signature-petugas-1", clearBtn: "clear-petugas-1", saveBtn: "save-petugas-1", preview: "preview-petugas-1", input: "signature-petugas-1-input" },
            { id: "signature-petugas-2", clearBtn: "clear-petugas-2", saveBtn: "save-petugas-2", preview: "preview-petugas-2", input: "signature-petugas-2-input" },
            { id: "signature-petugas-3", clearBtn: "clear-petugas-3", saveBtn: "save-petugas-3", preview: "preview-petugas-3", input: "signature-petugas-3-input" },
        ];

        canvases.forEach(({ id, clearBtn, saveBtn, preview, input }) => {
            const canvas = document.getElementById(id);
            const ctx = canvas.getContext("2d");
            const previewElement = document.getElementById(preview);
            const inputElement = document.getElementById(input);

            let drawing = false;

            // Inisialisasi background putih pada canvas
            ctx.fillStyle = "white";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Tampilkan kanvas kosong di preview
            previewElement.src = canvas.toDataURL("image/png");

            // Event menggambar
            canvas.addEventListener("mousedown", (e) => {
                drawing = true;
                ctx.beginPath();
                ctx.moveTo(e.offsetX, e.offsetY);
            });

            canvas.addEventListener("mousemove", (e) => {
                if (drawing) {
                    ctx.lineTo(e.offsetX, e.offsetY);
                    ctx.stroke();
                }
            });

            canvas.addEventListener("mouseup", () => {
                drawing = false;
            });

            canvas.addEventListener("mouseout", () => {
                drawing = false;
            });

            // Tombol bersihkan
            document.getElementById(clearBtn).addEventListener("click", () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Reset background putih
                ctx.fillStyle = "white";
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                // Reset preview
                previewElement.src = canvas.toDataURL("image/png");
            });

            // Tombol simpan
            document.getElementById(saveBtn).addEventListener("click", () => {
                const signatureData = canvas.toDataURL("image/png");
                previewElement.src = signatureData;

                // Simpan Data URL ke input hidden
                inputElement.value = signatureData;
            });
        });
    });
</script>

@endsection