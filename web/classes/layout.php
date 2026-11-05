<?php

class Layout {
    private string $pageTitle;
    private array $navItems;
    private string $url;

    // Initialize with a dynamic page title and navbar items
    public function __construct(string $pageTitle, string $url, string $linkName) {
        $this->pageTitle = $pageTitle;
        $this->url = $url;
        if($linkName === "Profile") {
            $this->navItems = [
                'Home'    => "$url/index.php",
                'World Map' => "$url/map.php",
                'About'   => "$url/about.php",
                'Search'  => "$url/search.php",
                'Profile' => "$url/profile.php"
            ];
        } else {
            $this->navItems = [
                'Home'    => "$url/index.php",
                'World Map' => "$url/map.php",
                'About'   => "$url/about.php",
                'Search'  => "$url/search.php",
                'Login'   => "$url/login.php"
            ];
        }
    }

    // Render the Header & Navbar
    public function renderHeader(): void {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='{$this->url}/style.css'>
            <link rel='icon' type='image/x-icon' href='{$this->url}/images/worldIcon.png'>
            <title>{$this->pageTitle}</title>
        </head>
        <body>";
        
        $this->renderNavbar();
    }

    // Render the Navbar (Internal Helper)
    private function renderNavbar(): void {
        echo "<div class='w3-top'>
        <div class='w3-bar w3-white w3-padding w3-card' style='letter-spacing:4px;'>
          <a href='{$this->url}/index.php' class='w3-bar-item w3-button'><img src='{$this->url}/images/NTlogo.png' height='50px'></a>
          <!-- Right-sided navbar links. Hide them on small screens -->
          <div class='w3-right w3-hide-small'>";
        foreach ($this->navItems as $name => $link) {
            echo "<a href='{$link}' class='w3-bar-item w3-button'>{$name}</a>";
        }
        echo "</div></div></div><div class='w3-container' style='margin-top:100px'>";
    }

    private function renderContent(): void {
        // Placeholder for content rendering logic
    }

    // Render the Footer
    public function renderFooter(): void {
        echo "</div>
        <div class='w3-bottom'>
            <div class='w3-bar w3-white w3-padding w3-card'>
                Copyright Software Engineering 2026 &copy;
            </div>
        </div>
        </body>
        </html>";
    }
}
