// const settings = {
//     dots: true,
//     infinite: true,
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     autoplay: true,
//     speed: 2000,
//     autoplaySpeed: 2000,
//     cssEase: "linear"
//   };
new WOW().init();
// ############################
// #########################

    window.onload = function (){
        var stripe = Stripe('pk_test_G0t481j692IFAcPN');
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
        // card.mount('#card-element');
        card.mount()

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
        var form = document.getElementById('card-errors');
        form.addEventListener('submit' , function(event){
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if(result.error) {
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