@extends('layouts.app')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>

@section('content')
  <x-tailwind.header/>

  <div>
      <!-- component -->

<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                <i class="mdi mdi-credit-card-outline text-3xl"></i>
            </div>
        </div>
        <form action="{{ url('/checkout/payment') }}" method="POST">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Delivery Address</label>
          <div class="mt-1 rounded-md shadow-sm">
            <input type="text" name="delivery_address" id="sku" value="{{ old('delivery_address') }}"
              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
              placeholder="Delivery address">
          </div>
          @error('delivery_address')
            <span class="block text-sm font-medium text-red-500" role="alert">
              {{ $message }}
            </span>
          @enderror
        </div>
        <div class="mt-5 mb-2">
          <label for="name" class="block text-sm font-medium text-gray-700">Secure Payment Info</label>
        </div>
        <div class="paymentSelection mb-3 flex -mx-2" id="paymentSelection">
            <div class="px-2">
                <label for="type1" class="text-center flex items-center cursor-pointer ">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="paymentType" value="cash" checked>
                    <p class="h-8 ml-3"> Cash on Delivery </p>
                </label>
            </div>
            <div class="px-2">
                <label for="type2" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="paymentType" value="card">
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
        </div>
        <div class="cardSelection" style="visibility: hidden; display : none" id="cardSelection">
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                <div>
                    <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                <div>
                    <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
                </div>
            </div>
            <div class="mb-3 -mx-2 flex items-end">
                <div class="px-2 w-1/2">
                    <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                    <div>
                        <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            <option value="01">01 - January</option>
                            <option value="02">02 - February</option>
                            <option value="03">03 - March</option>
                            <option value="04">04 - April</option>
                            <option value="05">05 - May</option>
                            <option value="06">06 - June</option>
                            <option value="07">07 - July</option>
                            <option value="08">08 - August</option>
                            <option value="09">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                        </select>
                    </div>
                </div>
                <div class="px-2 w-1/2">
                    <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
            </div>
            <div class="mb-10">
                <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                <div>
                    <input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
                </div>
            </div>
        </div>

                @csrf
                <input hidden name="totalAmount" value={{ $totalAmount }} />
                <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
            </form>

    </div>
</div>

</div>

<script type="text/javascript" >
    $(document).ready(function() {

        $(document).on('change', '.paymentSelection', function(){
            var current_selection = $('input[name="paymentType"]:checked').val();

            if (current_selection == "card") {

                document.getElementById('cardSelection').style.visibility = 'visible';
                document.getElementById('cardSelection').style.display = 'block';

            } else {
                document.getElementById('cardSelection').style.visibility = 'hidden';
                document.getElementById('cardSelection').style.display = 'none';

            }
        })

    });
</script>

@endsection

