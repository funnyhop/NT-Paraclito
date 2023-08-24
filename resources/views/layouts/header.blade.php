<div class="container">
    <div class="row">
        <div class="col-3 hder">
            <div class="row">
                <div class="col-12 d-flex" style="padding:0px; height: 50px">
                    <img class="rounded float-start"
                        src="{{ asset('storage/images/logo.png') }}"
                        height="45"
                        width="45"
                        padding: 0px
                        alt="">
                    <a class="fs-6 text-light fw-bold d-flex py-3" href="">NhaThuoc PARACLITO</a>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row hder">
                <div class="col-5">
                    {{-- <div class="input-group pt-2">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                        <span class="input-group-text" id="basic-addon2">
                            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                        </span>
                    </div> --}}
                </div>
                <div class="col-3 pt-3">
                    <input class="float-end" type="date" style="background-color: #e6eff5; border-radius:3px"id="date">
                </div>
                <div class="col-4">
                    <div class="row py-2">
                        <div class="col-2 fs-3 pt-1 bg-waring">
                            <i class="fa-solid fa-bag-shopping fa-shake" style="color: #e6eff5;"></i>
                        </div>
                        <div class="col-7 text-white">
                            <p class="fw-normal">Xin chào!</p>
                            <a class="fw-bold" href="">Đăng nhập</a>
                        </div>
                        <div class="col-3 fs-3 pt-1 ps-4">
                            <i class="fa-solid fa-user-nurse" data-bs-toggle="dropdown" style="color: #e6eff5;"></i>
                            <ul class="dropdown-menu bg-gray-100">
                                <li class="dropdown-item">Đăng ký</li>
                                <li class="dropdown-item">Đăng xuất</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>