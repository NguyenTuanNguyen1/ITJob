@extends('company.layout')
@section('content')
@include('layout.page-css')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="form-group mb-2">
    <form action="{{ Route('search.company.filter') }}" method="post" class="search-jobs-form">
        @csrf
        <div class="row mb-2">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <select class="selectpicker border rounded p-2" id="job-region" data-style="btn-black" data-width="100%"
                    data-live-search="true" title="Select Region" name="major">
                    <option>IT/ Công nghệ phần mềm</option>
                    <option>Kế toán</option>
                    <option>Makerting</option>
                    <option>Chế tạo máy</option>
                    <option>Điện/ Điện tử</option>
                    <option>Báo chí/ Truyền hình</option>
                    <option>Bất động sản</option>
                    <option>Công nghệ Ô tô</option>
                    <option>Cơ khí</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-2 mb-4 mb-lg-0">
                <select class="selectpicker border rounded p-2" id="job-region" data-width="100%"
                    data-live-search="true" title="Select Region" name="position">
                    <option>Thực tập sinh</option>
                    <option>Nhân viên</option>
                    <option>Phó phòng</option>
                    <option>Trưởng phòng</option>
                    <option>Trợ lý</option>
                    <option>Thư ký</option>
                    <option>Giám Đốc</option>
                    <option>Quản lý</option>
                </select>
            </div>
            <div class="col-1 col-sm-1 col-md-1 col-lg-2 mb-4 mb-lg-0">
                <button type="submit" style="font-size: 1rem; padding:8px"
                    class="btn btn-primary btn-lg btn-block text-white btn-search">
                    Tìm kiếm
                </button>
            </div>
        </div>
    </form>
</div>
{{--            <div class="position-relative mb-3">--}}
{{--                <div class="row g-3 justify-content-between">--}}
{{--                    <div class="col-auto">--}}
{{--                        <div class="page-utilities">--}}
{{--                            <select class="form-select form-select-sm w-auto">--}}
{{--                                <option selected value="option-1">All</option>--}}
{{--                                <option value="option-2">News</option>--}}
{{--                                <option value="option-3">Product</option>--}}
{{--                                <option value="option-4">Project</option>--}}
{{--                                <option value="option-4">Billing</option>--}}
{{--                            </select>--}}
{{--                        </div><!--//page-utilities-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
<div style="display:flex;flex-wrap:wrap;justify-content:center">
    @foreach($candidates as $candidate)
    <div class="app-card app-card-notification shadow-sm m-1" style="width:32%">
        <div class="app-card-header px-4 py-3">
            <div class="row g-3 ">
                <div class="col-12 col-lg-auto text-center text-lg-start">
                    <img class="profile-image" src="{{ url('image_avatar') }}/{{ $candidate->img_avatar }}" alt="">
                </div>
                <!--//col-->
                <div class="col-12 col-lg-auto text-lg-start">
                    <div class="notification-type mb-2"><p>{{ $candidate->username }}</p></div>
                    <div class="notification-type mb-2"></p>Chuyên ngành</div>
                    <div class="notification-type mb-2"><p>Vị trí</p></div>
                </div>
                <!--//col-->    
            </div>
            <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body p-4">
            <div class="notification-content" style=" display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1.6rem;">{{ $candidate->description }}</div>
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer px-4 py-3">
            <!-- <a class="action-link" href="{{ Route('profile.user',['id' => $candidate->id]) }}">Xem chi tiết
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </a> -->
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalLong">
                Xem chi tiết
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </button>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            233123
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--//app-card-footer-->
    </div>

    <!--//app-card-->
    @endforeach
</div>
@include('layout.page-js')
@include('modal.history.user')
@endsection