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
                        <p>Prijavljeni ste kao KONOBAR</p>
                        <a href="/home">Povratak na stolove</a>
                    </div>
                    <!--<center>
                      <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Stampaj racun</button>
                    </center>
                    <script>
                      function myFunction() {
                        window.print();
                      }
                    </script>
                    <br>-->
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">Br.</th>
                          <th>Naziv</th>
                          <th>Kolicina</th>
                          <th>Cena</th>
                          <th>Ukupno</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bills as $key => $value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->naziv }}</td>
                            <td>{{ $value->kolicina }}</td>
                            <td>{{ $value->cena }}</td>
                            <td>{{ $value->cena * $value->kolicina }}</td>
                          </tr>
                        @endforeach
                        <tr>
                          <th width="5"></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Ukupno</th>
                        </tr>
                      </tbody>
                    </table>
                    <div class="input-group mb-3" style="display: inline-block;">
                        <a href="/racunprint">
                              <button style="float: left;width: 100%;">Stampaj!</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
