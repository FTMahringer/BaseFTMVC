<?php

class NavbarItem {
    private string $label;
    private string $link;
    private bool $isActive;

    public function __construct(string $label, string $link, bool $isActive = false) {
        $this->label = $label;
        $this->link = $link;
        $this->isActive = $isActive;
    }

    public function render(string $currentRoute): string {
        $activeClass = ($currentRoute === $this->link) ? 'active' : '';
        return "<li class='navbar-item $activeClass'><a href='" . BASEURL . "{$this->link}'>{$this->label}</a></li>";
    }
}