<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ \App\Helpers\Helper::profile('slug') }}</title>
</head>
<link rel="stylesheet" href="{{ asset('assets/plugin/font-awesome/css/font-awesome.min.css') }}" type="text/css">
<style>
    body {
        margin-top: 20px;
    }

    .error-page {
        text-align: center;
        background: #fff;
        border-top: 1px solid #eee;
    }

    .error-page .error-inner {
        display: inline-block;
    }

    .error-page .error-inner h1 {
        font-size: 140px;
        text-shadow: 3px 5px 2px #3333;
        color: #006DFE;
        font-weight: 700;
    }

    .error-page .error-inner h1 span {
        display: block;
        font-size: 25px;
        color: #333;
        font-weight: 600;
        text-shadow: none;
    }

    .error-page .error-inner p {
        padding: 20px 15px;
    }

    .error-page .search-form {
        width: 100%;
        position: relative;
    }

    .error-page .search-form input {
        width: 400px;
        height: 50px;
        padding: 0px 78px 0 30px;
        border: none;
        background: #f6f6f6;
        border-radius: 5px;
        display: inline-block;
        margin-right: 10px;
        font-weight: 400;
        font-size: 14px;
    }

    .error-page .search-form input:hover {
        padding-left: 35px;
    }

    .error-page .search-form .btn {
        width: 80px;
        height: 50px;
        border-radius: 5px;
        cursor: pointer;
        background: #006DFE;
        display: inline-block;
        position: relative;
        top: -2px;
        border: none;
    }

    .error-page .search-form .btn i {
        font-size: 16px;
    }

    .error-page .search-form .btn:hover {
        background: #333;
    }
</style>

<body>
    <section class="error-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="error-inner">
                        <h1>404<span>Oop's sorry we can't find that page!</span></h1>
                        <p>Sorry, the page you were looking for was not found. </p>
                        <form class="search-form">
                            <input placeholder="Search from Here" type="text">
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
