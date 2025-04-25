@extends('admin.app2')
@section('content2')


   
<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Khách hàng nói gì về chúng tôi ?</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Trang</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Đánh giá</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->
<div class="container mt-5">
    <h2 class="mb-4 text-center"><span class="text-primary">Hãy cho chúng tôi biết bạn cảm thấy dịch vụ của chúng tôi như thế nào?</span></h2>
    <form method="POST" action="{{ route('submit_comment') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-primary" style="font-weight: bold; font-size: 25px;">Họ và tên của bạn</label>
            <input type="text" class="form-control" name="client_name" id="name">
        </div>

        <div class="mb-3">
            <label for="province" class="form-label text-primary" style="font-weight: bold; font-size: 25px;">Bạn đến từ đâu</label>
            <select class="form-select" id="province" name="client_address">
                <option value="">Chọn tỉnh/Thành phố</option>
                <option value="Hà Nội">Hà Nội</option>
                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                <option value="Đà Nẵng">Đà Nẵng</option>
                <option value="Hải Phòng">Hải Phòng</option>
                <option value="Cần Thơ">Cần Thơ</option>
                <option value="An Giang">An Giang</option>
                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                <option value="Bắc Giang">Bắc Giang</option>
                <option value="Bắc Kạn">Bắc Kạn</option>
                <option value="Bạc Liêu">Bạc Liêu</option>
                <option value="Bắc Ninh">Bắc Ninh</option>
                <option value="Bến Tre">Bến Tre</option>
                <option value="Bình Định">Bình Định</option>
                <option value="Bình Dương">Bình Dương</option>
                <option value="Bình Phước">Bình Phước</option>
                <option value="Bình Thuận">Bình Thuận</option>
                <option value="Cà Mau">Cà Mau</option>
                <option value="Cao Bằng">Cao Bằng</option>
                <option value="Đắk Lắk">Đắk Lắk</option>
                <option value="Đắk Nông">Đắk Nông</option>
                <option value="Điện Biên">Điện Biên</option>
                <option value="Đồng Nai">Đồng Nai</option>
                <option value="Đồng Tháp">Đồng Tháp</option>
                <option value="Gia Lai">Gia Lai</option>
                <option value="Hà Giang">Hà Giang</option>
                <option value="Hà Nam">Hà Nam</option>
                <option value="Hà Tĩnh">Hà Tĩnh</option>
                <option value="Hải Dương">Hải Dương</option>
                <option value="Hậu Giang">Hậu Giang</option>
                <option value="Hòa Bình">Hòa Bình</option>
                <option value="Hưng Yên">Hưng Yên</option>
                <option value="Khánh Hòa">Khánh Hòa</option>
                <option value="Kiên Giang">Kiên Giang</option>
                <option value="Kon Tum">Kon Tum</option>
                <option value="Lai Châu">Lai Châu</option>
                <option value="Lâm Đồng">Lâm Đồng</option>
                <option value="Lạng Sơn">Lạng Sơn</option>
                <option value="Lào Cai">Lào Cai</option>
                <option value="Long An">Long An</option>
                <option value="Nam Định">Nam Định</option>
                <option value="Nghệ An">Nghệ An</option>
                <option value="Ninh Bình">Ninh Bình</option>
                <option value="Ninh Thuận">Ninh Thuận</option>
                <option value="Phú Thọ">Phú Thọ</option>
                <option value="Quảng Bình">Quảng Bình</option>
                <option value="Quảng Nam">Quảng Nam</option>
                <option value="Quảng Ngãi">Quảng Ngãi</option>
                <option value="Quảng Ninh">Quảng Ninh</option>
                <option value="Quảng Trị">Quảng Trị</option>
                <option value="Sóc Trăng">Sóc Trăng</option>
                <option value="Sơn La">Sơn La</option>
                <option value="Tây Ninh">Tây Ninh</option>
                <option value="Thái Bình">Thái Bình</option>
                <option value="Thái Nguyên">Thái Nguyên</option>
                <option value="Thanh Hóa">Thanh Hóa</option>
                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                <option value="Tiền Giang">Tiền Giang</option>
                <option value="Trà Vinh">Trà Vinh</option>
                <option value="Tuyên Quang">Tuyên Quang</option>
                <option value="Vĩnh Long">Vĩnh Long</option>
                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                <option value="Yên Bái">Yên Bái</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="commentContent" class="form-label text-primary" style="font-weight: bold; font-size: 25px;">Bạn đang nghĩ gì?</label>
            <textarea class="form-control" id="commentContent" name="client_comment" rows="3"></textarea>
        </div>


        <div class="mb-3">
            <label for="fileUpload" class="form-label text-primary" style="font-weight: bold; font-size: 25px;">Chọn một tấm ảnh của bạn mà bạn ưng ý nhất</label>
            <input type="file" class="form-control" id="fileUpload" name="client_image" accept="image/*">
        </div>
        <div class="row justify-content-center py-3">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary rounded-pill mt-3 mb-3">Gửi Bình Luận</button>
            </div>
        </div>

    </form>
</div>

<hr>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            @foreach($data_comment as $row)
            <div class="col-lg-2 wow fadeInUp mt-0 mb-0" data-wow-delay="0.1s" style="min-height: 200px;">
                <div class="position-relative h-20">
                    <img class="img-fluid position-absolute" src="{{asset('img/' . $row->client_image)}}" alt="" style="width: 200px; height: 200px;">
                    <hr>
                </div>
            </div>
            <div class="col-lg-10 wow fadeInUp mt-3 mb-0" data-wow-delay="0.3s">
                <h1 class="mb-4"><span class="text-primary">{{$row->client_name}}</span></h1>
                <h3 class="mb-4"><span class="text-primary">{{$row->client_address}}</span></h3>
                <p class="mb-0" style="font-size: 25px;">{{$row->client_comment}}</p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
<!-- About End -->

@endsection