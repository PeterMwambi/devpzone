<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\Widgets\Classes\Carousel;

function carouselComponent()
{
    $carousel = new Carousel;
    return $carousel;
}

function runHeaderCarouselSetup()
{
    //controlled by backend
    //Allow permanent deletion of header slide items
    //Show preview on home page
    $data = [
        Url::getReference("resources/assets/images/png/edited/png/header-image-1.png"),
        Url::getReference("resources/assets/images/png/edited/png/web-design.png"),
        Url::getReference("resources/assets/images/png/edited/png/graphic-design.png")
    ];
    $carouselSlides = [];

    foreach ($data as $count => $slides) {
        array_push($carouselSlides, $count);
    }
    $keys = $carouselSlides;
    $slideItems = [];
    $x = 0;
    foreach ($carouselSlides as $key => $value) {
        if ($carouselSlides[$key] === 0) {
            $carouselSlides[$key] = array(
                "img-url" => $data[$key],
                "active" => true,
                "has-description" => false,
            );
            array_push($slideItems, $carouselSlides[$key]);
            continue;
        } else {
            $items = array(
                "img-url" => $data[$key],
                "active" => false,
                "has-description" => false,
            );
            array_push($slideItems, $items);
        }

        $x++;
    }
    // print_r($slideItems);
    // die;
    $carousel = new Carousel;
    $carousel->setVariant("carousel-dark");
    $carousel->setId("devpzone__carousel-header");
    $carousel->setSlides($keys);
    $carousel->setSlideItems($slideItems);
    $carousel->runSetup();
}