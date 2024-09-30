<?php
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url );
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
  
}
$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCsvZoXHmXcAczVkV4E4dM0w&key=AIzaSyDD2UNalqYUNZ1iKIDerW7O8dOQ7Q4SJW8');
$youtubeprofilepic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channel = $result['items'][0]['snippet']['title'];
$subs = $result['items'][0]['statistics']['subscriberCount'];

//videoterakhir
$latestvideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDD2UNalqYUNZ1iKIDerW7O8dOQ7Q4SJW8&channelId=UCsvZoXHmXcAczVkV4E4dM0w&maxResults=1&order=date&part=snippet';
$result= get_CURL($latestvideo);
$latestvideoid = $result['items'][0]['id']['videoId'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Rifqi Luthfan Haris</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#social">Social</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/saya.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Rifqi Luthfan Haris</h1>
          <h3 class="lead">Data Enthusiast | Programmer | Gamer</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about" >
      <div class="container pb-4">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col">
            <p style="text-align: justify;">"Hello! I’m Luthfan, currently in my final year at Universitas Tidar, majoring in Computer Information Systems. I have a strong passion for data processing and programming, and I’m always excited to explore the latest technology trends. Besides my academic and project work, I’m also an enthusiastic supporter of Manchester United and enjoy the challenge of playing FPS games. I’m eager to learn, collaborate, and contribute to innovative solutions in the tech field!"</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio bg-light" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img\dash.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Analisis Transaksi dan Pola Konsumsi Pelanggan di Provinsi
                  Jawa Timur, Maluku Utara, Sulawesi Tenggara, dan Gorontalo Menggunakan Regresi Linear.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img\sertifsc.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Sertifikat Kelulusan Bootcamp Data Science dan Artificial Intelligence Startup Campus.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <!--sosmed -->
    <section class="social" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social Media</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?=$youtubeprofilepic; ?>" class="rounded-circle img-thumbnail" width="200">
              </div>
              <div class="col-md-8">
                <h5><?=$channel;?></h5>
                <p><?=$subs;?> Subs</p>
                <div class="g-ytsubscribe" data-channelid="UCsvZoXHmXcAczVkV4E4dM0w" data-layout="default" data-theme="dark" data-count="default"></div>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                  <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/<?=$latestvideoid?>?rel=0" title="YouTube video" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col md-5">
            <div class="row">
              <div class="col-md-4">
              <img src="img/saya.png" class="rounded-circle img-thumbnail" width="200">
              </div>
                <div class="col-md-8">
                  <h5>Instagram</h5>
                  <h5>@harisluthfann</h5>
                  <p>250 Followers</p>
                </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="ig-thumbnail">
                  <img src="img/ig1.png" style="width: 150px; height: 150px; object-fit: cover; float: left;">
                </div>
                <div class="ig-thumbnail">
                  <img src="img/ig2.png" style="width: 150px; height: 150px; object-fit: cover; float: left;">
                </div>
                <div class="ig-thumbnail">
                  <img src="img/ig3.png" style="width: 150px; height: 150px; object-fit: cover; float: left:">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  

    <!-- Contact -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Just in case you miss me and dont know where i am.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My existance</li>
              <li class="list-group-item">Jl. Mataram No. 926, Magelang</li>
              <li class="list-group-item">Central Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2024.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>