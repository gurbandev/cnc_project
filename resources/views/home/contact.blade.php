@extends('layouts.app')
@section('title')
    Habarlaşmak üçin
@endsection
@section('content')
    <div class="bg-contact-img text-center display-5 rounded-3 py-10 "><span class="ff-bebas text-white">Contact Us</span></div>
    <div class="container row pt-5 pb-5 m-0">
        <div class="col-lg-6 col-sm pe-5 ff-poppins text-gray"><div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label pt-2">Your Name</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label pt-3">Your Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label pt-3">Subject</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label pt-3">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="btn border-0 bg-warning d-block ff-poppins fw-bold">Submit</div>
        </div>
        <div class="col-6">
            <div class="">
                <ifarme src="https://goo.gl/maps/2TRHYUywGAabQTr6A" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></ifarme>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2610.132181854644!2d58.40325549088789!3d37.96964841916384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1str!2s!4v1673549412625!5m2!1str!2s" width="850" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


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