@extends('layouts.app')
@section('title')
    Hakkymyzda
@endsection
@section('content')
        <div class="bg-img text-center display-5 py-10 rounded-3 "><span class="ff-bebas text-white">About Us</span></div>
        <div class="col-12 col-md-10 px-2">
            <div class="row pt-4 pt-lg-5">
                <div class="col-12 col-lg-6 pe-0 pe-md-5 text-center text-md-start text-lg-end"><img class="img-fluid" src="{{asset("img/about_us/about_us_2.jpg")}}" alt=""></div>
                <div class="col-12 col-lg-6 pt-2 pt-md-0">
                    <div class="text-warning text-uppercase fw-bold ff-poppins pt-1 pt-lg-0">What we Do</div>
                    <div class="fs-2 text-uppercase fw-bold ff-bebas color-dark lh-2 pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, temporibus?</div>
                    <p class="ff-poppins pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aut blanditiis, consequatur culpa deserunt dignissimos dolorum eos error ex fugit incidunt itaque iusto modi molestias nam praesentium quasi quod repellat sed sequi temporibus ullam vel veniam? Accusamus alias corporis dolor ea earum excepturi ipsa nam necessitatibus nostrum numquam pariatur quasi reprehenderit rerum, saepe velit, voluptas voluptate. Dicta ex excepturi facilis maiores. Amet asperiores aspernatur consectetur dolorum ducimus eius et eveniet exercitationem, harum iure iusto nihil quibusdam quis quod, sapiente vel?</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5 pt-md-5 px-5 px-md-10">
            <div class="col-12 col-md-10">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 ">
                        <div class="text-center"><x-icon.thumbs/></div>
                        <h1 class="ff-bebas color-dark text-center fs-2 pt-2">Freight Calculation</h1>
                        <p class="ff-poppins color-dark text-center ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, sit?</p>
                    </div>

                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 mt-5 mt-md-0">
                        <div class="text-center"><x-icon.bit/></div>
                        <h1 class="ff-bebas color-dark text-center fs-2 pt-2">Freight Calculation</h1>
                        <p class="ff-poppins color-dark text-center ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, sit?</p>
                    </div>

                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 mt-5 mt-md-0">
                        <div class="text-center"><x-icon.quatation/></div>
                        <h1 class="ff-bebas color-dark text-center fs-2 pt-2">Freight Calculation</h1>
                        <p class="ff-poppins color-dark text-center ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, sit?</p>
                    </div>
                </div>
            </div>
        </div>
        {{--<h1>Hakkymyzda</h1>--}}
        {{--<h4>Bizi?? d??kanymyzdan h??zirki wagtda mebel d??n????sinde gi??i??le??in ulanyl??an ??NC ma??ynlaryny hem-de onu?? esasy ??a??laryny we py??aklaryny i?? amatly bahadan alyp bilersi??iz!--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--Hormatly dostlar! D??kanymyzy?? harytlaryny bizi?? t??ze sa??tymyzda www.tkmcnc.com g??r??p bilersi??iz!--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--??e??le hem sa??tymyzda g??rkezilen stanoklardan ba??gada stanoklary biz bilen habarla??yp sargyt edip bilersi??iz.</h4>--}}

@endsection
