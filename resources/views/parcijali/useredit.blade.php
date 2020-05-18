@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                        <p>Prijavljeni ste kao ADMINISTRATOR</p>
                    </div>
                    <br>
                    <h4>Izmena korisnika</h4> 
                    @foreach($user as $users)                                         
                    <form action="userupdate/{{$users->id}}" method="post">
                      @csrf
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Ime</span>
                        </div>
                        <input type="text" class="form-control" name="name" value="{{ $users->name }}" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                        </div>
                        <input type="text" class="form-control" name="email" value="{{ $users->email }}" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Administrator</span>
                        </div>
                        <select class="form-control" id="sel1" name="admin">
                          @if ($users->admin == "0")
                            <option selected value="0">Ne</option>
                            <option value="1">Da</option>
                          @else                                                
                            <option value="0">Ne</option>
                            <option selected value="1">Da</option>
                          @endif
                        </select>
                      </div>
                      <div class="input-group mb-3" style="display: inline-block;">                      
                        <a href="{{ URL::previous() }}">
                              <button style="float: left;width: 45%;">Odustani</button></a>

                        <button type="submit" style="float: right;width: 45%;">Izmeni korisnika</button>
                      </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection