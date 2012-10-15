<h1><?php echo $template->label ?></h1>

<div class="tasks"><?php echo link_to('generar', 'templates/' . $template->id . '/generate.html', array('class' => 'button')) ?></div>

<pre class="latex"><?php echo $template->content ?></pre>