<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
            .container {
               width: 960px;
               margin: 0 auto;
            }
            .nav {
                margin-bottom: 5px;
            }
            h1, h2, h3 {
                line-height: 30px;
            }
            .row .span4 {
                margin-left: 20px;
            }

        </style>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>styles/grid.css"/>
        <script type="text/javascript" src="<?php echo base_url() ?>scripts/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>scripts/core.js"></script>
        <script type="text/javascript">
        
        </script>
        <!--[if lt IE 9]>
      <script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
      <![endif]-->
    </head>
    <body>
    <div class="container">
            <ul class="nav nav-tabs">
              <?php if ($this->session->userdata('username')) { ?>
                <li class="active"><a href="<?php echo base_url()?>blog/">Home</a></li>
                <li><a href="<?php echo base_url()?>blog/new_post/">New Blog</a></li>
                <li><a href="#"><?php echo date('d-m-Y') ?></a></li>
                <li class="pull-right"><a href="<?php echo base_url()?>users/logout">Logout</a></li>
                <li class="pull-right"><a href="#">Welcome <?php echo $this->session->userdata('username');?>,</a></li>
                <?php } else { ?>
                <li><?php echo date('d-m-Y') ?></li>
                <?php } ?>
            </ul>
          <div class="hero-unit">
            <h1>Welcome to My Cool Site</h1>
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia dignissimos magnam repellendus excepturi deleniti optio totam rerum ipsam iure iste quod ipsa soluta vero velit enim aliquid animi accusantium neque.</p>
            <p>
              <a class="btn btn-primary btn-large pull-right">
                Learn more
              </a>
            </p>
          </div>  
       
       
        
       
