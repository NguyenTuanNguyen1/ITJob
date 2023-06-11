@extends('company.layout')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="form-group mb-2">
                <form action="{{ Route('search.company.filter') }}" method="post" class="search-jobs-form">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker border rounded p-2" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="major">
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
                            <select class="selectpicker border rounded p-2" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="position">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                                <span class="icon-search icon mr-2"></span>Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach($users as $user)
                <div class="app-card app-card-notification shadow-sm mb-4">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <img class="profile-image" src="{{ url('image_avatar') }}/{{ $user->img_avatar }}"
                                     alt="">
                            </div>
                            <!--//col-->
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <div class="notification-type mb-2">{{ $user->username }}</div>
                                <h4 class="notification-title mb-1">{{ $user->position }}</h4>

                            </div>
                            <!--//col-->
                        </div>
                        <!--//row-->
                    </div>
                    <!--//app-card-header-->
                    <div class="app-card-body p-4">
                        <div class="notification-content">{{ $user->description }}</div>
                    </div>
                    <!--//app-card-body-->
                    <div class="app-card-footer px-4 py-3">
                        <a class="action-link" href="{{ Route('profile.user',['id' => $user->id]) }}">Xem chi tiết
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2"
                                 fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    </div>
                    <!--//app-card-footer-->
                </div>
                <!--//app-card-->
            @endforeach

        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
@endsection
