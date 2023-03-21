 <div class="cart-main-area mb-30">
     <div class="container">
         @if (Session::get('cartinfo') != null)

             <div class="row">
                 <div class="col-lg-12">
                     <form action="{{ url('update-cart') }}" method="post" id="update_cart_form">
                         @csrf
                         <div class="table-content table-responsive mb-15 border-1">
                             <table>
                                 <thead>
                                     <tr>
                                         <th class="product-thumbnail">Image</th>
                                         <th class="product-name">Product</th>
                                         <th class="product-price">Price</th>
                                         <th class="product-quantity">Quantity</th>
                                         <th class="product-subtotal">Total</th>
                                         <th class="product-remove">Remove</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                         $sub_total = 0;
                                         $total_products = 0;
                                     @endphp
                                     @foreach (Session::get('cartinfo') as $item)
                                         <tr>
                                             <td class="product-thumbnail"><a href="#">
                                                     @if ($item['product']->image != null)
                                                         <img src="{{ asset('/product-group-images') }}/{{ $item['product']->image }}"
                                                             height="100px" alt="man"
                                                             style="max-height: 5rem !important ; width: auto" />
                                                     @else
                                                         <img src="{{ asset('assets/images/no-image.png') }}"
                                                             alt="{{ $item['product']->seo_title }}" class="primary"
                                                             style="max-height: 5rem !important ; width: auto">
                                                     @endif

                                                 </a></td>
                                             <td class="product-name"><a href="#">{{ $item['product']->name }}</a>
                                             </td>
                                             <td class="product-price"><span
                                                     class="">{{ $item['product']->group->price }}</span></td>
                                             <td class="product-quantity">
                                                <input type="number"
                                                     name="qty+{{ $item['product']->id }}" value="{{ $item['qty'] }}"
                                                     min="1">
                                                    </td>
                                             <td class="product-subtotal">{{ $item['qty'] * $item['product']->group->price }}
                                             </td>
                                             <td class="product-remove"><a
                                                     href="{{ url('remove-from-cart') }}/{{ $item['product']->id }}"><i
                                                         class="fa fa-times"></i></a></td>
                                             @php
                                                 $sub_total += $item['qty'] * $item['product']->group->price;
                                                 $total_products += $item['qty'];

                                             @endphp
                                         </tr>
                                     @endforeach
                                     <tr class="product-price">
                                         <td colspan="4" class="text-right amount"><strong>Total</strong></td>
                                         <td colspan="2" class="amount"><strong>{{ $sub_total }}</strong></td>
                                     </tr>

                                 </tbody>
                             </table>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-8 col-md-6 col-12">
                     <div class="buttons-cart mb-30">
                         <ul>
                             <li><a href="#" id="update_cart" class="btn btn-primary">Update Cart</a></li>
                             <li><a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 col-12 text-right">
                     @if (Session::has('online_customer'))
                         <a href="#checkout" class="btn btn-primary payment_modal" url="payment-modal">Proceed to Checkout</a>
                     @endif
                 </div>
             </div>
         @else
             <p>Your Cart Is Empty</p>
             <a href="{{ url('/') }}" class="btn btn-sm btn-primary">Continue to Shopping</a>
         @endif

     </div>
 </div>
