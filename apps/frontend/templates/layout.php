<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header"><span class="title">lemniscata</span></div>
            <div id="main">
                <div id="nav">
                    <ul>
                        <li><?php echo link_to('∞', 'homepage') ?></li>
                        <li><?php echo link_to('plantillas', 'templates_list') ?></li>
                    </ul>
                </div>
                <div id="content"><?php echo $sf_content ?></div>
            </div>
        </div>
    </body>
</html>
