<?php 


function getMenu(string $type): array
{

    $menu = [];

    $isValid = validateMenuType($type);

    if ($isValid) {
        if($type === "header"){
            $menu = [
                "home" => [
                    "path" => "index.php",
                    "name" => "Home",
                ],
                "about" => [
                    "path" => "about.php",
                    "name" => "About Us",
                ],
                "services" => [
                    "path" => "services.php",
                    "name" => "Services",
                ],
                "contact" => [
                    "path" => "contact.php",
                    "name" => "Contact Us",
                ],

            ];
        }
    }

    return $menu;

}

function validateMenuType(string $menuType): bool
{
    $validTypes = [
        "header",
        "footer",
        "main"
    ];

    if (in_array($menuType, $validTypes)) {
        return true;
    } else {
        return false;
    }
}

function printMenu(array $menu)
{
    foreach ($menu as $key => $menuItem){
        echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
    }
}