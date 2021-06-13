<?php

class Document extends Html\Html {
    public $title = "Luxon demo";

    public $head;
    public $body;
    public $main;

    function __construct()
    {
        parent::__construct();

        $this->add(
            ($head = new Html\Head())->add(
                ($title = new Html\Title())
            ),
            ($body = new Html\Body())->add(
                ($header = new Html\Header()),
                ($nav = new Html\Nav()),
                ($main = new Html\Main()),
                ($footer = new Html\Footer())
            )
        );

        $head->add(new Html\Style("/css/common.css"));
        $title->add(new Html\TextRef($this->title));
        $nav->add(
            (new Html\Hyperlink("/"))->add("Home"),
            (new Html\Hyperlink("/news/"))->add("News"),
            (new Html\Hyperlink("#"))->add("Wiki"),
            (new Html\Hyperlink("#"))->add("Contact"),
            (new Html\Hyperlink("/test/"))->add("Test")
        );
        $header->add(
            (new Html\H1())->add(
                new Html\TextRef($this->title)
            )
        );
        $footer->add("Luxon Framework ❤");
        
        $this->head = $head;
        $this->body = $body;
        $this->main = $main;
        $this->footer = $footer;
    }
}