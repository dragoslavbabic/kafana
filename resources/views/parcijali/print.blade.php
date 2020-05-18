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

                    <table class="racun-naslov" style="background-color: #f5f5f5;">
                        <tr>
                            <td>&nbsp;<br>&nbsp;<br>&nbsp;</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>

                        <tr>
                            <td class="racun-naslov">CaffeSoftIng d.o.o.</td>
                        </tr>
                        <tr>
                            <td class="racun-firma"> Bul. Petra Petrovica 55</td>
                        </tr>

                        <tr>
                            <td class="racun-firma"> Novi Sad - Novi Sad</td>
                        </tr>

                        <tr>
                            <td class="racun-firma">CaffeSoftIng - Novi Sad</td>
                        </tr>

                        <tr>
                            <td class="racun-firma">21000 - Novi Sad</td>
                        </tr>

                        <tr>
                            <td class="racun-firma">&nbsp;&nbsp;&nbsp;</td>
                        </tr>

                        <tr>
                            <td class="racun-pib">PIB: 1992034479023</td>
                        </tr>

                        <tr>
                            <td class="racun-pib">IBMF: AJJD434DG94</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">Sto broj: <span id="broj_stola">{{$stoid}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">Broj racuna: <span id="broj_racuna">344562354</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">Vreme racuna: <span id="vreme_racuna">{{$datum}}</span></td>
                        </tr>

                        <tr>
                            <td><img class="logo_racun" src="../images/logo.png"></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>


                        @foreach ($bills as $key => $value)
                        <tr>
                            <td class="racun-pib"><span id="stavka_naziv">{{$value->naziv}}</span></td>
                        </tr>

                        <tr>
                            <td class="kol_cena"><span id="kol_cena2">{{$value->kolicina +0}}x {{number_format($value->cena,2,",",".")}}</span><span id="ukupno1">{{number_format($value->cena * $value->kolicina,2,",",".")}}</span></td>

                        </tr>
                        @endforeach

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst">SB:   20.00%</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>PB:</span>   <span id="porez_ukupno">{{number_format($ukupno-($ukupno/1.2),2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>PT:</span>   <span id="porez_ukupno">{{number_format($ukupno-($ukupno/1.2),2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>EB:</span>   <span id="cena_ukupno"> {{number_format($ukupno,2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>ET:</span>   <span id="cena_ukupno">{{number_format($ukupno,2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst za_uplatu"><span>ZA UPLATU:</span>   <span id="cena_ukupno">{{number_format($ukupno,2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>KARTICA:</span>   <span id="cena_ukupno">{{number_format($ukupno,2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>UPLACENO:</span>   <span id="cena_ukupno">{{number_format($ukupno,2,",",".")}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>POVRACAJ:</span>   <span> 0,00</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span id="datum_vreme">{{$datum1}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>BI:119854</span>   <span><img class="logo_fiskalni" src="../images/fiskalni_logo.jpg"></span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span>Konobar:</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice porez_tekst"><span id="ime_prezime">{{Auth::user()->name}}</span></td>
                        </tr>

                        <tr>
                            <td class="racun-crtice">= = = = = = = = = = = = = = = = = = = =</td>
                        </tr>
                    </table>
                </section>
                            </div>
            </div>
        </div>
    </div>
</div>
@endsection
