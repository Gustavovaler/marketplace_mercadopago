@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @for ($i = 0; $i < 5; $i++)
           <div class="col-md-3">
            <Producto></Producto>
        </div> 
        @endfor
        
    </div>  
    
</div>
@endsection
