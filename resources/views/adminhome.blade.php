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

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">Br.</th>
                          <th>Ime</th>
                          <th>Email</th>
                          <th width="20">Izmena</th>
                          <th width="20">Brisanje</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $key => $value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <th align='center'><a href="/edituser/{{$value->id}}"><button>Izmeni</button></a></th>
                            <th align='center'><a href="/deleteuser/{{$value->id}}"><button>Obrisi</button></a></th>
                          </tr>
                        @endforeach
                        <tr width="100%">
                          <th colspan="5" style="padding: 0;"><a href="/usernew">
                            <button style="display: block;width: 100%;">Dodaj novog korisnika</button></a>
                          </th>
                        </tr>
                      </tbody>
                    </table>

                    <br>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">Br.</th>
                          <th>Naziv</th>
                          <th>Cena</th>
                          <th width="20">Izmena</th>
                          <th width="20">Brisanje</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($items as $key => $value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->naziv }}</td>
                            <td>{{ $value->cena }}</td>
                            <th align='center'><a href="/edititem/{{$value->id}}"><button>Izmeni</button></a></th>
                            <th align='center'><a href="/deleteitem/{{$value->id}}"><button>Obrisi</button></a></th>
                          </tr>
                        @endforeach
                        <tr width="100%">
                          <th colspan="5" style="padding: 0;"><a href="/itemnew">
                            <button style="display: block;width: 100%;">Dodaj novi artikal</button></a>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
