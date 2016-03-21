<?php
/**
 * Page class
 */
class page_tweet extends Page
{
    public $title='Tweet';

    /**
     * Initialize the page
     *
     * @return void
     */
    function init()
    {
        parent::init();

        $this->app->stickyGet('id');

        $t = $this->add('View_Tweet');

        $m = $this->add('Model_Tweet')->load($this->app->stickyGet('id'));
        $t->setModel($m);

    }
}
