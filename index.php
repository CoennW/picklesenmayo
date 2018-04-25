<?php
	require_once('dbConfig.php');
	$upload_dir = 'uploads/';
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		//select old photo name from database
		$sql = "select photo from images where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$photo = $row['photo'];
			unlink($upload_dir.$photo);
			//delete record from database
			$sql = "delete from images where id=".$id;
			if(mysqli_query($conn, $sql)){
				header('location:index.php');
			}
		}
	}
?>




<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
     <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.slider').bxSlider({
                slideWidth: 900,
                adaptiveHeight: true,
                
            });
        });
    </script>

   
    <script src="js.js"></script> 
    
  

    <title>Pickles & Mayo</title>
</head>
<body>
     <!-- Header -->
    <header id="showcase" class="grid">
    <div class="bg-image"></div>
    <div class="content-wrap">
            <h1>Welkom bij Pickles & Mayo!</h1>
           
            <p>Een food trailer waar we onze lekkerste friet ooit bakken!</p>
            <a href="#section-a" class="btn">Lees verder</a>
        </div>
    </header>
    
    <!-- Main -->
    <main id="main">
        <!-- Section A-->
        <section id="section-a" class="grid">
            <div class="content-wrap">
                <h2 class="content-title">Échte verse friet</h2>
                <div class="content-text">
                    <p>Wij bakken niet zomaar friet. Wij onderscheiden ons door gebruik te maken van de beste aardappelen. Vers gesneden worden de frietjes gebakken in speciale olie. Ondertussen hebben wij al jaren ervaring op het gebied van friet. Heb jij het verschil al geproeft tussen onze friet en die van de snackbar? Kom ons snel eens bezoeken! Geen zin in friet? Probeer onze vers gemaakte frikandel. </p>
                </div>
            </div>
        </section>
        
       <!-- slides section -->
        <section id="section-wrapper" class="grid">
           <div class="content-wrap">
               <h2 class="content-title">Foto's</h2>
                <div class="slider">
                   
                   <?php
				$sql = "select * from images";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
			?>
                   
                    <div><img src="<?php echo $upload_dir.$row['photo'] ?>"></div>
                   <?php
                    }
                }
                    ?>
                </div>
            </div>
        </section>
        
       
       
        <!-- Section B -->
        <section id="section-b" class="grid">
            <ul>
                <li>
                    <div class="card">
                        <img src="img/img8.jpg" alt="">
                        <div class="card-content">
                            <h3 class="card-title">De Olie</h3>
                            <p>Onze cholestorolvrije rijstolvie draagt bij aan een unieke smaak. Daarnaast is dit ook nog een gezonde keuze!</p>
                        </div>
                    </div>
                </li>
                     <li>
                    <div class="card">
                        <img src="img/img1.jpg" alt="">
                        <div class="card-content">
                            <h3 class="card-title">De Aardappel</h3>
                            <p>Wij maken friet van de beste frietaardappelen. Wij snijden ze ter plekke en laten het schilletje er omzitten.</p>
                        </div>
                    </div>
                </li>
                     <li>
                    <div class="card">
                        <img src="img/arie_zeegers.jpg" alt="">
                        <div class="card-content">
                            <h3 class="card-title">De Frikandel</h3>
                            <p>Wij zijn ook trots op onze ambachtelijke frikandellen. Speciaal voor ons gemaakt door <a href="http://www.slagerijariezeegers.nl/" target="_blank">Arie Zeegers</a>.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        
        <section id="section-c" class="grid">
            <div class="content-wrap">
                <h2 class="content-title">Wij worden maar al te graag geboekt!</h2> 
                
                
                
                <div id="map"></div>
                <!-- Replace the value of the key parameter with your own API key. -->
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFNCWKJt-kW6ZvSrgkgSFj9W6M2o1_Nq4&callback=initMap">
                </script>

                
                
                
                
                
            </div>
        </section>
        
        <!-- Section D -->
        <section id="section-d" class="grid">
            <div class="box">
                <h2 class="content-title">Contact</h2>
                <div class="contact-wrapper">
                   
                    <div class="company-info">
                        <h3>Pickles & Mayo</h3>
                        <ul>
                            <li><a href="mailto:versefriet@picklesenmayo.nl"><i class="fa fa-envelope"></i>  pickles&mayo@test.nl</a></li>
                            <li><i class="fa fa-phone"></i> 0651426182</li>
                            <li><i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/PicklesenMayo/" target="_blank">Facebook</a></li>
                        </ul>
                    
                    </div>
                    <div class="contact-form">
                        <h3>Email ons</h3>
                        <form method="post" action="send.php">
                            <p>
                                <label>Naam</label>
                                <input type="text" name= "name" placeholder="Naam">
                            </p>
                            <p>
                                <label>E-mailadres</label>
                                <input type="email" name= "email" placeholder="email">
                            </p>
                            <p>
                                <label>Telefoonnummer</label>
                                <input type="tel" name= "number" placeholder="telefoon">
                            </p>
                            <p class="full">
                                <label>Bericht</label>
                                <textarea name= "massage" rows= "5"></textarea>
                            </p>
                            <p class ="full">
                                 <button>Verstuur<?php if(isset($_POST['message_send'])){echo 'd!';}  ?></button>
                            </p>
                        </form>
                    </div>
                    
                </div>
                
                
                
                
                
            </div>
            <div class="box">
                <h2 class="content-title">Over ons</h2>
                <div class="over-ons">
                    <p>U kunt ons tegenkomen op festivals en evenementen door heel Nederland en Belgie.
                    Wij zijn te boeken voor bedrijfsevenementen, beurzen en partijen.
                    </p>
                    <img src="img/img1.jpg" alt="">
                    <br>
                    <p>
                    Een keer iets anders?

                    Neem dan een kijkje bij onze Aziatische foodtruck STOOM. Daar presenteren wij Dim Sum.
                    </p>
                </div>
            </div>
        </section>
        
    </main>
    
    <!-- Footer -->
    <footer id="main-footer" class="grid">
        <div>Coen Walter - <?php echo date("Y"); ?></div>
        
    </footer>
  </body>
</html> 