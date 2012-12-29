<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>framework - php</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <?php
        add_css(array('librarys/bootstrap', 'layouts/layout'));
        show_css();
        add_js('librarys/jquery','top');
        show_js('top');
        ?>
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
                    <a class="brand" href="index">framework em php</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php
                            foreach ($menu as $item):
                                echo "<li ><a href=\"" . base_url($item['id']) . "\">" . ($item['titulo']) . "</a></li>";
                            endforeach;
                            ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="span12">
                <?php echo $content;
                 
                ?>

            </div>

            <div class="clearfix"></div>
            <hr>

            <footer>
                <p>MVC 2012</p>
            </footer>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
       <?php 
       
       echo show_js();
       ?>
        
    </body>
</html>