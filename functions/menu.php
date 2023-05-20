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