<!DOCTYPE html>

<html>
    <head>
        <title>Home Page: tarotbypoonam</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Della+Respira&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Martel:wght@600&display=swap');
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
              margin: 0;
            background-color: 	hsla(272, 37%, 34%, 0.9);
            }
            
            body::-webkit-scrollbar{
                display: none;
            }
            .container {
              max-width: 1100px;
              margin: auto;
              overflow-x: hidden;
              padding: 0 2rem;
            }
        
            .main-header {
              height: 80vh;
            margin-bottom: 5vh;    
            }
            
            .img-header{
                background-image: url('view_home_header_image.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 90vh;
                opacity: 0.95;
                filter: brightness(0.5);
            }
            
            .header-text{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }

            .main-header h1 {
                margin-top: 18%;
              font-size: 8vw;
            text-align: center;
              line-height: 1.2;
              color: white;
              font-family: 'Alex Brush', cursive;
            }

            .header-text p {
              font-size: 3.6vw;
                text-align: center;
                color: white;
                font-family: 'Alex Brush', cursive;
            }
            .more-stuff-grid {
                margin: 3rem 0;
              background: #f1f1f1;
                border: round;
              padding: 4em 0;
              display: grid;
              grid-gap: 2em;
              align-items: center;
                justify-content: center;
              grid-template-columns: repeat(2, minmax(200px, 400px));
                border-radius: 2em;
                overflow-x: hidden;
            }
            
            img{
                width: 100%;
            }
            
            .more-stuff-grid:nth-child(even) img {
                order: 2;
            }
            
            .more-stuff-grid h3 {
              margin-bottom: 2rem;
                text-align: center;
                font-weight: bolder;
                font-family: 'Della Respira', serif;
            }
            
            .more-stuff-grid p{
                font-family: 'Martel', serif;
            }
            
            .fade-in {
                  opacity: 0;
                  transition: opacity 250ms ease-in;
                }

                .fade-in.appear {
                  opacity: 1;
                }

            .from-left {
              /*grid-column: 1 / 5;*/
              -webkit-transform: translateX(-25%);
              transform: translateX(-25%);
               box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
            }

            .from-right {
              -webkit-transform: translateX(25%);
              transform: translateX(25%);
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
            }

            .from-left,
            .from-right {
              transition: opacity 250ms ease-in, transform 400ms ease-in;
              transition: opacity 250ms ease-in, transform 400ms ease-in;
              transition: opacity 250ms ease-in, transform 400ms ease-in,
                -webkit-transform 400ms ease-in;
              opacity: 0;
            }

            .from-left.appear,
            .from-right.appear {
              -webkit-transform: translateX(0);
              transform: translateX(0);
              opacity: 1;
            }
            
            footer{
                overflow-y: hidden;
            }


            @media(max-width:600px) {
              .more-stuff-grid {
                display: block;
              }
                .more-stuff-grid > img, .more-stuff-grid > div{
                    padding: 1em;
                }
                
                .main-header{
                    height: 75vh;
                }
            }

        </style>
    </head>
    <body>
        <header class="main-header">
            <div class="img-header"></div>
            <div class="header-text">
                    <?php include 'view_NavBar.php'; ?>
                  <h1>Tarotbypoonam</h1>
                  <p>
                    We bring good things to life
                  </p>
            </div>
    </header>
        <main class="container mt-5">
          <!--<div class="home-more-stuff">-->
            <div class="more-stuff-grid slide-in from-left">
              <img
                src="Allabouttarot_image.jfif"
                alt=""
              />
                <div>
                    <h3>All about Tarot Cards</h3>
                    <p >
                    The Tarot is a deck of 78 cards, each with its own imagery, symbolism and story. The 22 Major Arcana cards represent life's karmic and spiritual lessons, and the 56 Minor Arcana cards reflect the trials and tribulations that we experience on a daily basis.Tarot is the way to use the cards to access your intuition and your inner wisdom. The imagery in the cards give you instant access to your subconscious mind and your intuition. And from this place of inner power and wisdom, you can discover how to make positive changes now so you can manifest your goals and your dreams in the future.
                  </p>
                </div>
            </div>
            <div class="more-stuff-grid slide-in from-right">
                <img
                src="Appointment_image.jfif"
                alt=""
              />
                <div>
                    <h3>Make an Appointment</h3>
                    <p >Want to know about what your intuituion or your wisdom says. Book an appointment 
                        to know about what your subconscious minds says to you. Also, does your subconscious mind is gonna bring fortune for you or else it is trying to make you aware about the upcoming certanities(circumstances) in your life. Book an apointment with me by giving your name, phone, date and time and get ready to have an answers to all of your questions and know about your soul.
                    </p>
                </div>
            </div>
            <div class="more-stuff-grid slide-in from-left">
              <img
                src="home_shop_crystals.jpg"
                alt=""
              />
                <div>
                    <h3>Shop for crystals and gems</h3>
                    <p >
                        Do you know different types of materials have a vast effects on our souls, because the auora of our body when interacts with different materials or matter they react corespondingly. Hence, shop the crystals from my site in cheaper price and keep in your house to attract the positive enegries and get rid of negative thoughts and negativity from your body. Shop the products in the cheaper price compared to market with 100% real stones.
                    </p>
                </div>
            </div>
            <div class="more-stuff-grid slide-in from-right">
                <img
                src="Feedback_image.jfif"
                alt=""
              />
                <div>
                    <h3>Give feedback about your session</h3>
                    <p>
                        Did you like the session? or do you want to know how people feel after their session with Poonam. You can see the feedbacks about the people who had an session with poonam and about what they have experienced after the follwoing the spritual healing guided by poonam. If you have attend the session, any of your feedback will be welcomed also if you are unsatisfied with session, book you next session for free by just giving your feedback and after the response of the poonam to your feedback.
                    </p>
                </div>
              
            </div>
            <div class="more-stuff-grid slide-in from-left">
              <img
                src="home_tarot_photos.jpg"
                alt=""
              />
                <div>
                    <h3>Search for tarot picture for your wallpaper</h3>
                    <p >
                       If you are intrested in knowing about the tarots in detail, if you found the tarot cards attractive to you, or you want to look into tarot cards in detail have look on our photos page where you can find the high quality images of tarot not only this, if you want to have look on any other images of different type just search into the search bar and find some of the awesome pictures and download it in your local storage. 
                    </p>
                </div>
              
            </div>
            <div class="more-stuff-grid slide-in from-right">
                <img
                src="about_us_img.jpg"
                alt=""
              />
                <div>
                    <h3>About US</h3>
                    <p >
                        Tarotbypoonam is one of the finest and unique site on the internet where the user can book their appointment and may get the answers to their questions. This site will help the user to make an appointment with the astrologer poonam through an appointment page, also the user can shop the healing stones and crystals for their own perks and benefits in the best deal. Moreover, this site also have the photos page where the user can download the image for their own interest. Please keep your information upto date for your own interest.
                    </p>
                </div>
              
            </div>
    </main>
    </body>
    <footer class="text-center footer" style="background-color: #551A8B;" >
        <p class="text-white my-auto">Thompson Rivers University | Advance Web development | TarotbyPoonam 2021 &copy; All Rights Reserved</p>
    </footer>
    <script>
        const faders = document.querySelectorAll(".fade-in");
        const sliders = document.querySelectorAll(".slide-in");

        const appearOptions = {
          threshold: 0,
          rootMargin: "0px 0px -250px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(
          entries,
          appearOnScroll
        ) {
          entries.forEach(entry => {
            if (!entry.isIntersecting) {
              return;
            } else {
              entry.target.classList.add("appear");
              appearOnScroll.unobserve(entry.target);
            }
          });
        },
        appearOptions);
        
        faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

        sliders.forEach(slider => {
          appearOnScroll.observe(slider);
        });

    </script>
</html>