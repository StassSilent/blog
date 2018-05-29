@extends('navigation')

@section('user_content')

    <main role="main" class="container">
        <div class="chat-box pt-5">
            <div class="row">
                <div class="col-12 dialog-list">
                    <div class="row msgs">
                        <ui id="msg-list" class="slider">

                            @foreach ($data as $d)
                                <li id="msg-item">
                                @if((Auth::user()->id)==$d->id_1)
                                        <a  class="dialog_a select_dialog pt-2 pb-2" href="/messages/{{$id=$d->id}}?id_photo={{$d->id_2_photo}}&id_name={{$d->id_2_name}}"><img style="width: 70px; border-radius: 50%" src="{{asset('img').'/'.$d->id_2_photo}}"/>{{$d->id_2_name }} </a>
                               @elseif((Auth::user()->id)==$d->id_2)
                                        <a  class="dialog_a select_dialog pt-2 pb-2" href="/messages/{{$d->id}}?id_photo={{$d->id_1_photo}}&id_name={{$d->id_1_name}}"><img style="width: 70px; border-radius: 50%" src="{{asset('img').'/'.$d->id_1_photo}}"/>{{$d->id_1_name }} </a>

                                    @endif
                                </li>
                            @endforeach

                        </ui>
                    </div>
                </div>
            </div>
        </div>


        {{--<script>--}}


        {{--setInterval(function() {--}}
        {{--$.ajax({--}}
        {{--url: '/chatGetMsgItem',--}}
        {{--type: "get",--}}
        {{--contentType: 'html',--}}
        {{--success: function (msg) {--}}
        {{--console.log(msg[0].msg);--}}
        {{--var item  = document.createElement('li');--}}
        {{--item.id = 'msg-item';--}}
        {{--item.className = 'me';--}}
        {{--item.innerHTML = msg[0].msg;--}}
        {{--document.getElementById('msg-list').appendChild(item);--}}
        {{--}--}}
        {{--})--}}
        {{--}, 3000);--}}


        {{--</script>--}}

    </main>


@endsection
@include ('footer')






