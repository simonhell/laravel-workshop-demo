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
                <th>Total Amount (ml)</th>
                <th>Total Amount of Alcohol (ml)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->drinks }}</td>
                    <td>{{ $user->total_amount_ml }}</td>
                    <td>{{ $user->total_amount_alcohol_ml }}</td>
                </tr>
            @endforeach

            @if(count($users) <= 0)
                <tr>
                    <td colspan="7">No one got drunk in the last couple moments</td>
                </tr>
            @endif
        </tbody>
    </table>

    @if(count($users) > 0)
    <hr>
    <h1>Add drink</h1>
    <form action="{{ route('highscores.saveDrink') }}" method="POST">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Select User</b></label>
                    <select class="form-control" name="user_id" value="{{ old('user_id') }}">
                        <option disabled selected>
                            Select User...
                        </option>
                        @foreach ($users as $user)
                            @if (intval(old('user_id')) === $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->first_name ." " .$user->last_name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->first_name ." " .$user->last_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                        <small class="form-text text-danger">{{ implode(' ', $errors->get('user_id')) }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label><b>Drink name</b></label>
                    <input type="text" name="name" class="form-control" placeholder="Drink Name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <small class="form-text text-danger">{{ implode(' ', $errors->get('name')) }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Amount (ml)</b></label>
                    <input type="number" name="amount" min="0" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                    @if($errors->has('amount'))
                        <small class="form-text text-danger">{{ implode(' ', $errors->get('amount')) }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label><b>Alocohol content (%)</b></label>
                    <input type="number" name="alcohol" min="0" max="100" step="0.1" class="form-control" placeholder="Alcohol content" value="{{ old('alcohol') }}">
                    @if($errors->has('alcohol'))
                        <small class="form-text text-danger">{{ implode(' ', $errors->get('alcohol')) }}</small>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Add drink</button>
    </form>
    @endif
@endsection
