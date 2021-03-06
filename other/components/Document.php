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
                ($title = new Html\Title(""))
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
            (new Html\Hyperlink("Home",    "/")),
            (new Html\Hyperlink("News",    "/news/")),
            (new Html\Hyperlink("Wiki",    "#")),
            (new Html\Hyperlink("Contact", "#")),
            (new Html\Hyperlink("Photos",  "/photos/")),
            (new Html\Hyperlink("Test",    "/test/"))
        );

        if ($user = User::getCurrentUser()) {
            $userDiv = (new Html\Div())
                ->set("class", "user-container");

            $userDiv->add($user->Username);

            $nav->add($userDiv);
        }

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