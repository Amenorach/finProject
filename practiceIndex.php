<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>My Sample</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="left_side">
                <div class="navigation_link_wrapper active_navigation_link">
                    <a href="index.html">Home</a>
                </div>
                <div class="navigation_link_wrapper">
                    <a href="about.html">About</a>
                </div>
            </div>
            <div class="right_side">
                <div class="brand">
                    <div>ZACHERY ANNANCY</div>
                    <div class="sign_in">
                        <input type="button" value="Sign In">
                    </div>
                    <div class="sign_up">
                        <input type="button" value="Sign Up">
                    </div>
                </div>
            </div>
        </div>

        <div class="content_wrapper">
            <div class="portfolio_items_wrapper">
                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio1.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/crondose.png">

                            <div class="subtitle">Pharmacy One</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio2.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/dailysmarty.png">

                            <div class="subtitle">Pharmacy Two</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio3.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/dashtrack.png">

                            <div class="subtitle">Pharmacy Three</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio4.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/devcamp.png">

                            <div class="subtitle">Pharmacy Four</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio5.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/devtrunk.png">

                            <div class="subtitle">Pharmacy Five</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio_item_wrapper">
                    <div class="portfolio_img_background" style="background-image: url(images/portfolio6.jpg)"></div>

                    <div class="img_txt_wrapper">
                        <div class="logo_wrapper">
                            <img src="images/logos/edutechional.png">

                            <div class="subtitle">Pharmacy Six</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    const portfolioItems = document.querySelectorAll('.portfolio_item_wrapper')

    portfolioItems.forEach(portfolioItem => {
        portfolioItem.addEventListener('mouseover', () => {
            portfolioItem.childNodes[1].classList.add('img_darken');
        })
        portfolioItem.addEventListener('mouseout', () => {
            portfolioItem.childNodes[1].classList.remove('img_darken');
        })
    })
</script>

</html>