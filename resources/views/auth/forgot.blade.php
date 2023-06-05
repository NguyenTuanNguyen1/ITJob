@extends('layout.layout')
@section('content')
    <section class="site-section">
        <div class="container" style="background-color: white;padding: 10px;border-radius: 10px;">
            <form action="{{ Route('send.forgot.mail') }}" method="post">
                @csrf
                <input type="text" name="email">
                @if(session('success'))
                    <p style="color:red">{{session('Error')}}</p>
                @endif
                <button type="submit"> Nhập</button>
            </form>
        </div>
    </section>
@endsection
