@extends('company.layout')
@section('content')
    @include('company.search')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <div class="row g-4 mb-4">
        @foreach($all_post as $post)
            <form action="{{ Route('post.detail',['id' => $post->id]) }}" method="post">
                <div class="btn btn-white col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                                            <path fill-rule="evenodd"
                                                  d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                    </div>
                                </div>
                                @if($post->status == 1)
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Đã phê duyệt</h4>
                                    </div>
                                @else
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Chưa phê duyệt</h4>
                                    </div>
                                @endif
                                <div class="col-auto">
                                    <div class="toggle focus">
                                        <input type="checkbox">
                                        <span class="slider focus"></span>
                                        <span class="label">Ẩn bài viết</span>
                                    </div>
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">
                            <div class="intro">
                                {{ $post->title }}
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <!-- <a class="btn app-btn-secondary" id="1" href="#">Đóng bài viết</a> -->
                            <a class="btn app-btn-primary" id="2" href="#">Xoá bài viết</a>
                        </div>
                        <!--//app-card-footer-->
                    </div>
                    <!--//app-card-->
                </div>
            </form>
        @endforeach
    </div>
    <script>
        $(document).ready(function () {
            $('.toggle input[type="checkbox"]').click(function () {
                $(this).parent().toggleClass('on')
                if ($(this).parent().hasClass('on')) {
                    console.log(123)
                    $(this).parent().children('.label').text('Hiện bài viết')
                } else {
                    console.log(456)
                    $(this).parent().children('.label').text('Ẩn bài viết')
                }
            });
            $('input').focusin(function () {
                $(this).parent().addClass('focus');
            });
            $('input').focusout(function () {
                $(this).parent().removeClass('focus');
            });
        });

    </script>
    <style>
        @keyframes eh {
            0% {transform: scale(0%)};
        100% {transform: scale(100%)};
        }

        /* .feather-check { color: white; width: 30px; height: 30px; } */
        .checked-icon { display: block; opacity: 0;}
        /* .rad-icon { opacity: 0; background-color: transparent; border: 2px solid white; height: 20px; width: 20px; border-radius: 50%; margin: 5px auto; display: block; } */

        * {
            box-sizing: border-box;
            -moz-box-sizing:border-box;
            -webkit-box-sizing:border-box;
            -o-box-sizing:border-box;
            word-wrap: break-word;
        }
        .checkbox{
            width: 30px;
            height: 30px;
            position: relative;
            display: block;
        }

        .check {
            position: absolute;
            height: 100%;
            width: 100%;
            background-color: #e3eefa;
        }
        .check { border-radius: 3px; transition: all 0.4s; }

        .checkbox.on .check{ background-color: #4287f5; }
        .checkbox.on .checked-icon {
            opacity: 1;
            text-align: center;
            animation-name: eh;
            animation-duration: 0.3s;
        }

        .checkbox .checked-icon { transition: opacity 0.3s ease-out; }

        .toggle {
            position: relative;
            width: 50px;
            height: 24px;
            display: inline-block;
        }

        .toggle .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: 0.4s;
            border-radius: 34px;
        }

        .toggle .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.05);
        }

        .toggle .slider { background-color: red; }
        .toggle.on .slider { background-color: #4287f5; }
        .toggle.on .slider:before { transform: translateX(26px); box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.2); }

        .toggle .label { position: absolute; left: 50px; top: 4px; vertical-align: middle;width: 170%;font-size: 14px; }
        .checkbox .label { position: absolute; left: 50px; top: 4px; vertical-align: middle; }

        input[type="checkbox"] { height: 100%; width: 100%; opacity: 0; position: absolute; z-index: 100; cursor: pointer; vertical-align: middle;}

        .toggle.focus .slider, .checkbox.focus .check { box-shadow: 0px 0px 0px 2px #bababa; transition: all 0.4s; }
        .focus .label { text-shadow: 0px 0px 3px #bababa; transition: all 0.4s; }

    </style>
@endsection
