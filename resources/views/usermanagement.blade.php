@extends('layouts.template')
@section('content')
<div class="container my-5">
    <div class="row card p-3">
        <div class="col-md-12">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Users</h5>
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Tambah User
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <a type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</a>
                                    </td>
                                </tr>

                                <!-- Edit User Modal -->
                                <div class="modal fade text-left" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <label for="name">Nama: </label>
                                                    <div class="form-group">
                                                        <input id="name" name="name" type="text" value="{{ $user->name }}" class="form-control">
                                                    </div>
                                                    <label for="email">Email: </label>
                                                    <div class="form-group">
                                                        <input id="email" name="email" type="email" value="{{ $user->email }}" class="form-control">
                                                    </div>
                                                    <label for="roles">Role: </label>
                                                    <div class="form-group">
                                                        <input id="roles" name="roles" type="text" value="{{ $user->roles }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Save changes</span>
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

                <!-- Add User Modal -->
                <div class="modal fade text-left" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addUserModalLabel">Tambah User</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label for="name">Nama: </label>
                                    <div class="form-group">
                                        <input id="name" name="name" type="text" placeholder="Nama" class="form-control">
                                    </div>
                                    <label for="email">Email: </label>
                                    <div class="form-group">
                                        <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                                    </div>
                                    <label for="password">Password: </label>
                                    <div class="form-group">
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                                    </div>
                                    <label for="roles">Role: </label>
                                    <div class="form-group">
                                        <input id="roles" name="roles" type="text" placeholder="Role" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Save</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
@endsection
