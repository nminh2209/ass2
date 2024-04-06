<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homepage for I.T job recruitment website">
    <meta name="keywords" content="job, I.T, recruitment, recruit">
    <meta name="author" content="Le Gia Hoang An">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Enhancements</title>
</head>
<body class="bodycuaan">
<?php include 'header.inc'; ?>

    <div id="container-cuaan">
        <div class="section-cuaan">
            <div id="topPhrase">
                <p>
                    Enhancements
                </p>
            </div>  
        </div>
        </div>
        <section class="section-cuaan">
            <div class="container-cuaminh">
              <div class="section_header">
                <h2 class="section_header_title">Our Enhancements</h2>
                <a href="" class="section_header_link">See More &nbsp; &rarr;</a>
              </div>
            </div>
    
              <div class="features">
                <div class="featured_card">
                  <img src="images/anhnghe1.jpg" alt="" class="featured_img" />
    
                  <div class="card_body">
                    <h3 class="featured_title">Responsive Website</h3>
                    <p class="featured_p">
                      In this website, the media screen based on the browser's width has been divided into three levels: 1200px, 800px, and 600px. Each level has different code implemented, resulting in changes in various features of the website. For example, if the max width has reached 1200 pixels, the top and bottom padding of the top phrase will be significantly reduced, so that it fits with the background image that can be resized based on the web browser's width. The feature in CSS would be seen as "@media screen and (max-width: n px)"
                    <br/> Hence, this feature allowed the website to be responsive</p> 
                  </div>
                </div>
                </div>
            
            <div class="featured_card">
                <img src="images/anhnghe2.jpg" alt="" class="featured_img" />
                <div class="card_body">
                  <h3 class="featured_title">This Box for short descriptions and so on</h3>
                  <p class="featured_p ">
                    The box, hover, and some subtle transitions</p>
                    <p class="penhan"> Heres the example we use transition to add transition effect for smooth animation
                        <br>also transform to  move the text upward by 5 pixels <br/> with the edition of text-shadow to make it look more smoth
                       </p>
              </div>
              </div>
        </section>
    
        <?php include 'footer.inc'; ?>
                
</body>
</html>