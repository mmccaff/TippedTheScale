<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TippedTheScale | Ask Question</title>
    <meta name="description" content="">
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
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="active"><a href="<?php echo base_url(); ?>ask">Ask</a></li>
              <li><a href="<?php echo base_url(); ?>answer">Answer</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

 <div class="container">

 <form id="askForm" class="form-horizontal" method="post" action="<?php echo base_url() . "ask/save"; ?>">
  <fieldset>
    <h2>Let's do this... </h2>
    <hr>
          <div class="control-group">
            <label class="control-label" for="question">Your question</label>
            <div class="controls">
              <input name="question" type="text" id="question" placeholder="Which shoes look better on me?" maxlength="100">
              <span class="help-inline"></span>
              <p class="help-block">Ask a question that can be answered by selecting Image A or Image B.</p>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="option_a">Link to Image A</label>
            <div class="controls">
              <input name="option_a" type="text" id="option_a" maxlength="220" placeholder="http://www.somewhere.com/images/redshoes.jpg">
              <span class="help-inline"></span>
              <p class="help-block">
              Use <a href="http://www.imgur.com" target="imgur">imgur</a> if you need to upload and get a link to
              an image.
              </p>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="option_b">Link to Image B</label>
            <div class="controls">
              <input name="option_b" type="text" id="option_b" maxlength="220" placeholder="http://www.somewhere.com/images/blackshoes.jpg">
              <span class="help-inline"></span>
              <p class="help-block">
              Use <a href="http://www.imgur.com" target="imgur">imgur</a> if you need to upload and get a link to
              an image.
              </p>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="results_timer_minutes">Allow results to be seen</label>
            <div class="controls">
              <select name="results_timer">
                <option value=0 selected>always</option>
                <option value=5>after 5 minutes</option>
                <option value=15>after 15 minutes</option>
                <option value=30>after 30 minutes</option>
                <option value=60>after 1 hour</option>
                <option value=240>after 4 hours</option>
                <option value=480>after 8 hours</option>
                <option value=720>after 12 hours</option>
                <option value=1440>after 24 hours</option>
                <option value=10080>after 1 week</option>
              </select>
              <p class="help-block">
              The total counts can be viewed from the page where the question is asked, either all the time or only
              after this much time has elapsed.
              </p>
            </div>
          </div>

          <div class="form-actions">
            <button class="btn btn-primary" id="askButton">Ask this</button>
          </div>

    </fieldset>
    </form>
    
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-collapse.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

          $(':text').each(function(i) {
            $(this).focus(function() {
              $(this).closest('.control-group').removeClass('error');
              $(this).next('.help-inline').html('');
            })
          });

          $('#askButton').click(function(){
             valid = 1;

             $(':text').each(function(i) {
                if (!$.trim($(this).val()).length)
                {
                  valid = 0;
                  thisValid = 0;
                  $(this).closest('.control-group').addClass('error');
                  $(this).next('.help-inline').html('You forgot to fill this out.');
                }
                else
                {
                  thisValid = 1;
                  $(this).closest('.control-group').removeClass('error');
                  $(this).next('.help-inline').html('');
                }

                if (!thisValid) 
                  return true;
                
                fieldName = this.name;
                if (fieldName.match(/^option/))
                {
                  fieldValue = $.trim($(this).val());
                  if (!fieldValue.match(/jpe?g|png|gif$/) || !fieldValue.match(/^http/))
                  {
                    valid = 0;
                    thisValid = 0;
                    $(this).closest('.control-group').addClass('error');
                    $(this).next('.help-inline').html('Must be a link to a .jpg, .jpeg, .png or .gif file.');
                  }
                  else
                  {
                    thisValid = 1;
                    $(this).closest('.control-group').removeClass('error');
                    $(this).next('.help-inline').html('');
                  }
                }

             });
          
             if (valid)
             {
                $('#askForm').submit();
             }
             
             return false;

           });
        });

    </script>

  </body>
</html>

