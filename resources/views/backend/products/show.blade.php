@extends('backend.master')
@section('title','Xem chi tiết sản phẩm')

@section('content')
  <!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
				Sản phẩm
        {{-- <small class="text-secondary">Thống kê tổng quan</small> --}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none "><i class="fas fa-tachometer-alt mr-1"></i>
							Sản phẩm
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Xem chi tiết sản phẩm </span>
					</li>
        </ol>
      </nav>
    </div>
  </div>
  
  <H1>Thông tin chi tiết của sản phẩm {{$item->name}}</H1>
  
@endsection