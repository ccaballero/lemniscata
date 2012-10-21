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

        $tpl = $this->template->content;
        $variables_list = array();
        preg_match_all('/\[\[.*\]\]/', $tpl, $variables_list);

        $this->tpl = preg_replace('/\[\[(.*)\]\]/', '<span class="highlight">[[$1]]</span>', $tpl);
    }

    public function executeGenerate(sfWebRequest $request) {
        $this->template = Doctrine::getTable('template')
            ->find($request->getParameter('id'));
        $this->forward404Unless($this->template);

        $job_number = sha1($this->template->id);

        $tmp_dir = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . 'tmp';
        $pdflatex_path = sfConfig::get('app_pdflatex');

        $tex_file = $tmp_dir . DIRECTORY_SEPARATOR . $job_number . '.tex';
        $pdf_file = $tmp_dir . DIRECTORY_SEPARATOR . $job_number . '.pdf';

        $fp = fopen($tex_file, 'w');
        fwrite($fp, $this->template->content);
        fclose($fp);

        exec($pdflatex_path . ' -output-directory ' . $tmp_dir . ' ' . $tex_file);

        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);

        $this->forward404Unless(file_exists($pdf_file));

        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->setHttpHeader('Pragma: public', true);
        $this->getResponse()->setContentType('application/pdf');
        $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename="' . $this->template->label . '.pdf' . '"');
        
        $this->getResponse()->sendHttpHeaders();
        $this->getResponse()->setContent(readfile($pdf_file));

        return sfView::NONE;
//        $this->redirect('templates/view?id=' . $this->template->id);
    }
}
