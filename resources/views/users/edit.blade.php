@extends('layouts.app')
@section('body')
    <hr>
    <h1>Users</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h3>Edit User</h3>
            <input type="text" name="first_name" class="form-control mb-3" placeholder="First Name">
            <input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name">
            <input type="text" name="age" class="form-control mb-3" placeholder="Age">
            <button type="button" class="btn btn-primary mb-3">Save</button>
        </div>
        <div class="col-md-9">
            <h3>Drinks</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Drink</th>
                        <th>Amount (ml)</th>
                        <th>Alocohl (ml)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Beer</td>
                        <td>500</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
