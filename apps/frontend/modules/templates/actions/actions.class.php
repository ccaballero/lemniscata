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
}
