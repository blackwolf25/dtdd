<?php 
    $user = Auth::guard('customer')->user();
 ?>
<style>
    * {box-sizing: border-box;}

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .search-container{
        margin-top:30px;
    }
    .site-branding-area .search-container input{
        width: 290px;
    }
    .site-branding-area .search-container button {
      padding: 9px;
      margin-top: 8px;
      margin-right: 16px;
      background: #009a82;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }
    .search-container button:hover {
      background: #ccc;
    }
</style>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Trả góp 0%</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> So sánh sản phẩm</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> Tin tức</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Tuyển dụng</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Trung tâm bảo hành</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline" style="margin-top: 8px;">              
                                @if(!Auth::guard('customer')->check())
                                    <a class="dropdown-toggle" href="{{route('customer.get.login')}}"><span class="key">Đăng nhập</span></a>
                                @else
                                    <a class="dropdown-toggle" href="{{route('customer.profile.index')}}">Xin chào: <span class="key">{{$user->name}}</span></a>&nbsp;&nbsp;&nbsp;
                                    <a class="dropdown-toggle" href="{{route('customer.logout')}}">Đăng xuất <span class="key"></span></a>
                                @endif

                           <!--  <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Đăng nhập</span></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo">
                        <h1><a href="./"><img src="{{asset('frontend/img/logo-text.png')}}"></a></h1>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search-container">
                        <form action="/action_page.php">
                          <input type="text" placeholder="Nhập từ khóa tìm kiếm.." name="search">
                          <button type="submit">Tìm kiếm</button>
                      </form>
                  </div>
                        </div>
                    </div>
                    
                </div>
                @if(Auth::guard('customer')->check())
                <div class="col-sm-3">
                    <div class="shopping-item">
                        <a href="{{route('customer.cart')}}">Cart<i class="fa fa-shopping-cart"></i> <span class="product-count">@if(Session::has('cart')){{Session('cart')->totalQuantity}}@else 0 @endif</span></a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('customer.index')}}">Trang chủ</a></li>
                        <li><a href="{{route('customer.category','iphone')}}">iPhone</a></li>
                        <li><a href="{{route('customer.category','samsung')}}">Samsung</a></li>
                        <li><a href="{{route('customer.category','xiaomi')}}">Xiaomi</a></li>
                        <li><a href="{{route('customer.category','oppo')}}">Oppo</a></li>
                        <li><a href="{{route('customer.category','nokia')}}">Nokia</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->