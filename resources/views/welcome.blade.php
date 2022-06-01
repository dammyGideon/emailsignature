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
</style>


</head>

<body>

    <div class="row">
       <div class="col-md-4"></div>
        <div class="col-md-4">
            <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654112559/gflogo_header2_fdhejj.png"
            class="img-fluid rounded" style="align-content: center">


             <p class="signature">Email Signature Generator <br/>
                <span>Version: 1.0.1</span>
             </p>

             <form method="post" action="/email">
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

                    @foreach ($data as $item)
                    <div id="select_txt">
                        <fieldset id="details">
                           <span><b>{{ $item->full_name }}</b></span><br/>
                           <span>{{ $item->department }}</span><br/>
                           <img src="https://res.cloudinary.com/gravesfoods/image/upload/v1654096325/gflogo_emailsig_y3qsj0.png"
                           style="width:15vh" alt=""/> <br/>
                           <span><a href="{{ $item->first_no }}">{{ $item->first_no }}</a> Direct</span><br/>
                            <span><a href="{{ $item->second_no }}">{{ $item->second_no }}</a> Main</span><br/>
                           <span><a href="{{ $item->email }}">{{ $item->email }}</a></span><br/>
                           <span><a href="https://gravesfoods.com">{{ $item->website_link }}</a></span><br/>

                        </fieldset>

                    </div>
                     <div>

                            <i class="fa fa-facebook" style="font-size:25px; color:#EC1F27"></i>
                            <i class="fa fa-twitter" style="font-size:25px; color:#EC1F27"></i>
                            <i class="fa fa-linkedin" style="font-size:25px; color:#EC1F27"></i>
                            <i class="fa fa-youtube" style="font-size:25px; color:#EC1F27"></i>

                     </div>



                @endforeach
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
                    @foreach ($data as $item)
                    <div>
                        <fieldset>
                           <span>{{ $item->full_name }}</span><br/>
                           <span>{{ $item->department }}</span><br/>
                            <span>Graves Foods</span> <br/>
                            <span><a href="{{ $item->first_no }}">{{ $item->first_no }}</a> Direct</span><br/>
                            <span><a href="{{ $item->second_no }}">{{ $item->second_no }}</a> Main</span><br/>
                            <span><a href="{{ $item->email }}">{{ $item->email }}</a></span><br/>
                            <span><a href="https://gravesfoods.com">{{ $item->website_link }}</a></span><br/>

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
       <div class="footer col-md-4 mt-4" ></div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header"></div>
        <div class="modal-body">
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




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
 function copy_data(containerid) {
  var range = document.createRange();
  range.selectNode(containerid); //changed here
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();

  toastr.success("Email Signature copied", "", {"iconClass": 'customer-info'});
}
function generatee_button(){
    toastr.success("Email Signature Generated", "", {"iconClass": 'customer-info'});
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
                    '{{ Session::get('success') }}','success',
                    {"iconClass":"customer-success"}

                    );
            @endif
        });

</script>


</html>
