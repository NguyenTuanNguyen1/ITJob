<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Tổng số bài viết</h4>
                <div class="stats-figure">{{ $count_all_post }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    {{--                <div class="col-6 col-lg-3">--}}
    {{--                    <div class="app-card app-card-stat shadow-sm h-100">--}}
    {{--                        <div class="app-card-body p-3 p-lg-4">--}}
    {{--                            <h4 class="stats-type mb-1">Trong tháng qua</h4>--}}
    {{--                            <div class="stats-figure">$2,250</div>--}}
    {{--                            <div class="stats-meta text-success">--}}
    {{--                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down"--}}
    {{--                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                                    <path fill-rule="evenodd"--}}
    {{--                                          d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>--}}
    {{--                                </svg>--}}
    {{--                                5%--}}
    {{--                            </div>--}}
    {{--                        </div><!--//app-card-body-->--}}
    {{--                        <a class="app-card-link-mask" href="#"></a>--}}
    {{--                    </div><!--//app-card-->--}}
    {{--                </div><!--//col-->--}}
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Đã phê duyệt</h4>
                <div class="stats-figure">{{ $count_post_approved }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Chưa phê duyệt</h4>
                <div class="stats-figure">{{ $count_post_not_approved }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->

<form action="{{ Route('search.filter.datetime') }}" method="post">
    @csrf
    <div class="form-group mb-2">
        <label for="job-region">Từ</label>
        <input type="date" name="from">
        <label for="job-region">đến</label>
        <input type="date" name="to">
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <button type="submit">Tìm kiếm</button>
    </div>
</form>
