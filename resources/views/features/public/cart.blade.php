@extends('templates.public.main')
@section('title', 'Cart')
@section('content')
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Items in your cart</h5>
                            <span>(<strong>5</strong>) items</span>
                        </div>
                        <div class="ibox-content is-rounded">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>
                                        <tr>
                                            <td width="90">
                                                <div class="cart-product-imitation">
                                                </div>
                                            </td>
                                            <td class="desc">
                                                <h3>
                                                    <a href="#" class="text-navy text-decoration-none">
                                                        Desktop publishing software
                                                    </a>
                                                </h3>
                                                <p class="small">
                                                    It is a long established fact that a reader will be distracted by the
                                                    readable
                                                    content of a page when looking at its layout. The point of using Lorem
                                                    Ipsum is
                                                </p>
                                            </td>

                                            <td>
                                                <h3 class="h5">
                                                    $180,00
                                                    <small class="small text-muted">$230,00</small>
                                                </h3>
                                            </td>
                                            <td width="65">
                                                <input type="text" class="form-control" placeholder="1">
                                            </td>
                                            <td>
                                                <h5 class="h5">
                                                    $180,00
                                                </h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="ibox-content">
                            <button class="btn btn-black pull-right"><i class="fas fa-shopping-cart"></i>
                                Konfirmasi Pembayaran</button>
                            <button class="btn btn-white"><i class="fas fa-arrow-left"></i> Continue shopping</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold h5">
                                $390,00
                            </h2>
                            <hr>
                        </div>
                    </div>
                    <div class="card payment-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://bdsgp.my.id/img/200/JoXM0m.png" class="img-fluid rounded-start"
                                    alt="Bank Logo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">BCA</h5>
                                    <p class="card-text">4370963440</p>
                                    <p class="card-text">(Yusuf Maulana Bahari)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card payment-card my-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/BANK/BSI.png') }}" class="img-fluid rounded-start"
                                    alt="Bank Logo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">BCA</h5>
                                    <p class="card-text">4370963440</p>
                                    <p class="card-text">(Yusuf Maulana Bahari)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
