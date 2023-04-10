<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="menu-desktop">
        <img src="menu-layout/images/picture.png" />
        <div class="form-options">
            <span class="option">Việc làm</span>
            <span class="option">Phát triển</span>
            <span class="option">Hồ sơ & CV</span>
            <span class="option">Công ty</span>
            <span class="option">Phát triển sự nghiệp</span>
            <span class="option">Công cụ</span>
        </div>
        <div class="form-button">
            <span class="button-menu">Đăng nhập</span>
            <span class="button-menu">Đăng kí</span>
            <!-- <span class="button-menu"></span> -->
        </div>
    </div>
    <hr />
    <div class="menu-search">
        <form class="form-search" action="/action_page.php">
            <input class="input-select" type="text" placeholder="Tên công việc, vị trí bạn muốn ứng tuyển ..." name=""
                id="" />
            <select class="input-select" id="job" name="jobs">
                <option value="deafault">Tên các ngành nghề</option>
                <option value="Font-end">Font-end</option>
            </select>
            <select class="input-select" id="job" name="jobs">
                <option value="deafault">Tên các ngành nghề</option>
                <option value="Font-end">Font-end</option>
            </select>
            <select class="input-select" id="job" name="jobs">
                <option value="deafault">Tên các ngành nghề</option>
                <option value="Font-end">Font-end</option>
            </select>
            <input class="input-submit" type="submit">
        </form>
    </div>
</body>
</html>
@include('layout.page-css')