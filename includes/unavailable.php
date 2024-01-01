<html>
  <head>
    <title>Unavailable</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Dancing+Script&family=Josefin+Sans:wght@300&family=Montserrat:wght@300&display=swap");
      body {
        min-height: 100vh;
        font-family: "Montserrat", sans-serif;
      }
      a {
  text-decoration: none;
  color: inherit;
}
.flexible {
  display: flex;
  flex-direction: column;
}
div.fixed {
  position: fixed;
  bottom: 0%;
  right: 0%;
  width: 15%;
  height: 7vh;
  z-index: 1;
}
.fixed > button {
  border-style: none;
  margin: auto;
  bottom: 0%;
  width: 100%;
  right: 0%;
  font-size: 16px;
  background-color: #ffd000;
  font-weight: bolder;
}
.navbar {
  border: none;
  display: flex;
  flex-flow: row wrap;
  justify-content: flex-end;
  background-image: linear-gradient(to bottom right, #968f8f, #202120);
  font-family: Josefin Sans;
  font-weight: bolder;
  font-size: 18px;
  opacity: 0.8;
  overflow: hidden;
  position: sticky;
  width: 100%;
}
.navbar a {
  text-decoration: none;
  color: #f2ff00;
}
.menu {
  padding: 20px;
  text-align: center;
}
.menu:nth-child(1) {
  flex-grow: 7;
  justify-content: flex-start;
}
.menu:not(:first-child):hover {
  background-color: #221d1d;
}

      .container {
        width: 380px;
        padding: 10;
        margin: 5% auto 10% auto;
        -ms-box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.25);
        box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.25);
        position: releative;
        overflow: hidden;
        font-family: "Montserrat", sans-serif;
      }

      .logo-container {
        margin: 0;
        padding: 0;
        width: 100%;
        display: block;
        position: relative;
        height: 260px;
        overflow: hidden;
      }

      .header {
        position: absolute;
        margin-top: 40px;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-image: url("https://cnet3.cbsistatic.com/img/Yt768C55hXNi2eGSB9qOv-e7SQg=/2011/03/16/c7675aa8-fdba-11e2-8c7c-d4ae52e62bcc/Chrome-logo-2011-03-16.jpg");
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
      }

      .message {
        margin: 0;
        padding: 20px 0 40px 0;
        text-align: center;
      }

      h1 {
        line-height: 1.25;
        font-family: "Montserrat", sans-serif;
      }

      p {
        margin-top: 20px;
        font-size: 16px;
        font-family: "Montserrat", sans-serif;
      }
      .error-image {
        max-width: 720px;
        width: 90%;
        margin: auto;
        text-align: center;
      }

      .error-image h1 {
        font-size: 120px;
        margin: 48px auto 20px;
      }
      footer ul {
  list-style-type: none;
}
footer {
  width: 100%;
  background-color: #000000;
  min-height: 100px;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  box-sizing: border-box;
}

.footer_col {
  flex-basis: 25%;
  padding: 0 1%;
  box-sizing: border-box;
}
@media screen and (max-width: 700px) {
  footer {
    flex-flow: column wrap;
  }
  .footer_col {
    flex-basis: 100%;
  }
}
.footer_col h4 {
  font-size: 18px;
  color: rgb(255, 255, 255);
  margin-bottom: 30px;
  font-weight: bolder;
  box-sizing: border-box;
  position: relative;
}

.footer_col h4::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -10px;
  background-color: #ff0000;
  width: 50px;
  height: 2px;
  box-sizing: border-box;
}

.footer_col ul li:not(:last-child) {
  margin-bottom: 10px;
}
.footer_col ul li a {
  font-size: 16px;
  text-transform: capitalize;
  color: #b9b9b9;
  text-decoration: none;
  display: block;
  transition: all 0.3s ease;
}
.footer_col ul li a:hover {
  color: #ffffff;
  padding-left: 8px;
}
.footer_col img {
  height: 25vh;
  width: 60%;
  padding-left: 10%;
  display: flex;
  justify-content: center;
  align-items: center;
}
    </style>
  </head>
  <body>
      <div class="flexible>">
        <!--<div class="fixed"><button>BOOK<br>APPOINTMENT!</button></div>-->
        <div class="navbar">
            <div class="menu">
                <!--<img src="M_logo.png" id="icon">-->
            </div>
            <div class="menu"><a href="HOME.html">Home</a></div>
            <div class="menu"><a href="#menu1">About Us</a></div>
            <div class="menu">
                <a href="OUR_CENTRES.html" target="_blank">Our Centres </a>
            </div>
            <div class="menu">
                <a href="#Our_Services">Our Services</a>
            </div>
            <div class="menu"><a
                    href="https://www.iciciprulife.com/term-insurance-plans/iprotect-smart-term-insurance-calculator.html?UID=1240cid=Search:Google::Text::RSA::DM:iPS:::IPRU-Search-Competition_LIC-EM-RX-Desktop-1240:::New-RSA-iProtectSmart-LifeCover-PremWaiver-12Dec2021:::1240&&keyword=lic%20life%20insurance&matchtype=e&gclid=CjwKCAjwh-CVBhB8EiwAjFEPGTcu_iNmXXGajuY-uXXTtqPoDFgHut7TtN1XAE-A82ibYciQPOERqRoCXLgQAvD_BwE&gclsrc=aw.ds">Insurance</a>
            </div>
            <div class="menu"><a href="https://mvkhospital.wordpress.com/2022/07/01/hello-world/">Blog</a></div>
            <div class="menu"><a href="http://localhost/EPHARMACY/contactform.php/">Contact Us</a></div>
        </div>
       </div> 
    <section class="container">
      <div class="content">
        <div class="logo-container">
          <div class="header">
            <div class="error-image">
              <h1>👨‍🔧</h1>
            </div>
          </div>
        </div>
        <div class="message">
          <h1>We're working on this account now!</h1>
          <p>Please check back shortly 👌</p>
        </div>
      </div>
    </section>
    <footer>
        <div class="footer_col">
            <h4>Patient Care</h4>
            <ul>
                <li><a href='http://localhost/EPHARMACY/book.php'>Book Appointment</a></li>
                <li><a href='http://127.0.0.1:5500/oc.html'>Consult Online</a></li>
                <li><a href='http://localhost/EPHARMACY/user.php'>ACCOUNTS</a></li>
                <li><a href='http://127.0.0.1:5500/admin.html'>Get Lab Results</a></li>

            </ul>
        </div>
        <div class="footer_col">
            <h4>News and Media</h4>
            <ul>
                <li><a href='https://mvkhospital.wordpress.com/2022/07/01/hello-world/'>Blog</a></li>
                <li><a href='https://www.healthline.com/health-news'>News</a></li>
                <li><a href='#'>Reviews</a></li>
                <li><a href='https://www.who.int/health-topics/coronavirus#tab=tab_1'>Covid 19</a></li>

            </ul>
        </div>
        <div class="footer_col" id="contact">
            <h4>Contact Us</h4>
            <ul>
                <li><a href='#'>
                        <p>
                            <a href="tel:044 6251 6004">Call: 044 6251 6004</a>
                        </p>
                    </a></li>
                <li><a href='#'>
                        <p>
                            <a href="mailto:hospitalsmvk@gmail.com" ">
                                    Mail: <span style=" text-transform:lowercase;">hospital@hospital.co.in</span>
                            </a>
                        </p>
                    </a></li>
                <li><a href='http://localhost/EPHARMACY/contactform.php/'>Helpline</a></li>
                <li><a href='http://localhost/EPHARMACY/contactform.php/'>Feedback</a></li>

            </ul>
        </div>
        <div class="footer_col">
            <ul>
                <li><a href='#'><img src="newlogo.gif"></a></li>
            </ul>
        </div>

    </footer>
  </body>
</html>
