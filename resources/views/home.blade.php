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
                        <a href="/pazar">Pregled pazara</a>
                    </div>
                    <div style="padding: 20; ">
                      <a href="/sto/1">
                        <button type="submit" style="border: 0; background: transparent">
                          <img src="/images/tableImg.png" width="120" height="120" alt="submit" />1
                        </button></a>
                      <a href="/sto/2">
                        <button type="submit" style="border: 0;  background: transparent">
                            <img src="/images/tableImg.png" width="120" height="120" alt="submit" />2
                        </button></a>
                      <a href="/sto/3">
                        <button type="submit" style="border: 0; background: transparent">
                          <img src="/images/tableImg.png" width="120" height="120" alt="submit" />3
                        </button></a>
                      <a href="/sto/4">
                        <button type="submit" style="border: 0;  background: transparent">
                            <img src="/images/tableImg.png" width="120" height="120" alt="submit" />4
                        </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
