@extends('layouts.app')

@section('content')

<div class="flex justify-around w-full">
  <form action="">@csrf</form>
  <div class="">
    <div class="bg-white p-12 rounded-xl w-full">
      <div class="text-2xl font-bold mb-4">Add Sale</div>
      <div class="flex justify-between  w-full ">
        <div class="flex items-center  justify-center  w-full">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="product" class="w-full">Product</label>
          </div>
          <div class="flex items-center  justify-center  w-full">
            <select name="product" id="product" class="w-full border border-gray-300 rounded-md p-2">
              <option value="" selected>select a product</option>
              @foreach ($products as $product)
                <option value="{{$product->uuid}}|{{$product->price}}|{{ $product->name}}">{{ $product->name }} ${{$product->price}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="flex items-center  justify-between  w-full  mt-4">
        <div class="flex items-center  justify-center  w-full ">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="price" class="w-full">Price</label>
          </div>
          <div class="flex items-center  justify-center  w-full ">
            <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded-md p-2 " disabled>
          </div>
        </div>
      </div>

      <div class="flex   justify-between  w-full  mt-4">
        <div class="flex items-center  justify-center  w-full ">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="quantity" class="w-full">Quantity</label>
          </div>
          <div class="flex items-center  justify-center  w-full ">
            <input type="number" name="quantity" id="quantity" class="w-full border border-gray-300 rounded-md p-2">
          </div>
        </div>
      </div>
      
      <!-- buttom to add product-->
      <div class="flex w-full  mt-4">
          <div class="flex  justify-end  w-full ">
            <button id="add-product" class="bg-blue-500 text-white rounded-md p-2">Add Product</button>
          </div>
      </div>

    </div>

    <div class="bg-white p-12 mt-4 rounded-xl w-full">
      <div class="flex items-center  justify-between  w-full mt-4">
        <div class="flex items-center  justify-center  w-full ">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="date" class="w-full">Due Date</label>
          </div>
          <div class="flex items-center  justify-center  w-full ">
            <input type="date" name="date" id="due-date" class="w-full border border-gray-300 rounded-md p-2" required>
          </div>
        </div>
      </div>

      <div class="flex items-center  justify-between  w-full mt-4">
        <div class="flex items-center  justify-center  w-full ">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="date" class="w-full">Method Payment</label>
          </div>
          <div class="flex items-center  justify-center  w-full">
            <select name="method_payment" id="method-payment" class="w-full border border-gray-300 rounded-md p-2">
              <option value="" selected>select a method payment</option>
              <option value="cash">Cash</option>
              <option value="credit_card">Credit</option>
              <option value="debit_card">Debit</option>
            </select>
          </div>
        </div>
      </div>

      <div class="flex items-center  justify-between  w-full mt-4">
        <div class="flex items-center  justify-center  w-full ">
          <div class="flex items-center  justify-center  w-1/2 ">
            <label for="date" class="w-full">Method Payment</label>
          </div>
          <div class="flex items-center  justify-center  w-full">
            <select name="quantity_installments" id="quantity-installments" class="w-full border border-gray-300 rounded-md p-2">
              <option value="" selected>select a quantity installments</option>
              <option value="1">1x</option>
              <option value="2">2x</option>
              <option value="3">3x</option>
              <option value="4">4x</option>
              <option value="5">5x</option>
              <option value="6">6x</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- method payment -->



  </div>

  <!--  -->

  <div class="w-1/2">
      <div class="relative w-full bg-white p-4 rounded-xl w-full h-full">
        <div class="overflow-x-auto relative h-[34rem] border-solid border rounded-lg  w-full">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table-products">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Total
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-products">

                </tbody>
            </table>
        </div>
        <div class="absolute bottom-4 right-4 border-solid border rounded-lg">
            <button id="btn-send-payload" class="bg-blue-500 text-white rounded-md p-2">Send Sale</button>
        </div>
      </div>

  </div>
</div>

<script>
const inputProduct = document.getElementById('product');
const inputPrice = document.getElementById('price');
const inputQuantity = document.getElementById('quantity');
const btnAddProduct = document.getElementById('add-product');
const inputDueDate = document.getElementById('due-date');
const inputMethodPayment = document.getElementById('method-payment');
const inputQuantityInstallments = document.getElementById('quantity-installments');
const btnSendPayload = document.getElementById('btn-send-payload');

const payload = {
  'method_payment': '',
  'products': [],
  'due_date': '',
  'quantity_installments': 0,
};

const product = {
  name: '',
  uuid: '',
  price: 0,
  quantity: 0,
};

// Events

inputProduct.addEventListener('change', function() {
  const value            = this.value.split('|');
  const uuid             = value[0];
  const priceProduct     = value[1];
        inputPrice.value = priceProduct;
        product.uuid    = uuid;
        product.price   = priceProduct;
        product.name    = value[2];

}, inputPrice, product)

inputQuantity.addEventListener('keyup', function() {
  product.quantity = this.value;
}, product);

btnAddProduct.addEventListener('click', function() {

  if (inputQuantity.value == 0 || inputQuantity.value == '') {
    alert('Add quantity');
    return;
  }

  if(product.uuid == '') {
    alert('Select product');
    return;
  }
    
  addProduct(product);

}, product, inputQuantity);

inputDueDate.addEventListener('change', function() {
  payload.due_date = this.value;
}, payload);

inputMethodPayment.addEventListener('change', function() {
  payload.method_payment = this.value;
}, payload);

inputQuantityInstallments.addEventListener('change', function() {
  payload.quantity_installments = this.value;
}, payload);

btnSendPayload.addEventListener('click', function() {
  if (payload.products.length == 0) {
    alert('Add products');
    return;
  }

  if (payload.due_date == '') {
    alert('Add due date');
    return;
  }

  if (payload.method_payment == '') {
    alert('Add method payment');
    return;
  }

  if (payload.quantity_installments == 0) {
    alert('Add quantity installments');
    return;
  }

  sendPayload(payload);
}, payload);



const addProduct = (product) => {

  const tableProducts = document.getElementById('tbody-products');
  const total = product.price * product.quantity;
  tableProducts.innerHTML += `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">`
    + `<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">${product.name}</th>`
    + `<td class="py-4 px-6">${product.price}</td>`
    + `<td class="py-4 px-6">${product.quantity}</td>`
    + `<td class="py-4 px-6">${total}</td>`
    + `<td class="py-4 px-6"><i class="fas fa-trash text-red-500" data-uuid="${product.uuid}" onClick="deleteProduct(this)"></i></td>`

  payload.products.push(product);
}

const deleteProduct = (element) => {
  const uuid = element.getAttribute('data-uuid');
  const index = payload.products.findIndex(product => product.uuid == uuid);
  payload.products.splice(index, 1);
  element.parentElement.parentElement.remove();
  console.log(payload);
}

const sendPayload = (payload) => {
  const token = document.querySelector('input[name="_token"]').value;
  fetch('/sale', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(payload)
  })
  .then(response => response.json())
  .then(data => {
    window.location.href = `/sale`;
  })
  .catch((error) => {
    console.error('Error:', error);
  });

}

</script>
@endsection

