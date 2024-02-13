@extends('front_layout.master')
@section('content')
<?php 
 $usStates = array(
    'Alabama' => 'AL',
    'Alaska' => 'AK',
    'Arizona' => 'AZ',
    'Arkansas' => 'AR',
    'California' => 'CA',
    'Colorado' => 'CO',
    'Connecticut' => 'CT',
    'Delaware' => 'DE',
    'Florida' => 'FL',
    'Georgia' => 'GA',
    'Hawaii' => 'HI',
    'Idaho' => 'ID',
    'Illinois' => 'IL',
    'Indiana' => 'IN',
    'Iowa' => 'IA',
    'Kansas' => 'KS',
    'Kentucky' => 'KY',
    'Louisiana' => 'LA',
    'Maine' => 'ME',
    'Maryland' => 'MD',
    'Massachusetts' => 'MA',
    'Michigan' => 'MI',
    'Minnesota' => 'MN',
    'Mississippi' => 'MS',
    'Missouri' => 'MO',
    'Montana' => 'MT',
    'Nebraska' => 'NE',
    'Nevada' => 'NV',
    'New Hampshire' => 'NH',
    'New Jersey' => 'NJ',
    'New Mexico' => 'NM',
    'New York' => 'NY',
    'North Carolina' => 'NC',
    'North Dakota' => 'ND',
    'Ohio' => 'OH',
    'Oklahoma' => 'OK',
    'Oregon' => 'OR',
    'Pennsylvania' => 'PA',
    'Rhode Island' => 'RI',
    'South Carolina' => 'SC',
    'South Dakota' => 'SD',
    'Tennessee' => 'TN',
    'Texas' => 'TX',
    'Utah' => 'UT',
    'Vermont' => 'VT',
    'Virginia' => 'VA',
    'Washington' => 'WA',
    'West Virginia' => 'WV',
    'Wisconsin' => 'WI',
    'Wyoming' => 'WY'
);

 ?>

<section class="reservation_wrapper p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reservation_hd">
                        <h2>Make Reservation</h2>
                        <div class="mbship_top_step nav nav-pills">
                            <li class="tab-pills active"><div class="top_step"><span>1</span> Personal info</div></li>
                            <li class="tab-pills"><div class="top_step"><span>2</span> Lease Agreement</div></li>
                            <li class="tab-pills"><div class="top_step"><span>3</span> Payment</div></li>
                            <li class="tab-pills"><div class="top_step"><span>4</span> Confirm</div></li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{ url('paymentProcc') }}" method="post" id="payment-form">
                        @csrf
                    <div class="mbship_step_cont">
                        <div class="tab d-none">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pet_info_hd">
                                        <h4>Personal info</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first_name" placeholder="Enter your name">
                                        <span class="text-danger validation_error" error-for="first_name"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Enter your name">
                                        <span class="text-danger validation_error" error-for="last_name"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Move-In Date *</label>
                                        <input type="Date" class="form-control" name="move_in_date" placeholder="Automatically filled ">
                                        <span class="text-danger validation_error" error-for="move_in"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Phone Number *</label>
                                        <input type="Number" class="form-control" name="phone" placeholder="Enter your number">
                                        <span class="text-danger validation_error" error-for="phone"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <span class="text-danger validation_error" error-for="email"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="text-danger validation_error" error-for="password"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Confirm Password *</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                        <span class="text-danger validation_error" error-for="confirm-password"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select id="inputState" class="form-select" name="region">
                                            <option value="us">United States</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label for="inputState" class="form-label">State</label>
                                        <select id="inputState" class="form-select" name="state">
                                            @foreach($usStates as $key=>$val)
                                                <option value="{{ $val }}">{{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Address *</label>
                                        <input type="text" class="form-control" name="address_1" placeholder="Address">
                                        <span class="text-danger validation_error" error-for="address_1"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Address 2 *</label>
                                        <input type="text" class="form-control" name="address_2" placeholder="Address 2">
                                        <span class="text-danger validation_error" error-for="address_2"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>City *</label>
                                        <input type="text" class="form-control" name="city" placeholder="City">
                                        <span class="text-danger validation_error" error-for="city"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>ZipCode *</label>
                                        <input type="text" class="form-control" name="zipcode" placeholder="ZipCode">
                                        <span class="text-danger validation_error" error-for="zipcode"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            Please text me about my reservation.
                                        </label>
                                    </div>
                                </div>
                        </div>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="button" id="next_button" class="btn cta ms-auto first_next_button" >Hold Unit</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab d-none">
                           
                                <div class="form-check p-0">
                                    <input class="form-check-input" type="radio" name="lease_agreement" id="lease_agreement">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Please check your agreement before submit your application
                                        <!-- <span>Message and data rates may apply.</span> -->
                                    </label>
                                </div>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="button" id="next_button" class="btn cta ms-auto second_next_button" >Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab d-none">
                      
                                <div class="col-lg-12">
                                    <div class="pet_info_hd">
                                        <h4>Payment</h4>
                                    </div>
                                </div>
                                <div class="paylatter_bg">
                                    <div class="paylatter_wrapper">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked>
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                Credit/Debit Card
                                            </label>
                                        </div>
                                        <div class="pay_card">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_1.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_2.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_3.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_4.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row border-0">
                                        <div class="col-lg-12">
                                            <div class="from_gp">
                                                <input type="text" class="form-control" id="card-name" name="card_name" placeholder="Name On Card">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div id="card-elements"></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pay_online_wreap">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                            <label class="form-check-label" for="flexRadioDefault6">
                                                Pay With Paypal
                                            </label>
                                        </div>
                                        <img src="{{ asset('Trade_Storage/assets/img/pay_5.svg') }}">
                                    </li>
                                    <li>    
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                            <label class="form-check-label" for="flexRadioDefault7">
                                                Pay With Stripe
                                            </label>
                                        </div>
                                        <img src="{{ asset('Trade_Storage/assets/img/pay_6.svg') }}">
                                    </li>
                                </ul>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="submit" data-secret="{{ $intent->client_secret }}" id="card-button" class="btn cta ms-auto" >Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="reservation_right">
                        <h4>Reservation Details</h4>
                        <ul class="reservation_detail">
                            
                        </ul>
                    </div>
                    <ul class="reservation_list">
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> No obligation to rent</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> No credit card required</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> All rentals month to month</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> LOCK in this rate</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function(){
        storage_detail = localStorage.getItem('ssc12');
        if(storage_detail){
            var decrypted = CryptoJS.AES.decrypt(storage_detail, 'secret');
            var decryptedString = decrypted.toString(CryptoJS.enc.Utf8);
            var storageDetailArray = JSON.parse(decryptedString); 
        }else{
            console.log('storage_not_found');
            return false;
        }
        html =  `<li><p> Size</p> <strong>${storageDetailArray.size.name}</strong></li>
                            <li><p> Address:</p> <strong class="text-end">${storageDetailArray.propertie.address.full_address}</strong></li>
                            <li><strong>Storage per month fee</strong> <strong>$${storageDetailArray.discount_price}/month</strong></li>`;
        $('.reservation_detail').html(html);
   
    $('.first_next_button').on('click',function(){
        
        first_name = $('input[name="first_name"]').val();
        last_name = $('input[name="last_name"]').val();
        move_in = $('input[name="move_in_date"]').val();
        phone = $('input[name="phone"]').val();
        email = $('input[name="email"]').val();
        city = $('input[name="city"]').val();
        address1 = $('input[name="address_1"]').val();
        address_2 = $('input[name="address_2"]').val();
        password = $('input[name="password"]').val();
        confirm_password = $('input[name="confirm_password"]').val();
        zipcode = $('input[name="zipcode"]').val();

        action = true;
        if(first_name == null || first_name == ""){
            $('span[error-for="first_name"]').html('First name must be required');
            action = false;
        }else{
            $('span[error-for="first_name"]').html('');
        }
         if(last_name == null || last_name == ""){
            $('span[error-for="last_name"]').html('Last name must be required');
            action = false;
        }else{
            $('span[error-for="last_name"]').html('');
        }
         if(move_in == null || move_in == ""){
            $('span[error-for="move_in"]').html('Move in date must be required');
            action = false;
        }else{
            $('span[error-for="move_in"]').html('');
        }
         if(phone == null || phone == ""){
            $('span[error-for="phone"]').html('Phone must be required');
            action = false;
        }else{
            $('span[error-for="phone"]').html('');
        }
         if(email == null || email == ""){
            $('span[error-for="email"]').html('Email must be required');
            action = false;
        }else{
            $('span[error-for="email"]').html(''); 
        }
         if(city == null || city == ""){
            $('span[error-for="city"]').html('City must be required');
            action = false;
        }else{
            $('span[error-for="city"]').html('');
        }
         if(address1 == null || address1 == ""){
            $('span[error-for="address_1"]').html('Address field must be required');
            action = false;
        }else{
            $('span[error-for="address_1"]').html('');
        }
         if(address_2 == null || address_2 == ""){
            $('span[error-for="address_2"]').html('Address2 field must be required');
            action = false;
        }else{
            $('span[error-for="address_2"]').html('');  
        }  
        if(zipcode == null || zipcode == ""){
            $('span[error-for="zipcode"]').html('Zipcode must be required');
        }else{
            $('span[error-for="zipcode"]').html('');
        }

        if(password == null || password == ""){
            $('span[error-for="password"]').html('Password must be required');
        }else if(confirm_password == null || confirm_password == ""){
            $('span[error-for="confirm-password"]').html('Confirm password is empty');
        }else if(password != confirm_password){
            $('span[error-for="password"]').html('Password and confirm password must be same');
            $('span[error-for="confirm-password"]').html('');
        }else{
            $('span[error-for="password"]').html('');
            $('span[error-for="confirm-password"]').html('');
        }

        if(action == false){
            return false;
        }
        html =  `<li><p> Size</p> <strong>${storageDetailArray.size.name}</strong></li>
                            <li><p> Address:</p> <strong class="text-end">${storageDetailArray.propertie.address.full_address}</strong></li>
                            <li><p> Move-In Date</p> <strong>${move_in}</strong></li>
                            <li><p> Name</p> <strong>${first_name} ${last_name}</strong></li>
                            <li><p> Email</p> <strong>${email}</strong></li>
                            <li><p> Phone</p> <strong>${phone}</strong></li>
                            <li><strong>Storage per month fee</strong> <strong>$${storageDetailArray.discount_price}/month</strong></li>`;
                            $('.reservation_detail').html(html);
                            $('#payment-form').append(`<input type="hidden" name="propertie_id" value="${storageDetailArray.propertie.id}"><input type="hidden" name="storage_id" value="${storageDetailArray.id}">`)
        next();
    });
    $('.second_next_button').on('click',function(){
        if($('#lease_agreement').prop('checked')){
            next();
        }else{
            return false;
        }

    })
    const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
    // console.log(stripe);
    const elements= stripe.elements();
    const cardElement= elements.create('card');
    cardElement.mount('#card-elements');
    const cardBtn = document.getElementById('card-button');
    console.log(cardBtn);

    const form = document.getElementById('payment-form');
    cardBtn.addEventListener('click',function(){
      form.addEventListener('submit', async (e) => {
      
      const cardBtn = document.getElementById('card-button');
      const name = $('#card-name').val();
      const cardHolderName = name; 
          e.preventDefault()
      
          // cardBtn.disabled = true
          const { setupIntent, error } = await stripe.confirmCardSetup(
              cardBtn.dataset.secret, {
                  payment_method: {
                      card: cardElement,
                      billing_details: {
                          name: cardHolderName.value
                      }   
                  }
              }
          )
    
          if(error) {
              cardBtn.disable = false
              if(error.message != ''){
                $("#card-error-message").html(error.message);
              }
          } else {
              let token = document.createElement('input')
              token.setAttribute('type', 'hidden')
              token.setAttribute('name', 'token')
              token.setAttribute('value', setupIntent.payment_method)

              form.appendChild(token)
              form.submit();
          }
      });
    });

});
    
  </script>
@endsection