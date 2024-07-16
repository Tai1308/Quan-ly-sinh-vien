@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 DANH SÁCH GIẢNG VIÊN
                </div>
                <div>
                  <table class="table" ui-jq="footable" ui-options='{
                    "paging": {
                      "enabled": true
                    },
                    "filtering": {
                      "enabled": true
                    },
                    "sorting": {
                      "enabled": true
                    }}'>
                    <thead>
                      <tr>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">ID</th>
                        <th data-breakpoints="xs" class="t_table">Họ và tên</th>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Số điện thoại</th>
                        <th class="t_table">Gmail</th>
                        <th class="t_table">Chứng chỉ</th>
                        <th data-breakpoints="xs" class="t_table">Hành động</th>
                      </tr>
                      <div>
                            <div class="col-sm-3" style="margin-top: 10px">
                                 {{-- Tìm kiếm --}}
                                <div class="box">
                                    <form action="" method="POST">
                                        <div class="container-1">
                                            <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                            <input type="search" id="search" placeholder="Tìm kiếm thông tin giảng viên" />
                                        </div>
                                    </form>
                                </div>
                                {{-- Tìm kiếm --}}
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px;">
                                <div style="margin-left: 76%; margin-top: 10px;">
                                    <a href="{{route('exportTeacher.exportExcelTeacher')}}"><button type="button" class="btn btn-success">Export</button></a>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTCModal">Thêm mới</button>
                                    <!-- Modal start -->
                                    <!-- Modal thêm thông tin giảng viên-->
                                    <div class="modal fade" id="addTCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header cus-modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Thêm giảng viên</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="admin/humanResources/addTeacher" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="nameteacher" class="form_text">Họ và tên giảng viên: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="addNameTeacher" name="teacher_name" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="idTeacher" class="form_text">CMND: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="addIdTeacher" name="teacher_id" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="phone" class="form_text">Số điện thoại: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="addPhoneTeacher" name="phone" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="Email" class="form_text">Email: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control" id="addEmailTeacher" name="gmail" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="addressTeacher" class="form_text">Địa chỉ: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="type" class="form-control" id="addAddressTeacher" name="address" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="sex" class="form_text">Giới tính: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                    <select class="form-control" id="exampleFormControlSelect1" name="sex" >
                                                                        <option value="">Chọn giới tính</option>
                                                                        <option value="1">Nam</option>
                                                                        <option value="0">Nữ</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="certificate" class="form_text">Chứng chỉ: </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="addCetificate" name="certificate" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-success">OK</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end -->
                                </div>
                            </div>
                      </div>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
            </div>
            <div style="margin-left: 85%">
                {!!$teacher->links()!!}
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger error_Acc" style="margin-top: 20px">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 20px">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>
    </section>
</section>
{{-- Tìm kiếm script --}}
<script>
    $(document).ready(function(){
        fetch_teacher_data();
        function fetch_teacher_data(query = '')
        {
            $.ajax({
                url:"{{ route('livesearchTeacher.searchTeacher') }}",
                method: 'GET',
                data:{query:query},
                dataType: 'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                }

            })
        }
        $(document).on('keyup','#search', function(){
        var query = $(this).val();
        fetch_teacher_data(query);
    });
    });
</script>
<!--main content end-->
@endsection