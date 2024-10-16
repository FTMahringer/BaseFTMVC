<?php

class Navbar {
    private array $items = [];
    private string $brand;
    private string $logo;

    public function __construct(string $brand, string $logo = '') {
        $this->brand = $brand;
        $this->logo = $logo;
    }

    public function addItem(NavbarItem $item): void {
        $this->items[] = $item;
    }

    public function render(string $currentRoute): string {
        $logoHtml = $this->logo ? "<img src='" . BASEURL . "{$this->logo}' alt='Logo' class='navbar-logo'>" : '';

        $html = "<nav class='navbar'>
                    <div class='navbar-left'>
                        $logoHtml
                        <div class='navbar-brand'>{$this->brand}</div>
                    </div>
                    <div class='navbar-burger' id='burger'>
                        <span></span><span></span><span></span>
                    </div>
                    <ul class='navbar-menu' id='navbarMenu'>";

        foreach ($this->items as $item) {
            $html .= $item->render($currentRoute);
        }

        $html .= "</ul></nav>";
        return $html;
    }
}
