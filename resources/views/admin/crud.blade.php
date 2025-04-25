@extends('admin.app2')
@section('content2')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">QUẢN LÝ TOUR</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Thêm Tour - Xóa Tour - Sửa Thông Tin Tour</p>

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
        <h1 class="text-center text-primary px-3">Thêm tour</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tour_name" class="form-label text-primary">Tên tour</label>
                            <input type="text" class="form-control" id="tour_name" name="tour_name" placeholder="Tên tour">
                        </div>

                        <div class="mb-3">
                            <label for="start_day" class="form-label text-primary">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="start_day" name="start_day" placeholder="Ngày bắt đầu">
                        </div>

                        <div class="mb-3">
                            <label for="time" class="form-label text-primary">Thời gian</label>
                            <input type="text" class="form-control" id="time" name="time" placeholder="Thời gian">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label text-primary">Giá tour</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Giá tour">
                        </div>

                        <div class="mb-3">
                            <label for="tour_image" class="form-label text-primary">Hình ảnh tour</label>
                            <input style="margin-bottom: 35px;" type="file" class="form-control" id="tour_image" name="tour_image">
                        </div>

                        <div class="mb-3">
                            <label for="tour_description" class="form-label text-primary">Giới thiệu tour</label>
                            <textarea class="form-control" id="tour_description" name="tour_description" placeholder="Giới thiệu tour"></textarea>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="vehicle" class="form-label text-primary">Phương tiện di chuyển</label>
                            <!-- <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="Phương tiện di chuyển"> -->
                            <select style="width: 306px;" name="vehicle" required>
                                <option value="" disabled selected>Chọn loại phương tiện</option>
                                <option value="Máy bay">Máy bay</option>
                                <option value="Xe khách">Xe khách</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="star_from" class="form-label text-primary">Nơi khởi hành</label>
                            <input type="text" class="form-control" id="star_from" name="star_from" placeholder="Nơi khởi hành" value="TP.Hồ Chí Minh">
                        </div>

                        <div class="mb-3">
                            <label for="location_id" class="form-label text-primary">Location ID</label> <br>
                            <!-- <input type="number" class="form-control" id="location_id" name="location_id" placeholder="Location ID"> -->
                            <select style="width: 306px;" name="location_id" required>
                                <option value="" disabled selected>Chọn vùng</option>
                                @foreach($data_location as $row)
                                <option value="{{ $row->location_id }}">{{ $row->location_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tour_sale" class="form-label text-primary">Giảm giá tour</label>
                            <input type="text" class="form-control" id="tour_sale" name="tour_sale" placeholder="Giảm giá tour">
                        </div>

                        <div class="mb-3">
                            <label for="guide_id" class="form-label text-primary">Guide ID</label> <br>
                            <!-- <input type="number" class="form-control" id="guide_id" name="guide_id" placeholder="Guide ID"> -->

                            <select style="width: 306px;" name="guide_id" required>
                                <option value="" disabled selected>Chọn hướng dẫn viên</option>
                                @foreach($data_guide as $row)
                                <option value="{{ $row->guide_Id }}">{{ $row->guide_Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tour_schedule" class="form-label text-primary">Lịch trình tour</label>
                            <textarea class="form-control" id="tour_schedule" name="tour_schedule" placeholder="Lịch trình tour"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="text-center text-primary px-3">Danh Sách Tour</h1>
    </div>
        <div class="row g-5">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Tour name</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Start day</th>
                            <th class="text-center" scope="col">Time</th>
                            <th class="text-center" scope="col">Start from</th>
                            <th class="text-center" scope="col">Price</th>
                            <th class="text-center" scope="col">Vehicle</th>
                            <th class="text-center" scope="col">Description</th>
                            <th class="text-center" scope="col">Schedule</th>
                            <th class="text-center" scope="col">Location ID</th>
                            <th class="text-center" scope="col">Guide ID</th>
                            <th class="text-center" scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $row)
                        <tr>
                            <td class="text-center">{{ $row->tour_id}}</td>
                            <td>{{ $row->tour_name}}</td>
                            <td class="text-center"><img class="img-fluid" src="{{ asset('img/'.$row->tour_image) }}" alt=""></td>
                            <td class="text-center">{{ $row->start_day}}</td>
                            <td class="text-center">{{ $row->time}}</td>
                            <td class="text-center">{{ $row->star_from}}</td>
                            <td class="text-center">{{number_format($row->price, 0, ',', '.')}}</td>
                            <td class="text-center">{{ $row->vehicle}}</td>
                            <?php
                            $tourDescription = $row->tour_description;

                            // Chia chuỗi thành mảng các từ
                            $words = explode(' ', $tourDescription);

                            // Lấy 100 từ đầu tiên
                            $mota = implode(' ', array_slice($words, 0, 20));
                            ?>
                            <td class="text-center">{{ $mota}}</td>
                            <?php
                            $tourSchedule = $row->tour_schedule;

                            // Chia chuỗi thành mảng các từ
                            $words1 = explode(' ', $tourSchedule);

                            // Lấy 100 từ đầu tiên
                            $schedule = implode(' ', array_slice($words1, 0, 20));
                            ?>
                            <td class="text-center">{{$schedule}}</td>
                            <td class="text-center">{{ $row->location_id}}</td>
                            <td class="text-center">{{ $row->guide_id}}</td>
                            <!-- Nút xóa -->
                            <td class="text-center">
                                <div class="btn-group" style="line-height: 10px;" role="group" aria-label="Basic example">
                                    <form action="{{ route('tours.destroy', $row->tour_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="margin-right: 10px;"><i class="fa fa-trash-alt text-danger"></i></button>
                                    </form>
                                    <a href="{{ route('tours.edit', $row->tour_id) }}" class="btn"><i class="fa fa-edit text-primary"></i></a>
                                </div>
                            </td>
                            <!-- <td>
                                <a href="{{ route('tours.edit', $row->tour_id) }}" class="btn btn-sm btn-primary">edit</a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Phần phân trang -->

    <div class="row justify-content-center">
        <div class="col-auto">
            <ul class="pagination">
                {{-- Nút Previous --}}
                @if ($data->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @endif

                {{-- Các nút số --}}
                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                <li class="page-item {{ ($page == $data->currentPage()) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                {{-- Nút Next --}}
                @if ($data->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection