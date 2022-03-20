@extends('layouts.app')
@section('style')
<style>
    .StripeElement {
        box-sizing:border-box;
        height:40px;
        padding:10px 12px;

        border:1px solid transparent;
        border-radius:4px;
        background-color:white;
        box-shadow:0 1px 3px 0 #e6ebf1;
        -webkit-transition:box-shadow 150ms ease;
        transition:box-shadow 150ms ease;

    }
    .StripeElement--focus{
        box-shadow:0px 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid{
        border-color:#fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color:#fefde5 !important;
    }
</style>
@endsection
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-9">
            <p>total amount is $<strong>{{$amount}}</strong></p>

            <form action="/charge" method="post" id="payment-form">
              @csrf
               <div class="">
                   <input type="hidden" name="amount" value="{{$amount}}">
                    <label for="card-element">
                        credit or debit card
                    </label>
                    <div id="card-element">

                    </div>
                    <div id="card-errors" role="alert"></div>
                </div>
                <button class="btn btn-primary mt-3">submit payment</button>
            </form>
        </div>
        <div class="col-md-3">
        <img  src="\images\imagall\creid.jpg" class="card-img-top" alt="..." 
        >

        </div>
    </div>
</div>


@endsection 
@section('script')
<script src="https://js.Stripe.com/v3/"></script>
<script>

   
    window.onload = function (){
        // var stripe = Stripe("pk_test_51KCv9DAiFqTGQvl0YzmIe2ahYyhcMAuA1lE2taPSCY1He3NBTJeRGSCCWvTQKhupYak4Ti4fwENGY0mOeNxl5lGs00RXhXcoWr");

        var stripe = Stripe('pk_test_51KCv9DAiFqTGQvl0YzmIe2ahYyhcMAuA1lE2taPSCY1He3NBTJeRGSCCWvTQKhupYak4Ti4fwENGY0mOeNxl5lGs00RXhXcoWr');
        var elements = stripe.elements();

        var style = {
            base: {
                color:'#32325d',
                fontFamily : '"Helvetica Neue" , Helvetica,sans-serif',
                fontSmoothing: 'antialiased',
                fontSize:'16px',
                '::placeholder':{
                    color:'#aab7c4'
                }
            },
            invalid: {
                color:'afa755a',
                iconColor:'#fa755a'
            }
        };


        var card = elements.create('card',{style: style});
        // card.mount(');
        card.mount('#card-element')

        //handel real-time  validation errors from the card element.
        card.addEventListener('change',function(event){
            var displayError = document.getElementById('card-errors');
            if(event.error) {
                displayError.textContent = event.error.message;
            }else{
                displayError.textContent = '';
            }
        });
        //handling from submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit' , function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                //inform the user if there was an error

                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                }else{
                    //send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            //insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type' , 'hidden');
            hiddenInput.setAttribute('name' , 'stripeToken');
            hiddenInput.setAttribute('value' , token.id);

            form.appendChild(hiddenInput);

            //submit the form

            form.submit();


        }



    }
</script>
@endsection