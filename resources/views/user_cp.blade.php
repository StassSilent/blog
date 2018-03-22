@extends('navigation')

@section('user_content')
        <div class="container">
            <div class="row row_pad">
        <div class="col-md-3 border">
            <img class="img_border img-thumbnail" align="right"  src="{{$user->photo}}" alt="../img/grey.jpg">
        </div>
        <div class="col-md-3 border text-left">
            <p><h2>{{ $user->login }}</h2></p>
            <br><p><h2>{{ $user->rating }}</h2></p>
        </div>
        <div class="col-md-6 border align-content-lg-center">
            <h4>{{ $user->about}}</h4>
        </div>
            </div>

        </div>
@endsection
@extends('footer')
