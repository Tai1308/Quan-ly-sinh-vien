@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 TÀI KHOẢN NGƯỜI DÙNG
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
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">STT</th>
                                <th data-breakpoints="xs" class="t_table">User name</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Email</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Vai trò</th>
                                <th data-breakpoints="xs" >Hành động</th>
                            </tr>
                            <div>
                                <div class="col-sm-3" style="margin-top: 10px">
                                 {{-- Tìm kiếm --}}
                                    <div class="box">
                                        <form action="" method="POST">
                                            <div class="container-1">
                                                <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                                <input type="search" id="search" placeholder="Tìm kiếm tài khoản" />
                                            </div>
                                        </form>
                                    </div>
                                {{-- Tìm kiếm --}}
                                </div>
                                <div class="col-sm-9" style="margin-top: 10px;">
                                    <div style="margin-left: 75%; margin-top: 10px;">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAccModal">Thêm tài khoản</button>
                                        <!-- Modal start -->
                                        <!-- Modal thêm thông tin tài khoản-->
                                        <div class="modal fade" id="addAccModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="admin/humanResources/addAccount" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="nameAcc" class="form_text">Tên người dùng: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="addNameAcc" name="name"  required="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="EmailAcc" class="form_text">Email: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="email" class="form-control" id="addEmailAcc" name="email"  required="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="pass" class="form_text">Password: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="password" class="form-control" id="addPasslAcc" name="password"  required="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="role" class="form_text">Phân quyền: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" id="role" name="role"  required="">
                                                                        <option value="1">Tài khoản admin</option>
                                                                        <option value="2">Tài khoản giảng viên</option>
                                                                        <option value="3">Tài khoản học viên</option>
                                                                    </select>
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
        </div>
    </section>  
</section>
{{-- Tìm kiếm script --}}
<script>
    $(document).ready(function(){
        fetch_account_data();
        function fetch_account_data(query = '')
        {
            $.ajax({
                url:"{{ route('livesearchAccount.searchAccount') }}",
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
        fetch_account_data(query);
    });
    });
</script>
{{-- Tìm kiếm script --}}
<!--main content end-->
@endsection