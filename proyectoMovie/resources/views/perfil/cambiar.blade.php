@php
  require base_path('vendor/autoload.php');

  MercadoPago\SDK::setAccessToken(
  config('services.mercadopago.token'));

  //crea un objeto de preferencia
  $pref = new MercadoPago\Preference();
  foreach($prod as $order){
    $item = new MercadoPago\Item();
    $item->title = $order->periodo;
    $item->quantity = 1;
    $item->unit_price = $order->precio;

    $venta[] = $item;
  }
  $pref->items = $venta;

  $pref->back_urls = array(
    "success"=>"http://localhost:8000/actualizar-plan/" . $prod[0]->id,
    "failure"=>"http://localhost:8000/#suscripciones"
  );

  $pref->auto_return = "approved";
  $pref->binary_mode = true;


  $pref->save();


@endphp
@extends('template.template')
@section('nav')
	 @include('includes.nav')
@endsection
@section('main')
<section>  
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="text-white border rounded p-3">          
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{ $prod[0]->nombre }}</h5>
            	<hr>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                
              </div>
              <div class="d-flex justify-content-between">
              	<span>{{ $prod[0]->periodo}}</span>
             
              </div>              
              <ul>
              	@foreach($detalle as $details)
               	<li>{{$details}}</li>
               	@endforeach	
              </ul>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Total</span><span>{{ $prod[0]->precio}}</span>              
            </div>
            <div class="d-flex">
            @auth()
              @if(Auth::user()->rol_id==2)
              <div class="btn btn-sm cho-container"></div>
              @endif
            @else
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endauth              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--MERCADOPAGO-->
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
    //SDK MercadoPago.js
    const mp = new MercadoPago('{{config("services.mercadopago.key")}}',{
      local: 'es-AR'
    });

    mp.checkout({
      preference:{
        id: '{{$pref->id}}'
      },
      render:{
        container:'.cho-container',
        label:'Pagar'
      },      
    })

  </script>
@endsection