<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="\assets\css\landingStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

</head>
<body>
/<!-- start header -->
<header class="header">

    <!--   start logo -->
    <a href="#" class="logo">
      <i class="fas fa-tooth"></i>
      dentist
    </a>
@foreach ($errors->all() as $error)
{{$error}}
@endforeach
    <!--   start navbar -->
    <nav class="navbar">
      <a href="#home">home</a>
      <a href="#about">about</a>
      <a href="#services">services</a>
    </nav>
    <!--   end navbar -->
    <a href="#contact" class="btn">make appointment</a>

  </header>
  <!-- end header -->


  <!-- start home -->
  <section id="home" class="home">

    <div class="content">

      <h3>make your smile shine</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt animi, alias cumque iure molestiae excepturi ?</p>
      <a href="#contact" class="btn">make appointment</a>

    </div>

  </section>
  <!-- end home -->

  <!-- about -->

  <section id="about" class="about">

    <h1 class="heading"> about us </h1>

    <!--   content -->
    <div class="row">

      <!--     image -->
      <div class="image">
        <img src="https://images.pexels.com/photos/3845810/pexels-photo-3845810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="medical equipment">
      </div>

      <!--     info -->
      <div class="content">
        <h3>our clinic is made for you to be smiling all the time</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta natus alias eaque sapiente tempore sint expedita perferendi.</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta natus alias eaque sapiente tempore sint expedita perferendi.</p>
        <a href="#" class="btn">read more</a>
      </div>

    </div>

  </section>

  <!-- end about -->

  <!-- services -->

  <section id="services" class="services">

    <h1 class="heading"> our services </h1>

    <div class="box-container">
      <!--     start field -->
      <div class="box">
        <img src="https://us.123rf.com/450wm/paladjai/paladjai2003/paladjai200300008/141737198-dental-cartoon-of-a-tooth-doctor-and-calendar-illustration-cartoon-character-vector-design-on-blue-b.jpg?ver=6" alt="teeth appointment illustration">
        <h3>online schedule</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque quasi.</p>
      </div>
      <!--     end field -->

      <!--     start field -->
      <div class="box">
        <img src="https://img.freepik.com/free-vector/dentist-man-examining-patient-teeth_1308-98143.jpg?size=626&ext=jpg" alt="">
        <h3>cosmetic feeling</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque quasi.</p>
      </div>
      <!--     end field -->

      <!--     start field -->
      <div class="box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRfOoFKt4mVRUvZlYOF1Lp3hbFLeKbSEryobn54WC-Rtd4s1DTkDeaLvr6C0YTz4xltKU&usqp=CAU" alt="oral hygiene">
        <h3>oral hygiene experts</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque quasi.</p>
      </div>
      <!--     end field -->

    </div>

  </section>

  <!-- end services -->

  <!-- contact -->

  <section id="contact" class="contact">

    <h1 class="heading">make appointment</h1>

    <form action="{{route('resfromlanding')}}" method="post">
        @csrf
      <span>your name:</span>
      <div class="input-box">
        <input type="text" placeholder="first name" name="fname">
        <input type="text" placeholder="last name" name="lname">
      </div>

       <span>your number:</span>
       <input type="text" class="box" placeholder="enter your number"  required name="phone">
       <h3>Format: 0606060606</h3>
       <br>
       {{-- pattern="06[0-9]{8}" --}}
       <span>appointment date:</span>
       <input type="datetime-local" class="box" name="res_date">

      <input type="submit" class="btn" value="order now">

    </form>
  </section>

  <!-- contact ends -->

  <!-- footer -->

  <section class="footer">

    <div class="box-container">

  <!--     start column -->
      <div class="box">

        <h3>address</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ratione.</p>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-linkedin"></a>
          <a href="#" class="fab fa-instagram"></a>
        </div>

      </div>
  <!--     end column -->

  <!--     start column -->
      <div class="box">
        <h3>email</h3>
        <a href="#" class="link">contact@dentist.com</a>
      </div>

  <!--     end column -->

  <!--     start column -->
      <div class="box">
        <h3>opening hours</h3>
        <p>monday-friday : 08:00 - 23:00<br>
          saturday : 10:00 - 15:00
        </p>
      </div>
  <!--     end column -->

    </div>

  </section>

  <!-- end footer -->
<script src="https://kit.fontawesome.com/299e2ad6c6.js" crossorigin="anonymous"></script>
<script src="assets/js/landingScript.js"></script>
</body>
</html>
