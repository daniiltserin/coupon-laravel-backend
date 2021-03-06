@extends('layouts.app')

@section("title")
CouponLand
@endsection

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-3">
      @include("layouts.sidebar")
    </div>
    <div class="col-md-9">
      {{-- Coupon categories --}}
      @if(isset($category_name))
      <h3>{{ $category_name }}</h3>
      @endif
      {{-- end coupon category name --}}
      <div class="gap gap-small"></div>
      <div class="row row-wrap">
        @foreach($products as $product)
          <div class="col-md-4">
            <div class="product-thumb"  @if ($product->is_border) style="border: 5px solid #FEC52E; @endif ">
                @if($product->is_hit != 0)
                  <div class="hit">
                    <div class="hit-text">
                      Хит
                    </div>
                  </div>
                @endif
                {{-- <div class="favorites-link ">
                  <a href="{{ route(H::favoritesToggle($product->id), ['id' => $product->id]) }}" class="favorites @if(H::checkFavorites($product->id)) active @endif">
                    <i class="fa fa-heart"></i>
                  </a>
                </div> --}}
              <header class="product-header">
                <img style="height: 260px" src="{{asset($product->image)}}" alt="{{$product->title}}" title="{{$product->title}}">
                <div class="product-quick-view">
                  <a class="fa fa-eye" href="c/{{$product->id}}" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="top" title="Посмотреть"></a>
                </div>
                {{-- <div class="product-secondary-image"><img style="height: 260px" src="/public/storage/{{$product->carousel_1}}" alt="{{$product->title}}" title="{{$product->title}}"></div> --}}
              </header>
              <div class="product-inner">
                {{-- <ul class="icon-group icon-list-rating icon-list-non-rated" title="not rated yet">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul> --}}
                <h5 class="product-title">{{$product->title}}</h5>
                <p class="product-desciption">{!!$product->short_description!!}</p>
                <div class="product-meta">
                  {{-- <ul class="product-price-list"> --}}
                    {{-- <li><span class="product-price">500тг</span></li>
                    <li><span class="product-old-price">1000тг</span></li> --}}
                    {{-- <li><span class="product-save">Скидка {{$product->profit_all}}%</span></li> --}}
                    {{-- <li> --}}
                      {{-- <span id="countdown{{ $product->id }}"></span> --}}
                    {{-- </li> --}}
                  {{-- </ul> --}}
                  <ul class="product-actions-list">
                    <li><a class="btn btn-sm" href="{{route("shop.to-cart", ["id" => $product->id])}}"><i class="fa fa-shopping-cart"></i> В корзину</a></li>
                    <li><button class="btn btn-sm " data-target="#email" data-toggle="modal">Быстрый заказ</button></li>
                    {{-- <li><a class="btn btn-sm"><i class="fa fa-bars"></i> Больше</a></li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>

        <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <form action="{{url('/shop/mailorder/new/' . $product->id)}}" method="GET">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Быстрый заказ</h4>
              </div>
            <div class="modal-body">
                
              <div class="form-group">
                <label for="recipient-name" class="control-label">Email отправителя:</label>
                <input type="email" name="email" class="form-control" id="recipient-name">
              </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Купить сейчас</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
{{ $products->links() }}

@endsection

@section("scripts")
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
{{-- <script src="{{asset("js/jquery.countdown.min.js")}}">
</script>
  <script>
   window.onload = function() {
      @foreach($products as $product)
        $("#countdown{{$product->id}}").countdown("{{\Carbon\Carbon::parse($product->available_until)->format("Y/m/d")}}", function(event) {
            $(this).text(event.strftime("%D дней %H:%M:%S"));
        })
      @endforeach
    }
  </script> --}}

@endsection 
