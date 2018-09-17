@extends('layouts.app')
@section('body')
    <hr>
    <h1>Users</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h3>Add User</h3>
            <form action="{{ route('users.store') }}" method="POST">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="first_name" class="form-control mb-3" placeholder="First Name">
                <input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name">
                <input type="text" name="age" class="form-control mb-3" placeholder="Age">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </form>
        </div>
        <div class="col-md-9">
            <h3>Manage Users</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Drinks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->age }}</td>
                            <td>0</td>
                            <td>
                                <form action="{{ route('users.edit', ['id' => $user->id]) }}" method="GET">
                                    <button type="submit" class="btn btn-sm btn-warning text-white"><i class="material-icons">edit</i></button>
                                </form>
                                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
