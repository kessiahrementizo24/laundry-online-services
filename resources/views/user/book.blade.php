@extends('user.layout')

@section('content')

<!-- modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/user/book" method="POST">
        @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Checkout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body checkout  text-white">
          <div class="payment-detail">
            <div class="details-body">
              Detergent :
            </div>
            <div class="details-body" id="detergent">
              
            </div>
            <input type="hidden" name="detergent_id" id="form_detergent_id">
            
          </div>
          <div class="payment-detail text-white">
            <div class="details-body">
              Fabric Conditioner : 
            </div>
            <div class="details-body" id="fabric">
              
            </div>
            <input type="hidden" name="fabric_id" id="form_fabric_id">
            
          </div>
          <div class="payment-detail text-white">
            <div class="details-body" id="weightInModal">
               1 kilo
            </div>
            <input type="hidden" name="weight" id="form_weight">
            
            <div class="details-body" id="sub_total">
              250
            </div>
          </div>
        <hr>
          <div class="payment">
           <label for="payment">Payment Method</label>
              <select id="payment" name="payment_option" id="form_payment_option">
                <option value="#"></option>
                <option value="cash on delivery">Cash on Delivery</option>
                <option value="gcash">GCash</option>
              </select>
          </div>
            <hr>
            <h5>Payment Details</h5>
            <div class="payment-detail text-white">
              <div class="details-body">
                 Sub-total:
              </div>
              <div class="details-body text-white" id="sub_total2">
                250
              </div>
            </div>
            <div class="payment-detail">
              <div class="details-body text-white">
                 Delivery Fee:
              </div>
              <div class="details-body text-white">
                50
              </div>
            </div>
            <hr>
            <p class="text-white">Notice:
              Our detergent and fabric conditioner are intended for laundry use only.
              Products from various manufacturers may vary.</p>
             <div class="totalpayment">
              <div class="payment-total">
                Total Amount:
            </div>
            <div class="payment-total" id="total_amount">
             300
          </div>
          <input type="hidden" id="form_total_amount" name="total_amount">
             </div>
        </div>
        <div class="modal-footer bg-dark p-1">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </div>
</form>
</div>
  <section class="products">
          <div class="py-3 py-md-5 bg-light">
             <div class="container basta">
                  <div class="row">
                      <div class="col-md-12">
                          <h4 class="mb-2" style="font-size: 20px">Available Detergent:</h4>
                        @error('detergent_id')
                        <div class="alert alert-danger" role="alert">
                          Please select detergent.
                          </div>
                        @enderror
                          @foreach($detergent as $data)
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="category-card">
                                  <div class="category-card-img">
                                    <img src="{{asset('/image/detergent/'.$data->image)}}" class="w-100">
                                  </div>
                                  <div class="category-card-body">
                                     <h5>{{ $data->detergent_name ?? '' }}  </h5>
                                  </div>
                                  <button id="addDetergentBtn{{$data->id}}" onclick="addDetergent({{$data}})" class="btn btn-primary w-100">Select</button>
                        </div>
                          @endforeach 
                      </div>
                  </div>
              </div>
          </div>
          <div class="py-3 py-md-5 bg-light">
            <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <h4 class="mb-2" style="font-size: 20px">Available FabCon:</h4>
                         @error('fabric_id')
                            <div class="alert alert-danger" role="alert">
                                Please select fabric conditioner.
                              </div>
                        @enderror
                         @foreach($fabric as $data)
                     </div>
                     <div class="col-6 col-md-3">
                         <div class="category-card">
                                 <div class="category-card-img">
                                   <img src="{{asset('image/fabric/'.$data->image)}}" class="w-100">
                                 </div>
                                 <div class="category-card-body">
                                    <h5> {{ $data->fabric_name ?? '' }}  </h5>
                                 </div>
                                 <button id="addFabricBtn{{$data->id}}" class="btn btn-primary w-100" onclick="addFabric({{$data}})">Select</button>
                       </div>
                         @endforeach 
                     </div>
                 </div>
             </div>
                <h2 class="text-center" style="font-size: 25px">Laundry Weight</h2>
                <center><input type="number" class="text-center" id="input_weight" placeholder="Input kilo"></center>
                <br>
                 @error('weight')
                 <div class="alert alert-danger text-center" role="alert">
                    Required weight field.
                  </div>
                @enderror
                  <button type="button" id="bbtn" onclick="setWeightInModal()" data-bs-toggle="modal" data-bs-target="#completeModal">
            Continue to Checkout
            </button>
            </div>
    
  </section>

           

    </div>
  </div>

  @endsection

  <script>

    let previousFabric = 0
    let previousDetergent = 0
    function addFabric(fabric) {
        document.getElementById("addFabricBtn"+fabric.id).disabled = true
        document.getElementById("addFabricBtn"+fabric.id).innerHTML = "Selected"
        if(previousFabric != 0) {
            document.getElementById("addFabricBtn"+previousFabric).disabled = false
            document.getElementById("addFabricBtn"+previousFabric).innerHTML = "Select"
        }
        document.getElementById('form_fabric_id').value = fabric.id
        document.getElementById('fabric').innerText = fabric.fabric_name


        previousFabric = fabric.id
    }

    function addDetergent(detergent) {
        document.getElementById("addDetergentBtn"+detergent.id).disabled = true
        document.getElementById("addDetergentBtn"+detergent.id).innerHTML = "Selected"
        if(previousDetergent != 0) {
            document.getElementById("addDetergentBtn"+previousDetergent).disabled = false
            document.getElementById("addDetergentBtn"+previousDetergent).innerHTML = "Select"
        }
        document.getElementById('detergent').innerText = detergent.detergent_name
        document.getElementById('form_detergent_id').value = detergent.id
        previousDetergent = detergent.id
    }

    function setWeightInModal() {
    var weightInput = parseFloat(document.getElementById('input_weight').value);
    var minPricePerKilo = 250;
    var subtotal = Math.max(weightInput * minPricePerKilo, minPricePerKilo);

    if (weightInput > 1) {
        subtotal += 0 * (weightInput - 1);
    }

    document.getElementById('sub_total').innerHTML = subtotal;
    document.getElementById('sub_total2').innerHTML = subtotal;
    document.getElementById('total_amount').innerText = (subtotal) + 50;
    document.getElementById('form_total_amount').value = (subtotal) + 50;
    document.getElementById('form_weight').value = weightInput;
    document.getElementById('weightInModal').innerHTML = weightInput + ' kg';
}
  </script>