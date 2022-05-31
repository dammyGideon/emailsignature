<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Email</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>


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

#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  top: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
}
.btn_style{
    border-radius: 12px;
    width: 50%;

}
  </style>


</head>

<body>

    <div class="row">
       <div class="col-md-4"></div>
        <div class="col-md-4">
            <img src="/public/img/GF.png" class="img-fluid rounded">
             <p class="signature">Email Signature Generator <br/>
                <span>Version: 1.0.1</span>
             </p>

             <form method="post" action="/email">
                 @csrf
                <div class="">
                    <input type="text" name="full_name"  placeholder="Full Name"  required>
                </div>
                <div class=" mt-4">
                    <input type="text" name="department" placeholder="Department" required>
                </div>
                <div class=" mt-4">
                    <input type="text" name="direct"  placeholder="Direct#"    required>
                </div>
                <div class=" mt-4">
                    <input type="email" name="email" placeholder="Email"     required>
                </div>
                <div class="btn-text-center mt-4">
                     <button type="submit" class="btn">Generate</button>
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
                    @foreach ($data as $item)
                    <div id="select_txt">
                        <fieldset id="details">
                           <span>{{ $item->full_name }}</span><br/>
                           <span>{{ $item->department }}</span><br/>
                           <img src="/img/graves-logo.png" style="width:20vh" alt=""/> <br/>
                           <span>{{ $item->first_no }}</span><br/>
                           <span>{{ $item->second_no }}</span><br/>
                           <span>{{ $item->email }}</span><br/>
                           <span>{{ $item->website_link }}</span><br/>

                        </fieldset>

                    </div>
                     <div>
                        <a href="https://res.cloudinary.com/gravesfoods/image/upload/v1653673223/youtube-square-brands_wogpe3.svg" class="fa fa-facebook">F</a>
                        <a href="#" class="fa fa-twitter">T</a>
                        <a href="#" class="fa fa-linkedin">L</a>
                        <a href="#" class="fa fa-youtube">Y</a>
                     </div>



                @endforeach
                </div>


                 <div class="btn-text-center mt-4">
                     <button type="submit" class="btn"
                     onclick="copy_data(select_txt)">Copy</button>
                </div>

                <div id="snackbar">Copied Email Signature!..</div>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-3 desktop">
                <h6>Mobile Email Signature</h6>
                <div class="" style="background-color: white; height: 40vh;">
                    @foreach ($data as $item)
                    <div>
                        <fieldset>
                           <span>{{ $item->full_name }}</span><br/>
                           <span>{{ $item->department }}</span><br/>
                            <span>Graves Foods</span> <br/>
                           <span>{{ $item->first_no }}</span><br/>
                           <span>{{ $item->second_no }}</span><br/>
                           <span>{{ $item->email }}</span><br/>
                           <span>{{ $item->website_link }}</span><br/>

                        </fieldset>

                    </div>




                @endforeach
                </div>

                 <div class="btn-text-center mt-4">
                     <button type="submit" class="btn"
                     data-toggle="modal" data-target="#exampleModalCenter"
                     >Send to Mobile</button>
                </div>
            </div>
        </div>
       <div class="col-md-4"></div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header"></div>
        <div class="modal-body">
          <form action="/send_sms" method="POST">
            @csrf
            <input type="number" name="phone_number" placeholder="Enter mobile number" required/>
            <div class="btn-text-center mt-4">
                <button type="submit" class="btn">Send</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>




</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
 function copy_data(containerid) {
  var range = document.createRange();
  range.selectNode(containerid); //changed here
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();

  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}



</script>
</html>
