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
                <div class="imageUpload">
                    <input name="image[]" type="file" id="imageUploadInput" multiple>
                    <span class="button" id="imageUploadInputBtn">Chọn Hình</span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" style="font-weight: bold;">Nội dung : </label>
                    </div>
                    <textarea name="content" cols="60" rows="4"></textarea>
                    <div id="replied_report"></div>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Phản hồi</button>
                </div>
            </form>
        </div>
    </div>
</div>