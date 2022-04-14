@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Dashboard">
  @section('admincontent')
  <div class="p-6">
    <div class="flex justify-between pb-5">
      <p class="self-center">Welcome back, Admin!</p>
    </div>
  </div>
  @endsection
</x-tailwind.dashboard>
@endsection
