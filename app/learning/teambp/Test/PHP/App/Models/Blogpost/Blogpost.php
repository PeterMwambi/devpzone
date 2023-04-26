<?php

namespace App\Models\Blogpost;

/**
 * @author Peter Mwambi
 * @content Blogpost Class
 */

class Blogpost
{

    /**
     * @var string $Blog__author
     * The authors full name
     */
    private $Blog__author;

    /**
     * @var string $Blog__author__firstname
     * The authors firstname;
     */
    private $Blog__author__firstname;
    /**
     * @var string $Blog__author__lastname
     * The authors lastname
     */
    private $Blog__author__lastname;
    /**
     * @var string $Blog__author__username
     * The authors username
     */
    private $Blog__author__username;
    /**
     * @var string $Blog__title
     * The blog title
     */
    private $Blog__title;
    /**
     * @var string $Blog__datePublished
     * The date when the blog was published
     * format d, dd/mm/yy
     */
    private $Blog___datePublished;
    /**
     * @var string $Blog__timePublished
     * The time when the blog was published
     * format hh:mm AM/PM
     */
    private $Blog__timePublished;
    /**
     * @var string $Blog__topic
     * The topic category of the blog
     * Example Computer Science, Health & Lifestyle, Religion
     */
    private $Blog__topic;

    /**
     * @var $Blog__heading
     * The heading of the blog.
     * Example: The data link Layer in the OSI Model
     */
    private $Blog__heading;
    /**
     * @var string $Blog__coverImage
     * The cover image of the blog. Placed on the blog header 
     */
    private $Blog__coverImage;
    /**
     * @var string $Blog__content
     * The body of the blog. Consist of images, paragraphs e.t.c
     */
    private $Blog__content;
    /**
     * @var mixed $Blog__content__images
     * May be an array or string. Consist of images that will be 
     * placed on the body of the Blog
     */
    private $Blog__content__images;

}