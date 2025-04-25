@extends('admin.app2')
@section('content2')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">QUẢN LÝ LOCATION</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Thêm Location - Xóa Location - Sửa Thông Tin Location</p>

            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
@if (session('success'))
    <div class="alert alert-success text-center" style="font-size: 30px;">
        {{ session('success') }}
    </div>
@endif
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="text-center text-primary px-3">Thêm Địa Điểm</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="tour_name" class="form-label text-primary">Tên location</label>
                        <input type="text" class="form-control" id="location_name" name="location_name" placeholder="Tên location">
                    </div>
                    <div class="mb-3">
                        <label for="start_day" class="form-label text-primary">Hình ảnh</label>
                        <input type="file" class="form-control" id="location_image" name="location_image" placeholder="Hình ảnh">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="text-center text-primary px-3">Danh Sách Địa Điểm</h1>
    </div>
        <div class="row g-5">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Location name</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data_location as $row)
                        <tr>
                            <td style="width: 50px; line-height: 250px;" class="text-center">{{ $row->location_id}}</td>
                            <td style="width: 10px; line-height: 250px;" class="text-center">{{ $row->location_name}}</td>
                            <td class="text-center" style="width: 100px;"><img class="img-fluid" style="width: 600px; height: 250px" src="{{ asset('img/'.$row->location_image) }}" alt=""></td>
                            <!-- Nút xóa -->
                            <td style="width: 50px; line-height: 250px;" class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{ route('location.destroy', $row->location_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="margin-right: 10px;"><i class="fa fa-trash-alt text-danger"></i></button>
                                    </form>
                                </div>
                                <a href="{{ route('location.edit', $row->location_id) }}" class="btn"><i class="fa fa-edit text-primary"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection