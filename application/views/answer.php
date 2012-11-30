<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TippedTheScale | Answer Question</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="cache-control" content="no-cache">

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
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>ask">Ask</a></li>
              <li class="active"><a href="<?php echo base_url(); ?>answer">Answer</a></li>
            </ul>
            <p class="navbar-text pull-right">
              <a href="javascript: showResults();">Results</a>
            </p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

    <h2><?php echo $question; ?></h2>

    <h6>Click an image to select it as your answer... </h6>
  
    <hr>

    <div id="questionOptions">
     
      <div id="optionOne" id="span6">
          <a href="javascript: saveAnswer(1);">
            <img src="<?php echo $optionOne; ?>">
          </a>
      </div>

      <div id="optionTwo" id="span6">
          <a href="javascript: saveAnswer(2);">
            <img src="<?php echo $optionTwo; ?>">
          </a>
      </div>
    </div>

    <br>

    </div> <!-- /container -->

    <div id="resultsModal" class="modal fade">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <?php if ($minutesLeft == 0) { ?>
          <h3>The results are in...</h3>
        <?php } else { ?>
          <h3>The results are not yet available...</h3>
        <?php } ?>
      </div>
      <div class="modal-body">
        <p>
          <?php if ($minutesLeft == 0) { ?>
            The first image has <strong><?php echo $optionOneCount; ?></strong> votes, and the second image has 
            <strong> <?php echo $optionTwoCount; ?></strong> votes.
          <?php } else { ?>
            Reload this page in <?php echo $timeUntilResults; ?> to view the results.
          <?php } ?>
        </p>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
      </div>
    </div>

    <form method="post" action="<?php echo base_url() . "answer/save"; ?>" id="voteForm">
      <input type=hidden name="question" id="question" value="<?php echo $id; ?>">
      <input type=hidden name="answer" id="answer" value="">
    </form>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-modal.js"></script>
   
    <script type="text/javascript">

        function saveAnswer(selectedOption)
        {
           $('#answer').val(selectedOption);
           $('#voteForm').submit();
        }

        function showResults()
        {
            $('#resultsModal').modal();
        }

    </script>

  </body>
</html>

