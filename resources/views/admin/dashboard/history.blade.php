@extends('admin.dashboard.layout')
@section('content')
    <div class="content">
        <div class="content" style="margin-top: 5px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Lịch sử </h4>
                        </div>
                        <div class="card-body">
                            <div class="@if($history->isNotEmpty() && count($history) > 8) Scroll @endif">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Thời gian</th>
                                    <th>Hoạt động</th>
                                    {{--                                    <th class="text-center">Chức năng</th>--}}
                                    </thead>
                                    @foreach($history as $data)
                                        <tbody>
                                        <tr>
                                            <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                                            <td>{{ $data->content }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .Scroll {
            height: 580px;
            overflow-y: scroll;
        }
    </style>
@endsection
