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

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">Br.</th>
                          <th>Naziv</th>
                          <th>Kolicina</th>
                          <th>Cena [Din.]</th>
                          <th>Ukupno [Din.]</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bills as $key => $value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->naziv }}</td>
                            <td>{{ $value->kolicina }}</td>
                            <td>{{ $value->cena }}</td>
                            <td>{{ $value->cena * $value->kolicina }}<span>.00</span></td>
                          </tr>
                        @endforeach
                        <tr>
                          <th width="5"></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>{{$ukupno}}<span>.00</span></th>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
