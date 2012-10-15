<?php

class templatesActions extends sfActions
{
    public function executeIndex() {
        $this->templates = Doctrine::getTable('template')
            ->createQuery('a')
            ->execute();
    }

    public function executeView(sfWebRequest $request) {
        $this->template = Doctrine::getTable('template')
            ->find($request->getParameter('id'));
        $this->forward404Unless($this->template);
    }

    public function executeGenerate(sfWebRequest $request) {
        $this->template = Doctrine::getTable('template')
            ->find($request->getParameter('id'));
        
//        define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

//        $pdflatex_path = '/usr/bin/pdflatex';
//        $tmp_dir = APPLICATION_PATH . '/tmp';

//        $tpl_dir = APPLICATION_PATH . '/tpl';
//        $tpl_file = 'carta.tex';
//
//        $tpl = file_get_contents("$tpl_dir/$tpl_file");
//
//        $variables_list = array();
//        preg_match_all('/\[\[.*\]\]/', $tpl, $variables_list);
//
//        $tpl = preg_replace('/\[\[(.*)\]\]/', '<span style="background-color:#f4f458;">[[$1]]</span>', $tpl);

        // exec($pdflatex_path . ' -output-directory ' . $tmp_dir . ' ' . $tpl, $b, $c);
    }
}
