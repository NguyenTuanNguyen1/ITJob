@extends('layout.layout')
@section('content')
    <section class="section-hero overlay inner-page" style="padding-bottom: 1em;padding-top: 3em;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Post a Job</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" style="background-color:white">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="p-4 p-md-5 border rounded" action="{{ route('post.create') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="job-description">Tiêu đề</label><br>
                            <textarea name="title" rows="3" cols="112"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Mô tả</label>
                            <textarea name="description" id="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Quyền lợi</label>
                            <textarea name="benefit" id="benefit"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="job-description">Địa điểm làm việc</label><br>
                            <input type="text" name="workplace" cols="112">
                        </div>

                        <div class="form-group">
                            <label for="job-description">Số lượng</label><br>
                            <input type="number" name="quantity">
                        </div>

                        <div class="form-group">
                            <label for="job-description">Kinh nghiệm</label><br>
                            <input type="text" name="experience">
                        </div>

                        <div class="form-group">
                            <label for="job-type">Hình thức làm việc</label>
                            <select class="selectpicker border rounded" id="job-type" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Job Type" name="working">
                                <option>Part Time</option>
                                <option>Full Time</option>
                                <option>Remote</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Yêu cầu</label>
                            <textarea name="requirements" id="requirements"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="job-region">Chuyên ngành</label>
                            <select class="selectpicker border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="major">
                                <option>Anywhere</option>
                                <option>San Francisco</option>
                                <option>Palo Alto</option>
                                <option>New York</option>
                                <option>Manhattan</option>
                                <option>Ontario</option>
                                <option>Toronto</option>
                                <option>Kansas</option>
                                <option>Mountain View</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job-region">Cấp bậc</label>
                            <select class="selectpicker border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="level">
                                <option>Anywhere</option>
                                <option>San Francisco</option>
                                <option>Palo Alto</option>
                                <option>New York</option>
                                <option>Manhattan</option>
                                <option>Ontario</option>
                                <option>Toronto</option>
                                <option>Kansas</option>
                                <option>Mountain View</option>
                            </select>
                        </div>

                        <input type="text" name="user_id" value=" {{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-primary btn-md">Tạo bài viết</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script>
<script>

    CKEDITOR.replace('description');
    CKEDITOR.replace('benefit');
    CKEDITOR.replace('requirements');
</script>
@endsection
