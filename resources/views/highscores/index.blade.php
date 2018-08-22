@extends('layouts.app')
@section('body')
    <hr>
    <h1>Highscores</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Drinks</th>
                <th>total amount (ml)</th>
                <th>total amount alcohol (ml)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>22</td>
                <td>10</td>
                <td>1000</td>
                <td>50</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>22</td>
                <td>10</td>
                <td>1000</td>
                <td>50</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>22</td>
                <td>10</td>
                <td>1000</td>
                <td>50</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h1>Add drink</h1>
    <form action="{{ route('highscores.saveDrink') }}" method="POST">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Select User</b></label>
                    <select class="form-control" name="user_id">
                        <option>
                            Select User...
                        </option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->first_name ." " .$user->last_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label><b>Drink name</b></label>
                    <input type="text" name="name" class="form-control" placeholder="Drink Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Amount (ml)</b></label>
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group">
                    <label><b>Alocohol content (%)</b></label>
                    <input type="number" name="alcohol" class="form-control" placeholder="Alcohol content">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Add drink</button>
    </form>
@endsection
