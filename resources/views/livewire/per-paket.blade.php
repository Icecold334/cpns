<div>
    <div class="accordion mb-3 shadow-lg" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    <h5 class="my-0 font-weight-bold">Informasi Ujian</h5>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-sm-12 d-flex flex-column">
                            <div class="card mb-3 flex-grow-1 h-100">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center">
                                        <table class="table table-borderless table-responsive-sm m-0">
                                            <tr>
                                                <td class="font-weight-bold">Nama Peserta</td>
                                                <td>{{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">E-mail</td>
                                                <td>{{ Auth::user()->email }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-md-6 col-sm-12 d-flex flex-column">
                            <div class="card mb-3 flex-grow-1 h-100">
                                <livewire:card-detail-test :paket="$paket"></livewire:card-detail-test>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-12 col-sm-12 d-flex flex-column">
                            <livewire:card-timer :paket="$paket" :durasi="$paket->durasi"></livewire:card-timer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="card mb-3 flex-fill">
                <livewire:card-soal :soals="$soals"></livewire:card-soal>
            </div>
        </div>
    </div>
    {{-- <livewire:canvas-soal :soals="$soals"></livewire:canvas-soal> --}}
</div>
