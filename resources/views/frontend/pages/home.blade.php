@extends('frontend.index')

@section('content')
<!-- banners -->
<div class="hero-wrap">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url({{asset('images/bg_1.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-end">
                    <div class="col-md-6 ftco-animate">
                        <div class="text w-100">
                            <h1 class="mb-4">Seu melhor destino pelo Brasil.</h1>
                            <p>Os melhores destinos do Brasil com horários conveniêntes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image:url({{asset('images/bg_2.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-end">
                    <div class="col-md-6 ftco-animate">
                        <div class="text w-100">
                            <h1 class="mb-4">Comodidade e facilidade com o melhor atendimento</h1>
                            <p>Conte com a Nordeste para ter o melhor atendimento para você e sua familia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END banners -->

<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-12">
                <div class="wrap-appointment d-md-flex">
                    <div class="col-md-8 bg-primary p-5 heading-section heading-section-white">
                        <span class="subheading">Venda de passagens</span>
                        <h2 class="mb-4">Para onde vamos?</h2>
                        <form action="{{ route('busca') }}" method="POST" class="appointment">
                            {!! csrf_field() !!}
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <label style="color:#fff !important;">Partida</label>
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="from" class="js-example-basic-multiple form-control">
                                                    <option value="">Selecione um aeroporto</option>
                                                    @foreach ($airports as $airport)
                                                    <option value="{{$airport->id}}">
                                                        {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <label style="color:#fff !important;">Destino</label>
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="to" class="js-example-basic-multiple form-control">
                                                    <option value="">Selecione um aeroporto</option>
                                                    @foreach ($airports as $airport)
                                                    <option value="{{$airport->id}}">
                                                        {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:#fff !important;">Ida</label>
                                        <div class="input-wrap">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" autocomplete="off" name="date_ida"
                                                class="form-control appointment_date" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:#fff !important;">Volta</label>
                                        <div class="input-wrap">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" autocomplete="off" name="date_volta"
                                                class="form-control appointment_date" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Buscar voo" class="btn btn-secondary py-3 px-4">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 bg-white text-center p-5">
                        <div class="desc border-bottom pb-4">
                            <img src="{{asset('images/aviao.png')}}">
                            <h2>Atente-se ao horario do seu voo</h2>
                            <div class="opening-hours">
                                <h4>Faça seu ChekIn online:</h4>
                                <p class="pl-3">
                                    <a href="/perfil" class="btn btn-secondary py-3 px-4">Fazer Chekin</a>
                                </p>
                                <h4>Chegue ao aeroproto de partida com uma hora de antecedência</h4>
                            </div>
                        </div>
                        <div class="desc pt-4 ">
                            <h3 class="heading">Chekin por telefone</h3>
                            <span class="phone">(+55) 71 9999 9999</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Promoção</span>
                <h2>Confira os melhores destinos na promoção</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded"
                        style="background-image: url('{{asset('images/image_1.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <div class="posted mb-3 d-flex">
                            <div class="img author" style="background-image: url({{asset('images/person_2.jpg)')}};">
                            </div>
                            <div class="desc pl-3">
                                <span>De férias</span>
                                <span>Voos a partir de outubro</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="#">Recife ida e volta para dois adultos e uma criança</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded"
                        style="background-image: url('{{asset('images/image_2.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <div class="posted mb-3 d-flex">
                            <div class="img author" style="background-image: url({{asset('images/person_3.jpg')}});">
                            </div>
                            <div class="desc pl-3">
                                <span>A trabalho</span>
                                <span>Voos para junho</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="#">Porto Alegre ida e volta para uma pessoa a preços
                                mínimos</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded"
                        style="background-image: url('{{asset('images/image_3.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <div class="posted mb-3 d-flex">
                            <div class="img author" style="background-image: url({{asset('images/person_1.jpg')}});">
                            </div>
                            <div class="desc pl-3">
                                <span>Mochileiro</span>
                                <span>Voos para novembro</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="#">Maranhão pela metade do preço</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-1.jpg')}});">
                    <a href="images/work-1.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2>Comodidade</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-2.jpg')}});">
                    <a href="images/work-2.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Eficiência</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-3.jpg')}});">
                    <a href="images/work-3.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Destinos</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-4.jpg')}});">
                    <a href="images/work-4.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Conforto</a></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-5.jpg')}});">
                    <a href="images/work-5.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Rapidez</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-6.jpg')}});">
                    <a href="images/work-6.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Eficacia</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-7.jpg')}});">
                    <a href="images/work-7.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Sinpatia</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="work img d-flex align-items-center"
                    style="background-image: url({{asset('images/work-8.jpg')}});">
                    <a href="images/work-8.jpg"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-paper-plane"></span>
                    </a>
                    <div class="desc w-100 px-4 text-center pt-5 mt-5">
                        <div class="text w-100 mb-3 mt-4">
                            <h2><a href="work-single.html">Respeito</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection