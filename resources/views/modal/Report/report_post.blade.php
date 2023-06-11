<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<!-- Stylesheet -->
<link rel="stylesheet" href="{{ url('board-master/css/upload-image.css') }}">
<div class="modal fade" id="modalReportPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ Route('report.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Báo cáo bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="container2">
                    <input type="file" id="file-input" onchange="preview()"  name="image[]" multiple>
                    <label for="file-input">
                        <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                    </label>
                    <p id="num-of-files">No Files Chosen</p>
                    <div id="images"></div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" style="font-weight: bold;">Nội dung :
                        </label>
                    </div>
                    <textarea name="content" cols="50" rows="4"></textarea>
                    <div id="replied_report"></div>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : null }}">
                <input type="hidden" name="username" value="{{ isset(Auth::user()->username) ? Auth::user()->username : null }}">
                <input type="hidden" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : null }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Phản hồi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ url('board-master/js/upload-image.js') }}"></script>
