<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>chat app - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layout.page-css')
    <style type="text/css">
        body {
            background-color: #f4f7f6;
            margin-top: 20px;
        }

        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <form method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{--                            <span class="input-group-text"><i class="fa fa-search"></i></span>--}}
                                <button type="submit"><span class="input-group-text"><i class="fa fa-search"></i></span></button>
                            </div>
                            <input type="text" class="form-control input-search" name="name" placeholder="Search...">
                        </div>
                    </form>
                    <ul class="list-unstyled chat-list mt-2 mb-0 search-ajax-result">
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                            <div class="about">
                                <div class="name">Vincent Porter</div>
                                <div class="status"><i class="fa fa-circle offline"></i> left 7 mins ago</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0" id="message">
                            {{--                            <li class="clearfix">--}}
                            {{--                                <div class="message-data text-right">--}}
                            {{--                                    <span class="message-data-time">10:10 AM, Today</span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the--}}
                            {{--                                    project coming along?--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="clearfix">--}}
                            {{--                                <div class="message-data">--}}
                            {{--                                    <span class="message-data-time">10:12 AM, Today</span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="message my-message">Are we meeting today?</div>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                    <form action="{{ Route('sent.message') }}" method="post" id="input-message">
                        @csrf
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <button class="submit"><i class="fa fa-send"></i></button>
                                </div>
                                <input type="text" class="form-control" name="message" id="message-value"
                                       placeholder="Enter text here...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.page-js')
<script type="text/javascript">
    {{--$(".input-search").keyup(function () {--}}
    {{--    var text = $(this).val();--}}
    {{--    console.log(text)--}}
    {{--    --}}{{--var url = 'http://127.0.0.1:8000/Images/'--}}

    {{--    if (text != '') {--}}
    {{--        $.ajax({--}}
    {{--            url: "{{route('search.name')}}?key=" + text,--}}
    {{--            type: 'GET',--}}
    {{--            success: function (res) {--}}
    {{--                var html = '';--}}
    {{--                var message = '';--}}
    {{--                if (res.data != '') {--}}
    {{--                    var pro = res.data;--}}
    {{--                    pro.forEach((function (item) {--}}
    {{--                        message = '<h5 class="media-heading">' + res.message +'</h5>';--}}
    {{--                        html += '<li class="clearfix">';--}}
    {{--                        html += '<img src="{{ url('Images/')}}/' + item.img_avatar + '" alt="avatar">';--}}
    {{--                        html += '<div class="about">';--}}
    {{--                        html += '<div class="name">Vincent Porter</div>';--}}
    {{--                        html += '</div>'--}}
    {{--                        html += '</li>';--}}
    {{--                    }))--}}
    {{--                    $('.search-ajax-result').html([message,html])--}}
    {{--                } else {--}}
    {{--                    html += '<h4 class="media-heading"> Không tìm thấy</h4>';--}}
    {{--                    $('.search-ajax-result').html(html)--}}
    {{--                }--}}
    {{--            }--}}
    {{--        });--}}
    {{--    } else {--}}
    {{--        $('.search-ajax-result').html('');--}}
    {{--    }--}}
    {{--});--}}
</script>
</body>
</html>