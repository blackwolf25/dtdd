@extends('customer.layout.app')
@section('title','Sản phẩm')
@section('content')
	<div class="single-product-area">
        <div class="container">
        	<div class="product-breadcroumb">
        		<a href="{{route('customer.index')}}">Trang chủ</a>
        		<a href="{{route('customer.category',$product->category->slug)}}">{{$product->category->name}}</a>
        		<a href="#">{{$product->name}}</a>
        	</div>
            <h1>Điện thoại <strong>{{$product->name}}</strong></h1>
            <div class="row">
            	<div class="col-md-6">
            		<div class="img" style="padding:10px; border: 1px solid #e5e5e5;">
            			<img src="{{asset('storage/'.$product->thumbnail)}}" alt="">
            		</div>
            	</div>
            	<style>
            		.thongso>p{
            			line-height: 1.4;
            			display: inline-block;
            			clear: both;
            			width: 100%;
            			padding: 6px 0;
            			border-bottom: 1px solid #efefef;
            			color: #333;
            		}
            		.thongso>p>label{
            			float: left;
            			width: 160px;
            			display: block;
            			color: #888;
            		}
            		.thongso>p>span{
            			display: block;
            			float: right;
            			width: 320px
            		}
            		.img>img{
            			cursor: pointer;
            			transition: all .2s ease-in-out;
            		}
            		.img:hover img{
            			transform: scale(1.1);
            		}
            		.buy-button .btn-row>.dathang{
                        padding: 10px 55px;
            			color: #fff;
            			border: 1px solid #5c0101;
            			text-shadow: 0 0 1px #333;
            			background: #f50808;
            			background-image: linear-gradient(to bottom,#f50808,#9e5218);
            		}
                    .buy-button .btn-row>a .giohang{
                        color: #fff;
                        border: 1px solid #5c0101;
                        text-shadow: 0 0 1px #333;
                        background: #f50808;
                        background: linear-gradient(to bottom,rgba(255,93,177,1) 0%,rgba(239,1,124,1) 100%) !important;
                    }
            		.btn-row button{
            			padding: 10px;
            		}
            		.btn-row button>span{
            			display: block;
            		}
            	</style>
            	<div class="col-md-6">
            		<div class="thongso">
            			<p><span style="float: none;font-size: 30px;border: none;">Giá: <strong style="font-size: 40px;color: #e10c00;">{{number_format($product->price)}} đ</strong></span></p>
            			<h3>Thông số kĩ thuật</h3>
            			<p><label>Hãng sản xuất:</label><span>{{$product->category->name}}</span></p>
            			<p><label>Kích thước màn hình:</label><span>{{$product->screen_size}}"</span></p>
            			<p><label>Hệ điều hành:</label><span>{{$product->operating_system}}</span></p>
            			<p><label>Chip xử lý (CPU):</label><span>{{$product->cpu}}</span></p>
            			<p><label>RAM:</label><span>{{$product->ram}} GB</span> </p>
            			<p><label>Máy ảnh:</label><span>{{$product->camera}} MP</span></p>
            			<p><label>Bộ nhớ trong:</label><span>{{$product->memories}}GB</span></p>
            			<p><label>Dung lượng pin (mAh):</label><span>{{$product->pin}} mAh</span></p>
            		</div>
            	</div>
            </div>
            <div class="buy-button" style="margin-top: 30px">
            	<div class="btn-row" style="text-align: center;">
                    @if(!Auth::guard('customer')->check())
                    <div class="alert alert-danger">
                        Bạn phải đăng nhập để tiến hành đặt hàng.
                    </div>
                    @else
            		<button class="button red dathang" id="btnModal" data-price="{{$product->price}}" data-toggle="modal" data-target="#exampleModal"><strong style="font-size: 20px">ĐẶT HÀNG </strong></button>
                    <a style="background: none" href="{{route('customer.cart.add',$product->product_id)}}" class="add_to_cart_button" data-id="{{$product->product_id}}">
                    <button class="button red giohang" id="btnModal" data-price="{{$product->price}}" data-toggle="modal" ><strong style="font-size: 20px">Thêm vào giỏ hàng </strong></button>
                    </a>
                    @endif
            	</div>
                @if(session('alert'))

                <div class="alert alert-danger" style="margin-top: 40px;">
                    <strong>OK! </strong> {{ session('alert')}}
                    <p><a href="{{route('customer.index')}}">Tiếp tục mua hàng?</a><a href="{{route('customer.index')}}">&nbsp;&nbsp;Quản lý đơn hàng</a></p>
                </div>


                @endif
            	<!-- Modal -->
            	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            		<div class="modal-dialog" role="document">
            			<div class="modal-content">
            				<div class="modal-header">
            					<h3 class="modal-title" style="font-weight: 300;color: darkslategrey;line-height: 1.4;" id="exampleModalLabel">Đặt hàng điện thoại {{$product->name}}</h3>
            					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            						<span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<div class="modal-body">
            					<div class="row">
            						<div class="col-md-6">
            							<div class="image">
            								<img src="{{asset('storage/'.$product->thumbnail)}}" alt="">
            							</div>
            							<div class="info" style="text-align: center;">
            								<p><span>{{$product->name}}</span></p>
            								<p><span style="color: red">{{number_format($product->price)}} đ</span></p>
            								<div class="total">
            									<style>
            										.total ul li{
            											display: inline-block;	
            										}
            										.total input{
            											padding: 6px 12px;
            											border: 1px solid #ddd;
            											color: #337ab7;
            											background-color: transparent;
            									</style>
            									<ul>
            										<span>Số lượng</span>
            										<li><input type="button" value="-" id="down"></li>
            										<li><p id="total" style="padding: 6px 12px;
            											border: 1px solid #ddd;">1</p></li>
            										<li><input type="button" value="+" id="up"></li>
            									</ul>
            									<p>Tổng tiền: <span id="price">{{number_format($product->price)}}</span> đ</p>
            								</div>
            							</div>
            						</div>
            						<div class="col-md-6">
            							<form action="{{route('customer.product.order')}}" method="post">
                                            {{ csrf_field()}}
                                            <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                            <input type="hidden" name="product_detail" value="{{$product}}">
                                            <input type="hidden" id="totalQty" name="totalQty" value="">
                                            <input type="hidden" id="totalPrice" name="totalPrice" value="">
            								<input type="submit" class="btn btn-primary" value="Đặt hàng">
            							</form>
            						</div>
            					</div>
												
            				</div>
            			</div>
            		</div>
            	</div>
            </div>

            <div class="latest-product" style="margin-top:10px; border-top: 0.5px solid #ccc;">
                    <h2 class="section-title" style="text-align: left;padding-top: 10px"><a style="color:#00483e" href="#">Các sản phẩm có liên quan</a></h2>
                    <div class="product-carousel" style="padding-top: 10px">
                        @foreach($list_product as $product)
                        <div class="single-product" style="text-align: center;">
                            <div class="product-f-image">
                                <img src="{{asset('storage/'.$product->thumbnail)}}" alt="">
                                <div class="product-hover">
                                    <a href="{{$product['product_id']}}" id="cart" data-id="{{$product['product_id']}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Giỏ hàng 
                                        {{csrf_field()}}
                                    </a>
                                    
                                    <a href="{{route('customer.product',$product['slug'])}}" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                </div>
                            </div>
                            
                            <h2><a href="{{route('customer.product',$product['product_id'])}}">{{$product['name']}}</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins style="color:red;">{{number_format($product['price'])}} <span style="text-decoration: underline;">đ</span></ins> <del></del>
                            </div> 
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
   </div>
   
   
@endsection('content')
@section('script')
<script>
    $(document).ready(function(){
        var sl = parseInt($('#total').html());
        $('#btnModal').click(function(){
            var price = parseInt($(this).data('price'));
            parseInt($('#totalPrice').val(sl*price));
            parseInt($('#totalQty').val(sl));
            // giảm số lượng
            $('#down').click(function(){    
                if(sl>1){
                    sl--;
                    parseInt($('#price').html((sl*price).toLocaleString('en-US')));
                    parseInt($('#total').html(sl));
                    parseInt($('#totalPrice').val(sl*price));
                    parseInt($('#totalQty').val(sl));
                }           
            });
            // tăng số luọng
            $('#up').click(function(){  
                sl++;
                parseInt($('#price').html((sl*price).toLocaleString('en-US')));
                parseInt($('#total').html(sl));
                parseInt($('#totalPrice').val(sl*price));
                parseInt($('#totalQty').val(sl));
            });
        });
    });
   </script>
@endsection('script')

@section('script2')
    <script>
        $(document).ready(function(){

            $('.add_to_cart_button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var url = "{{route('customer.cart.add')}}";
                var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: url,
                        method: "post",
                        data: {id:id, _token:_token},
                        success: function(data){
                            console.log(data);
                            $('.product-count').html(data);
                            
                        },
                    });
        
            });
            
        });
    </script>
@endsection('script2')