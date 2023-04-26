<?php

/**
 * Summary of namespace Models\Components
 */
namespace Models\Components;

use Exception;

class CarouselComponent extends CarouselDescriptionComponent
{
    /**
     * Carousel item Id
     * @var mixed
     */
    private $id = "";

    /**
     * Carousel slide counter. Check the number of 
     * @var mixed
     */
    private $slideCounter = 0;

    /**
     * Carousel slides. Displays carousel slides in 
     * a list
     * @var mixed
     */
    private $slides = array();

    /**
     * Carousel slide items. Displays the inner carousel
     * items from casousel slide list
     * @var mixed
     */
    private $slideItems = array();

    /**
     * Carousel description flag set to false by default
     * 
     * @var mixed
     */
    private $hasDescription = false;

    private $descriptionItems = array();

    private $active = false;

    /**
     * Set the carousel variation color
     * @var mixed
     */
    private $variant = "";



    /**
     * @return string
     */
    protected function getId()
    {
        if (!empty($this->id)) {
            return $this->id;
        } else {
            throw new Exception("Warning: Carousel id has not been defined");
        }
    }

    /**
     * @param string $Id 
     * @return self
     */
    public function setId(string $Id): self
    {
        $this->id = $Id;
        return $this;
    }

    /**
     * @return array
     */
    protected function getSlides()
    {
        if (count($this->slides)) {
            return $this->slides;
        } else {
            throw new Exception("Warning: Carousel slides have not been defined");
        }
    }

    /**
     * @param array $slides 
     * @return self
     */
    public function setSlides(array $slides): self
    {
        $this->slides = $slides;
        return $this;
    }

    /**
     * @return array
     */
    protected function getSlideItems()
    {
        return $this->slideItems;
    }

    /**
     * @param array $slideItems 
     * @return self
     */
    public function setSlideItems(array $slideItems): self
    {
        $this->slideItems = $slideItems;
        return $this;
    }
    /**
     * @return bool
     */
    protected function hasDescription()
    {
        if (is_bool($this->hasDescription)) {
            return $this->hasDescription;
        } else {
            throw new Exception("Warning: Carousel verify description has not been defined");
        }
    }

    /**
     * @param bool $hasDescription 
     * @return self
     */
    protected function setHasDescription(bool $hasDescription): self
    {
        $this->hasDescription = $hasDescription;
        return $this;
    }

    /**
     * @return bool
     */
    protected function isActive()
    {
        if (is_bool($this->active)) {
            return $this->active;
        } else {
            throw new Exception("Warning: Active status has not been set");
        }
    }

    /**
     * @param bool $active 
     * @return self
     */
    protected function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Summary of passCarouselDescriptionParams
     * @param array $item
     * @return void
     */


    /**
     * @return mixed
     */
    private function getDescriptionItems()
    {
        if (count($this->descriptionItems)) {
            return $this->descriptionItems;
        } else {
            throw new Exception("Warning: Carousel description items have not been set");
        }
    }

    /**
     * @param mixed $descriptionItems 
     * @return self
     */
    private function setDescriptionItems(array $descriptionItems): self
    {
        $this->descriptionItems = $descriptionItems;
        return $this;
    }

    /**
     * Set the carousel variation color
     * @return mixed
     */
    private function getVariant()
    {
        return $this->variant;
    }

    /**
     * Set the carousel variation color
     * @param mixed $variant Set the carousel variation color
     * @return self
     */
    public function setVariant($variant): self
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * Summary of cleardescriptionItems
     * @return void
     */
    private function clearDescriptionItems()
    {
        $this->descriptionItems = array();
    }

    /**
     * Summary of passToCarouselDescriptionComponent
     * @param array $items
     * @return CarouselComponent
     */
    private function passToCarouselDescriptionComponent()
    {
        foreach (array_keys($this->getdescriptionItems()) as $item) {
            $key = str_replace("-", "", $item);
            $method = "set" . $key;
            if (method_exists($this, $method)) {
                parent::$method($this->getdescriptionItems()[$item]);
            }
        }
        return $this;
    }
    /**
     * Summary of loopslides
     * @return CarouselComponent
     */
    private function loopSlides()
    {
        foreach ($this->getslides() as $slide) {
            if ($this->slideCounter === 0) {
                $this->setActive(true);
                if ($this->isActive()) {
                    echo
                        '<li data-bs-target="#' . $this->getId() . '" data-bs-slide-to="' . $this->slideCounter . '" class="active" aria-current="true"
                        aria-label="' . $slide . '"></li>';
                }
            } else {
                echo
                    '<li data-bs-target="#' . $this->getId() . '" data-bs-slide-to="' . $this->slideCounter . '" aria-label="' . $slide . '"></li>';
            }
            $this->slideCounter++;
        }
        return $this;
    }


    /**
     * Summary of renderDescription
     * @param array $description
     * @return void
     */
    private function renderDescription(array $description)
    {
        $this->cleardescriptionItems();
        $this->setdescriptionItems($description);
        $this->passToCarouselDescriptionComponent();
        echo ' <!-- Has description: true -->
                            <!-- Carousel Item Description -->';
        parent::render();
    }



    /**
     * Summary of loopslideItems
     * @return CarouselComponent
     */
    private function loopSlideItems()
    {
        foreach ($this->getslides() as $slide) {
            $item = $this->getslideItems()[$slide];
            $this->setHasDescription($item["has-description"]);
            $this->setActive($item["active"]);
            if ($this->isActive()) {
                echo '<div class="carousel-item active">
                         <!-- Carousel item active -->
                            <img src="' . $item["img-url"] . '" class="w-100 d-block" alt="' . $slide . '">';
                if ($this->hasDescription()) {
                    $this->setCarouselDescriptionType($item["description-type"]);
                    $this->renderDescription($item["description"]);
                }
                echo '</div>';
            } else {
                echo '<!-- Carousel Item -->
                        <div class="carousel-item">
                            <!-- Carousel Image -->';
                echo '<img src="' . $item["img-url"] . '" class="w-100 d-block" alt="' . $slide . '">';
                if ($this->hasDescription()) {
                    $this->setCarouselDescriptionType($item["description-type"]);
                    $this->renderDescription($item["description"]);
                } else {
                    echo '<!-- Has description: false -->';
                }
                echo '</div>';
            }
        }
        return $this;
    }


    /**
     * Summary of render
     * @return CarouselComponent
     */
    protected function render()
    {
        echo '
        <!-- Carousel Id -->
        <div id="' . $this->getId() . '" class="carousel slide ' . $this->getVariant() . '" data-bs-ride="carousel">
                <ol class="carousel-indicators">';
        $this->loopslides();
        echo '</ol>';
        echo '<div class="carousel-inner" role="listbox">';
        $this->loopslideItems();
        echo '</div>';
        echo '
         <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#' . $this->getId() . '" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#' . $this->getId() . '" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        ';
        echo '</div>';
        return $this;
    }



}