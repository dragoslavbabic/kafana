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
                    <h4>Dodaj novi artikal</h4>
                    <form action="/newitem" method="post">
                      @csrf
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Naziv</span>
                        </div>
                        <input type="text" class="form-control" name="naziv" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Cena</span>
                        </div>
                        <input type="number" class="form-control" required name="cena" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3" style="display: inline-block;">
                        <a href="{{ URL::previous() }}">
                              <button style="float: left;width: 45%;">Odustani</button></a>

                        <button type="submit" style="float: right;width: 45%;">Dodaj novi artikal</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
