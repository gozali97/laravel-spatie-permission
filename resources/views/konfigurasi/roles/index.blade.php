<x-app-layout>
    @include('layouts.alerts')

    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 d-flex flex-row-reverse">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#insertModal" class="btn icon icon-left btn-success d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-plus-fill d-inline-flex mb-1"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Tambah</button>
                        </div>
                        <div class="container p-3">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Role</th>
                                        <th>Akses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->guard_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#inlineForm{{ $d->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <a href="{{ route('roles.view', $d->id) }}"
                                                    class="btn btn-sm btn-outline-info"><i
                                                        class="bi bi-info-circle"></i></a>
                                                <a href="#" class="btn btn-sm btn-outline-danger"
                                                    onclick="event.preventDefault(); confirmDelete({{ $d->id }});"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade text-left" id="inlineForm{{ $d->id }}"
                                            tabindex="-1" aria-labelledby="myModalLabel33{{ $d->id }}"
                                            aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33{{ $d->id }}">
                                                            Edit
                                                            Roles </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form id="editForm{{ $d->id }}"
                                                        action="{{ route('roles.update', $d->id) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label for="nama">Nama Role: </label>
                                                            <div class="form-group mt-2">
                                                                <input id="nama" name="name" type="text"
                                                                    placeholder="Nama Roles" class="form-control"
                                                                    value="{{ $d->name }}">
                                                            </div>

                                                            <label for="text">Akses: </label>
                                                            <div class="form-group mt-2">
                                                                <input id="text" name="guard_name" type="text"
                                                                    placeholder="akses" class="form-control"
                                                                    value="{{ $d->guard_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Simpan</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Insert Modal -->
    <div class="modal fade text-left" id="insertModal" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="insertModal">
                        Tambah Kelas
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('roles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label for="nama">Nama Role: </label>
                        <div class="form-group mt-2">
                            <input id="nama" name="name" type="text" placeholder="Nama Roles"
                                class="form-control" value="{{ old('name') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        @if (session('toast_success'))
            iziToast.success({
                title: 'Success',
                message: '{{ session('toast_success') }}',
                position: 'topRight'
            });
        @elseif (session('toast_failed'))
            iziToast.error({
                title: 'Failed',
                message: '{{ session('toast_failed') }}',
                position: 'topRight'
            });
        @endif

        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke route untuk menghapus data dengan ID yang telah ditentukan
                    window.location.href = "/konfigurasi/roles/destroy/" + id;
                }
            });
        }
    </script>
</x-app-layout>
