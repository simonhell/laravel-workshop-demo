@extends('layouts.app')
@section('body')
    <hr>
    <h1>Users</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h3>Add User</h3>
            <input type="text" name="first_name" class="form-control mb-3" placeholder="First Name">
            <input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name">
            <input type="text" name="age" class="form-control mb-3" placeholder="Age">
            <button type="button" class="btn btn-primary mb-3">Add</button>
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
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Zuckerberg</td>
                        <td>34</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white"><i class="material-icons">edit</i></button>
                            <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Auer</td>
                        <td>41</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white"><i class="material-icons">edit</i></button>
                            <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>Joch</td>
                        <td>18</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white"><i class="material-icons">edit</i></button>
                            <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
