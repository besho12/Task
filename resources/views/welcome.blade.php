<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                         crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>


    <!-- Start Navbar -->

    <nav class="navbar sticky-top navbar-expand-md navbar-light">
    <div class="container">
    <a class="navbar-brand" href="index.php">Website Name <span>The Best In Middle East</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
        <i class="fas fa-bars" style="color:#fff; font-size:20px;"></i>
    </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">ABOUT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">CONTACT US</a>
        </li>

        @if (Route::has('login'))

            @auth
            <a href="{{ url('/Dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else

            <li class="nav-item">
                <a href="{{ route('login') }}"  class="nav-link" id="loginbutton">Login</a>
            </li>

            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link" id="loginbutton">Register</a>
            </li>
            @endif
        @endif
        @endif



        </ul>
    </div>
    </div>
    </nav>
    <!-- End Navbar -->

    <!-- Dashboard -->

<section class="dashboard">
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-5">
          <div class="hero-content">
            <h1 class="hero-title">
              Ecommerce Website
            </h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.numquam tempora, iure delectus totam minus quam aperiam ratione dolores magni voluptates ut necessitatibus odio ipsum fuga, voluptas ab praesentium nihil?
            </p>
            <div class="hero-btn mt-5">
                <a href="{{ route('login') }}"><button class="btn btn-editbutton">Join Now!</button></a>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <img src="img/product.svg" class="img-fluid" style="width:500px;" alt="">
        </div>
      </div>
    </div>
</section>

<!-- Dashboard -->


<section class="about text-center">
  <div class="container">
    <h1>Browse All Amazing Products</h1>
    <p class="lead">You Can Buy Any Product You Want To Learn More Click The Button</p>
    <button class="btn btn-outline editbutton">Learn More..</button>
  </div>
</section>



<!-- Start Contactus -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="contact">
                  <h1>From The Blog</h1>
                  <h5>Post Title</h5>
                  <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  <a class="readmore" href=""> Read More >></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="contact">
                    <h1>Quick Links</h1>
                    <a href="">Click First Link To Go</a>
                    <a href="">Click Second Link To Go</a>
                    <a href="">Click Third Link To Go</a>
                    <a href="">Click Fourth Link To Go</a>
                    <a href="">Click Fifth Link To Go</a>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="contact">
                    <h1>Latest Tweets</h1>
                    <p class="lead"><span>@LoremIpsum</span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <p class="lead"><span>@LoremIpsum</span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="contact">
                    <h1>Contact Us</h1>
                    <form class="form-contact">
                        <input class="form-control form-control-lg" type="text" placeholder="Full Name">
                        <input class="form-control form-control-lg" type="text" placeholder="Email Address">
                        <input class="form-control form-control-lg" type="text" placeholder="Subject">
                        <textarea class="form-control form-control-lg" placeholder="Message"></textarea>
                        <button class="btn submit">SUBMIT</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- End Contactus-->



<section class="footer">
    <div class="container">
      <div class="copyright">
        Copyright &copy; 2020-All Rights Reserved
      </div>
    </div>
</section>



    </body>
</html>

<style>
    /* Start navbar*/
.navbar {
  width: 100%
  padding: 0px;
  padding-left: 8rem;
  width: 100%;
  padding-top: 8px;
  padding-right: 8rem;
  padding-bottom: 8px;
  background: rgba(30,119,165,.9);
  margin-bottom: 0px;
  border-radius: 0;
}

.navbar-brand {
  color: #FFF !important;
  font-size: 29px;
  font-weight: bolder;
  font-family: Comic Sans MS;
  margin-top: -8px;
}

.navbar span {
  display: block;
  font-size: 13px;
  margin-left: 3px;
  margin-top: -7px;
  font-family: myriad;
  font-weight: 100;
  color: rgb(118, 195,143 );
  color:#FFF;

}

.navbar li {
  padding-right: 6px;
  padding-left: 6px;
}
.navbar .nav-item .nav-link{
  color: #FFF;
  font-size: 15px;
  font-family: 'Raleway', sans-serif;
}

.navbar-light .navbar-toggler {
  padding: 8px;
    margin: 5px;
    padding-top: 13px;
    color: #FFF;
    border-color: rgb(30,119,165);
    padding-left: 5px;
}

#activelink {
  background-color: #1c8a3daf;
  border-radius: 10px;
}

#activelink a{
  color: #FFF;
  font-size: 15px;
}

.navbar a {
       color:#FFF;
}


.navbar .nav-item .nav-link:hover {
    color:#000;
}
#activelink .nav-link:hover {
  color: #000;
}

#loginbutton{
  border: 1px solid #DDD;
  padding-right: 20px;
  padding-left: 20px;
  font-size: 18px;
}
#loginbutton:hover{
  color: #FFF;
  border: 1px solid #FFF;
  cursor: pointer;
}

.Username {
  padding-top: 10px;
  color: #DDD;
  padding-bottom: 10px;
  font-size: 20px;
  cursor: context-menu;
  margin-bottom: 0;
}
.Username:hover {
  color: #FFF;
}

/* End navbar*/




/* Start dashboard Section */

.dashboard {
    width: 100%;
    height: 100%;
    text-align: left;
    padding: 60px;
}

.dashboard h1 {
  margin-bottom:20px;
  font-size: 30px;
}

.dashboard p {
  font-size: 20px;
}
.dashboard button {
  font-size: 20px;
  padding: 5px 30px;
  background-color: rgb(30,119,165);
  color: #FFF;
}

/* End dashboard Section */




/* Start About Section */

.about {
  padding: 60px;
  background-color: #f9f7f7;
}

.about .lead {
  color: #888;
  font-size: 25px;
  margin-top: 15px;
}
.about h1 {
   font-weight: bold;
   font-family: Myriad;
   font-size: 30px;
}

.editbutton {
  color: #000;
  border-color:rgb(30,119,165);
  font-size: 20px;
  padding: 5px 20px;

}
.about .btn:hover {
  background-color: rgb(30,119,165);
  color: #FFF;
}

/* End About Section */


/* Start Contactus */

.contact-us {

background:#383838;
padding: 40px;
}
.contact-us h1 {
color: #DDD;
font-size: 20px;
margin-bottom: 30px;
}
.contact-us .contact a {
display: block;
border-bottom: 1.5px solid #444;
padding:7px 7px 7px 0;
color:  rgb(30,119,165);
font-size: 18px;
}
.contact {
margin-bottom: 15px;
}
.contact .form-control {
 margin-bottom: 11px;
 border-radius: 10px;
 background: #222;
 border: none;
 color: #FFF;
 font-size: 16px;
}

.contact .form-contact textarea {
resize: none;
height: 90px;
}
.submit {
color: #2e2e2e;
font-weight: 500;
background-color: rgb(30,119,165);
border-radius: 10px;
 font-size: 18px;
 padding-left: 15px;
 padding-right: 15px;
}
.submit:hover{
color: #ececec;
}
.footer {
background: #222;
border-top: 1px solid #111;
padding-top: 10px;
padding-bottom: 10px;
}
.footer .copyright {
color: #AAA;
padding: 15px 0;
font-size: 20px;
}
.contact-us .contact p {
color: #999;
font-size: 15px;
font-family: tahoma;
}
.contact-us .contact h5 {
color: rgb(30,119,165);
font-size: 15px;
}
.contact-us .contact .readmore {
display: auto;
border:none;
padding:0px 0px 0px 0;
color:  rgb(30,119,165);
font-size: 18px;
}
.contact-us .contact span {
color:  rgb(30,119,165);
}

/* End Contactus */





</style>
