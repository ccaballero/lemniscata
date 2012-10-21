<h1><?php echo $template->label ?></h1>

<div class="tasks"><?php echo link_to('generate', 'templates_template_generate', array('id' => $template->id)) ?></div>
<pre class="latex"><?php echo $sf_data->getRaw('tpl') ?></pre>

