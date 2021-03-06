<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <link rel="icon"  href="https://res.cloudinary.com/gravesfoods/image/upload/v1654463012/medium-icon-graves-foods_gq41pi.png"/>
  <title>Email Signature Generator - Graves Foods</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
  <!-- CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />



   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <style>


   *{
    margin: 0;
    padding:0;
}

body{
    background: #EC1F27;
}
.signature{
    text-align: center;
    color:floralwhite;
}
.input {
    border-radius: 30px;
}

.btn-text-center{
    text-align: center;
}
.btn {
    background-color: aliceblue;
    color:black;
    border-radius: 12px;
    width: 50%;
    border: 2px solid black;
}
input{
        padding:10px;
        border-radius:10px;
        width: 80%;
        margin-left: 10%;
        margin-left: 10%;
        height: 6vh;
}

select{
        /* padding:10px; */
        border-radius:10px;
        width: 80%;
        margin-left: 10%;
        margin-left: 10%;
        height: 6vh;
}
hr{
    color:white;
    border: 10px solid white;
}
h6{
    text-align: center;
    color: white;
}

.desktop textarea {
    width: 100%;
    border-radius:10px;
    margin-left: 10%;
    margin-left: 10%;
    padding:10px;
    height: 40%;
}


.btn_style{
    border-radius: 12px;
    width: 50%;

}

#toast-container > .customer-error {
  background-color: black;
  color: whitesmoke
}
#toast-container > .customer-success {
  background-color: white;
  color: green
}

#toast-container > .customer-info {
  background-color: white;
  color: green
}
.footer{
    margin-bottom: 50px;
}

#snackbar {
  visibility: hidden;
  min-width: 350px;
  margin-left: -175px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  right: 50%;
  top: 30px;
  font-size: 17px;

}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.10s;
  animation: fadein 0.10s;

}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

a{
    text-decoration: none;
}

html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}


</style>


</head>

<body>
<div class="container_fluid">

    <div class="row">
        <div class="col-md-4"></div>
         <div class="col-md-4">
             <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654112559/gflogo_header2_fdhejj.png"
                  style="display: block;
                         margin-left: auto;
                         margin-right: auto;
                         width: 100%;
                     ";>
 
              <p class="signature">Email Signature Generator <br/>
                 <span>Version: 1.0.138</span>
              </p>
 
              <form method="post" action="/email" id="email">
                  @csrf
                 <div class="">
                     <input type="text" name="full_name"  placeholder="Full Name"  required>
                 </div>
                 <div class=" mt-4">
 
                     <select name="department">
                             <option>Select Department</option>
                             <option value="Marketing">Marketing</option>
                             <option value="Sales">Sales</option>
                             <option value="Transportation">Transportation</option>
                             <option value="Warehouse">Warehouse</option>
                             <option value="Information Technology">Information Technology</option>
                     </select>
 
                 </div>
                 <div class=" mt-4">
                     <input type="text" name="direct"  placeholder="Direct#"    required>
                 </div>
                 <div class=" mt-4">
                     <input type="email" name="email" placeholder="Email"     required>
                 </div>
                 <div class="btn-text-center mt-4">
                      <button type="submit" onclick="generatee_button()" class="btn">Generate</button>
                 </div>
 
              </form>
         </div>
 
         <div class="horizontal mt-4">
             <hr/>
         </div>
 
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-3 desktop">
                 <h6>Desktop Email Signature</h6>
                 <div style="background-color: white; height: 40vh;">
 
                     <div id="select_txt">
                         <fieldset id="details">
 
                             @if(Session::has('user'))
 
 
                            <span><b> {{Session::get('user')['full_name']}}</b></span><br/>
                            <span> {{Session::get('user')['department']}}</span><br/>
                            <a href="https://gravesfoods.com">
                             <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654096325/gflogo_emailsig_y3qsj0.png"
                              style="width:15vh" alt=""/>
                             </a> <br/>
                             <span>
                                     <a href="{{Session::get('user')['first_no']}}">
                                     {{Session::get('user')['first_no']}}</a> Direct
                                 </span>
                             <br/>
 
                             <span>
                                 <a href="{{Session::get('user')['second_no']}}">
                                     {{Session::get('user')['second_no']}}</a> Main</span><br/>
                            <span>
                                <a href="{{Session::get('user')['email']}}">
                                 {{Session::get('user')['email']}}</a></span><br/>
                            <span>
                                <a href="https://gravesfoods.com">
                                {{Session::get('user')['website_link']}}
                             </a></span><br/>
 
                         </fieldset>
 
                         <a href="https://www.facebook.com/gravesmenumakerfoods" style="text-decoration: none!important; cursor: pointer;">
                             <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/facbook_fhziiu.png"
                              style="width:4vh" alt=""/>
                         </a>
 
                         <a href=" https://twitter.com/gravesfoods" style="text-decoration: none!important; cursor: pointer;">
                             <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/twitter_rrbvuz.png"
                             style="width:4vh" alt=""/>
                         </a>
                         <a href="https://www.linkedin.com/company/gravesfoods/" style="text-decoration: none!important; cursor: pointer;">
                             <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/linkedin_hvrtvq.png"
                             style="width:4vh" alt=""/>
                         </a>
                        <a href="https://www.youtube.com/channel/UCmniDzDvYnxslGpdrMWM2Tg" style="text-decoration: none!important; cursor: pointer;">
                         <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/youtube_qpj56k.png"
                         style="width:4vh" alt=""/>
                        </a>
 
                        @endif
                     </div>
 
                 </div>
                  <div class="btn-text-center mt-4">
                      <button type="submit" class="btn"
                      onclick="copy_data(select_txt)">Copy</button>
                 </div>
 
             </div>
 
             <div class="col-md-2"></div>
             <div class="col-md-3 desktop">
                 <h6>Mobile Email Signature</h6>
                 <div class="" style="background-color: white; height: 40vh;">
                     <div>
 
                         <fieldset>
                         @if(Session::has('user'))
                             <span><b> {{Session::get('user')['full_name']}}</b></span><br/>
                             <span> {{Session::get('user')['department']}}</span><br/>
                             <span>Graves Foods</span> <br/>
 
                             <span>
                                 <a href="{{Session::get('user')['first_no']}}">
                                 {{Session::get('user')['first_no']}}</a> Direct
                             </span>
                              <br/>
                             <span>
                                 <a href="{{Session::get('user')['second_no']}}">
                                     {{Session::get('user')['second_no']}}</a> Main</span><br/>
                            <span>
                                <a href="{{Session::get('user')['email']}}">
                                 {{Session::get('user')['email']}}</a></span><br/>
                            <span>
                                <a href="https://gravesfoods.com">
                                {{Session::get('user')['website_link']}}
                             </a></span><br/>
 
 
                         @endif
                         </fieldset>
 
                     </div>
                 </div>
 
                  <div class="btn-text-center mt-4">
                      <button type="submit" class="btn" onclick="snackbar()"
                      data-toggle="modal" data-target="#exampleModalCenter"
                      >Send to Mobile</button>
                 </div>
 
 
             </div>
         </div>
        <div class="footer col-md-4 mt-4" ></div>
 
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
             <div id="snackbar">
                 Enter your mobile number
                 and tap Send to receive
                 the Mobile Email Signature via text message.
             </div>
 
           <form action="/send_sms" method="POST">
             @csrf
             <input type="text" name="phone_number" placeholder="Enter mobile number" required/>
             <div class="btn-text-center mt-4">
                 <button type="submit" class="btn">Send</button>
             </div>
           </form>
         </div>
 
       </div>
     </div>
   </div>
 

</div>
    



</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>

 //snackbar

 function snackbar(){
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 30000);
 }

 function copy_data(containerid) {
  var range = document.createRange();
  range.selectNode(containerid); //changed here
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();

  toastr.success('<img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/check_k90mdz.png" style="margin-right:2%"/> Email Signature copied', "", {"iconClass": 'customer-info'});
}
function generatee_button(){
    toastr.success('<img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/check_k90mdz.png" style="margin-right:2%"/> Email Signature Generated', "", {"iconClass": 'customer-info'});
}
</script>

<script>
    $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error(
                    '{{ Session::get('error') }}',''
                    ,{"iconClass":"customer-error"});
            @elseif(Session::has('success'))
                toastr.success(
                    '<img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654119275/check_k90mdz.png" style="margin-right:2%"/> {{ Session::get('success') }}','',
                    {"iconClass":"customer-success"}

                    );
            @endif
        });


        $('#email').submit(function(){
            e.preventDefault();

            $.ajax({
                url:$form.atr('action'),
                data:$(this).serialize(),
                dataType: 'json'

                success: function(data){
                    alert('worked')
                },

                error: function (data){
                    alert('nothing dey')
                }

            })

        })


</script>


</html>
