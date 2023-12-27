@extends('layouts.app')

@section('content') <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    .container {
        margin: 30px auto;
    }

    .container .card {
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        background: #fff;
        border-radius: 0px;
    }

    body {
        background: #eee
    }



    .btn.btn-primary {
        background-color: #ddd;
        color: black;
        box-shadow: none;
        border: none;
        font-size: 20px;
        width: 100%;
        height: 100%;
    }

    .btn.btn-primary:focus {
        box-shadow: none;
    }

    .container .card .img-box {
        width: 80px;
        height: 50px;
    }

    .container .card img {
        width: 100%;
        object-fit: fill;
    }

    .container .card .number {
        font-size: 24px;
    }

    .container .card-body .btn.btn-primary .fab.fa-cc-paypal {
        font-size: 32px;
        color: #3333f7;
    }

    .fab.fa-cc-amex {
        color: #1c6acf;
        font-size: 32px;
    }

    .fab.fa-cc-mastercard {
        font-size: 32px;
        color: red;
    }

    .fab.fa-cc-discover {
        font-size: 32px;
        color: orange;
    }

    .c-green {
        color: green;
    }

    .box {
        height: 40px;
        width: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ddd;
    }

    .btn.btn-primary.payment {
        background-color: #1c6acf;
        color: white;
        border-radius: 0px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 24px;
    }


    .form__div {
        height: 50px;
        position: relative;
        margin-bottom: 24px;
    }

    .form-control {
        width: 100%;
        height: 45px;
        font-size: 14px;
        border: 1px solid #DADCE0;
        border-radius: 0;
        outline: none;
        padding: 2px;
        background: none;
        z-index: 1;
        box-shadow: none;
    }

    .form__label {
        position: absolute;
        left: 16px;
        top: 10px;
        background-color: #fff;
        color: #80868B;
        font-size: 16px;
        transition: .3s;
        text-transform: uppercase;
    }

    .form-control:focus+.form__label {
        top: -8px;
        left: 12px;
        color: #1A73E8;
        font-size: 12px;
        font-weight: 500;
        z-index: 10;
    }

    .form-control:not(:placeholder-shown).form-control:not(:focus)+.form__label {
        top: -8px;
        left: 12px;
        font-size: 12px;
        font-weight: 500;
        z-index: 10;
    }

    .form-control:focus {
        border: 1.5px solid #1A73E8;
        box-shadow: none;
    }
</style> <br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card p-3">
                <p class="mb-0 fw-bold h4">Төлем әдістері:</p>
            </div>
        </div>
        <div class="col-12">
            <div class="card p-3">
                <div class="card-body border p-0">
                    <p>
                        <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                           data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                           aria-controls="collapseExample">
                                <span class="fw-bold">Төлем картасы</span>
                            <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                        </a>
                    </p>
                    <div class="collapse show p-3 pt-0" id="collapseExample">
                        <div class="row">
                            <div class="col-lg-5 mb-lg-0 mb-3">
                                <p class="h4 mb-0">Толық бағасы:</p><br>
                                    <p class="mb-0"><span class="fw-bold">Курс:</span><span class="c-green">{{$courses->Name}}</span>
                                </p><br>
                                <p class="mb-0">
                                    <span class="fw-bold">Бағасы:</span>
                                    <span class="c-green">:{{$courses->Price}} KZT</span>
                                </p><br>
                                <span class="fw-bold">Курстың сипаттамасы:</span>
                                <p class="mb-0">{{$courses->Description}}</p>
                            </div>
                            <div class="col-lg-7">
                                <form action="{{ route('courses.purchase', $courses) }}" class="form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form__div">
                                                <input type="text" class="form-control" placeholder=" ">
                                                <label for="" class="form__label">Карта нөмері:</label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form__div">
                                                <input type="text" class="form-control" placeholder=" ">
                                                <label for="" class="form__label">MM / yy</label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form__div">
                                                <input type="password" class="form-control" placeholder=" ">
                                                <label for="" class="form__label">cvv code</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form__div">
                                                <input type="text" class="form-control" placeholder=" ">
                                                <label for="" class="form__label">карта аты</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Жіберу</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
