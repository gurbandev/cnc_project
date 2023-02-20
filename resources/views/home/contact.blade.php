@extends('layouts.app')
@section('title')
    Habarlaşmak üçin
@endsection
@section('content')
    <div class="bg-contact-img text-center display-5 rounded-3 py-10 "><span class="ff-bebas text-white">Contact Us</span></div>
    <div class="container row justify-content-center pt-5 pb-5 m-0">
        <div class="col-12 col-md-11 col-lg-10 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-6 pe-lg-5 ff-poppins text-gray mb-5 mb-lg-0">
                    <form action="{{route('contacts.store')}}" method="post">
                        @method('post')
                        @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label pt-2">Your Name</label>
                            <input type="text" name="name" class="form-control py-2-5" id="exampleFormControlInput1" placeholder="">

                            <label for="exampleFormControlInput1" class="form-label pt-3">Your Email</label>
                            <input type="email" name="email" class="form-control py-2-5" id="exampleFormControlInput1" placeholder="">

                            <label for="exampleFormControlInput1" class="form-label pt-3">Subject</label>
                            <input type="text" name="subject" class="form-control py-2-5" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label pt-3">Message</label>
                            <textarea class="form-control py-2-5" name="message" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn border-0 btn-warning d-block ff-poppins fw-bold w-100 py-2-5">Submit</button>
                    </form>
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-sm-0 ">
                    <div class="h-100 rounded-3">
                        <ifarme src="https://goo.gl/maps/2TRHYUywGAabQTr6A" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></ifarme>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2610.132181854644!2d58.40325549088789!3d37.96964841916384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1str!2s!4v1673549412625!5m2!1str!2s" class="border rounded-3 w-100 h-style-100" width="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div>--}}
        {{--<h1>Habarlaşmak üçin</h1>--}}
        {{--<div>--}}
            {{--<ul>--}}
                {{--<li>Email adresimiz: tkmcnc.center@gmail.com</li>--}}
                {{--<li>Telefon belgimiz: +99363877143, 607001</li>--}}
                {{--<li>Salgymyz: Aşgabat şäheriň, G.Kulyýew köçe, Döwletli cafeň sag gapdalyndaky Rysgal bina, 0-njy gat, 3-nji dükan</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<ifarme src="https://goo.gl/maps/2TRHYUywGAabQTr6A" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></ifarme>--}}
        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2610.132181854644!2d58.40325549088789!3d37.96964841916384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1str!2s!4v1673549412625!5m2!1str!2s" width="850" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
    {{--</div>--}}
@endsection