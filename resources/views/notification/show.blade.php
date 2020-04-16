@extends('layout2')

@section('head')
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection

@section('content')

    <div class="tab-content custom-tab-content" align="center">
        <div class="subscribe-panel">
            <h1>Notifications</h1>

            <ul>
                @forelse($notifications as $notification)
                    @if($notification->type==='App\Notifications\PaymentReceived')
                        <li style="color:blue">Your payment of  <b>{{$notification->data['amount']}}</b> received successfully.</li>
                    @endif
                @empty
                    There are no unread notifications.
                @endforelse
            </ul>

        </div>
    </div>

@endsection

