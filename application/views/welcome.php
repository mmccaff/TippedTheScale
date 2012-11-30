<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TippedTheScale | A/B Testing for Images</title>
    <meta name="description" content="TippedTheScale is A/B testing for images. Crowdsource your decisions.">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>">TippedTheScale</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>ask">Ask</a></li>
              <li><a href="<?php echo base_url(); ?>answer">Answer</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">


    <div class="hero-unit">

        <h1>Can't decide? Just ask.</h1>
        <p>
          Provide a question, two images, and get a shareable link where people can pick one image or the other.
          Use the results as a data point to help tip the scale of your indecision. 

          <br><br>
           
        </p>
        <p><a class="btn btn-primary btn-large" href="ask">Just Ask &raquo;</a></p>
        <em><?php echo $maxQuestionId ?> questions asked to date.</em>
    </div>


    

    <!-- Example row of columns -->
    <div class="row">
      <div class="span4">
       
        <h2>Photographers</h2>
         <p>
           Which angle is more flattering? <br>
           Which composition do you prefer? <br>
           Which post-processing technique looks better? <br>
         </p>
      </div>
      <div class="span4">
        <h2>Designers</h2>
         <p>
           Which logo looks more elegant?<br>
           Which button would you be more likely to click?<br>
           Which font is easier for you to read?<br>
         </p>
     </div>
      <div class="span4">
        <h2>Everyone</h2>
        <p>
          Which wedding invitations would you imagine getting from me?<br> 
          Which shoes are a better match for my dress?<br> 
          Which dress looks like a better fit?<br>
        </p>
      </div>
    </div>

    <hr>

    <footer>
      <p>&copy; 2012 <a href="http://www.mattmccaffrey.com">Matt McCaffrey</a>
    </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-collapse.js"></script>

  </body>
</html>
