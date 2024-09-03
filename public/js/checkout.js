$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();
        
var fname=$('.fname').val();
var lname=$('.lname').val();
var email=$('.email').val();
var phone=$('.phone').val();
var address1=$('.address1').val();
var address2=$('.address2').val();
var city=$('.city').val();
var state=$('.state').val();
var country=$('.country').val();
var pincode=$('.pincode').val();

        if(!fname){
            fname_error="First Name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
            

        }
        else{
            fname_error= "";
            $('#fname_error').html(fname_error);
        }
        if(!lname){
            lname_error="First Name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
            

        }
        else{
            lname_error= "";
            $('#lname_error').html(lname_error);
        }

        if(!email){
            email_error="First Name is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
            

        }
        else{
            email_error= "";
            $('#email_error').html(email_error);
        }
        if(!phone){
            phone_error="First Name is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
            

        }
        else{
            phone_error= "";
            $('#phone_error').html(phone_error);
        }
        if(!address1){
            address1_error="First Name is required";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
            

        }
        else{
            address1_error= "";
            $('#address1_error').html(address1_error);
        }

        if(!address2){
            address2_error="First Name is required";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
            

        }
        else{
            address2_error= "";
            $('#address2_error').html(address2_error);
        }

        if(!city){
            city_error="First Name is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
            

        }
        else{
            city_error= "";
            $('#city_error').html(city_error);
        }

        if(!state){
            state_error="First Name is required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
            

        }
        else{
            state_error= "";
            $('#state_error').html(state_error);
        }

        if(!country){
            country_error="First Name is required";
            $('#country_error').html('');
            $('#country_error').html(country_error);
            

        }
        else{
            country_error= "";
            $('#country_error').html(country_error);
        }

        if(!pincode){
            pincode_error="First Name is required";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
            

        }
        else{
            pincode_error= "";
            $('#pincode_error').html(pincode_error);
        }

        if(fname_error!='' || lname_error!='' || email_error!='' || phone_error!='' || address1_error!=''|| address2_error!='' || city_error!='' || country_error!='' || state_error!='' || pincode_error!=''){
            return false;
        }
        else{

            var data={
             'fname' :fname,           
             'lname':lname,
             'email':email,
             'phone':phone,
             'address1':address1,
             'address2':address2,
             'city':city,
             'country':country,
             'pincode':pincode,

            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function(response) {
                    alert(response.total_price);
                   
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // For debugging
                }
            });
            
        }
    });

});
