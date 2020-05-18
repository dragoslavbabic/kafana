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
                    </div>
                    <h4>Racun za sto broj: {{$stoids}}</h4> 

                    <form action="../newtempitem/{{$stoids}}" method="post">
                      @csrf
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Naziv</span>
                        </div>
                        <select class="form-control" id="odabirpica" name="odabir" required focus>
                          <option value="" disabled selected>Molim izaberite pice</option>        
                          @foreach($items as $item)
                          <option name="item" value="{{$item->id}}">{{ $item->naziv }}</option>
                          @endforeach
                        </select>                        
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Kolicina</span>
                        </div>
                        <input type="number" class="form-control" required name="kolicina" value="1" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3" style="display: inline-block;">
                        <button type="submit" style="float: right;width: 100%;">Ubaci u racun</button>
                      </div>
                    </form>
                    
                    <br>

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
                    <div class="input-group mb-3" style="display: inline-block;">                      
                        <a href="../stamparacuna">
                              <button style="float: left;width: 100%;">Pregled racuna</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection