<?php

namespace Models\Components;

use Exception;
use Models\Core\App\Helpers\Formatter;

class NavbarComponent
{


    /**
     * Summary of type
     * @var string
     */
    private $type = "";

    /**
     * Summary of navBarVariation
     * @var string
     */
    private $navBarVariation = "";

    /**
     * Summary of navBarColor
     * @var string
     */
    private $navBarColor = "";

    /**
     * Summary of navBarPositioning
     * @var string
     */
    private $navBarPositioning = "";

    /**
     * Summary of navBarClasses
     * @var string
     */
    private $navBarClasses = "";

    /**
     * Summary of navBrandClasses
     * @var string
     */
    private $navBrandClasses = "";

    /**
     * Summary of navBrandLink
     * @var string
     */
    private $navBrandLink = "";

    /**
     * Summary of navBrandImageUrl
     * @var string
     */
    private $navBrandImageUrl = "";

    /**
     * Summary of navBrandImageClasses
     * @var string
     */
    private $navBrandImageClasses = "";

    /**
     * Summary of isCollapsable
     * @var bool
     */
    private $isCollapsable = true;


    /**
     * Summary of navBarUlClasses
     * @var string
     */
    private $navBarUlClasses = "";

    /**
     * Summary of navItemClasses
     * @var string
     */
    private $navItemClasses = "";

    /**
     * Summary of navItems
     * @var array
     */
    private $navItems = array();

    /**
     * Summary of navLinks
     * @var array
     */
    private $navLinks = array();

    /**
     * Summary of navLinkClasses
     * @var string
     */
    private $navLinkClasses = "";

    /**
     * Summary of separator
     * @var bool
     */
    private $separator = true;

    /**
     * Summary of separatorClasses
     * @var string
     */
    private $separatorClasses = "";

    private $navBarButtons = array();

    /**
     * Summary of buttonContainerClasses
     * @var string
     */
    private $buttonContainerClasses = "";

    /**
     * Summary of buttonClasses
     * @var string
     */
    private $buttonClasses = "";

    /**
     * Summary of buttonColor
     * @var array
     */
    private $buttonColor = array();

    /**
     * Summary of buttonLinks
     * @var array
     */
    private $buttonLinks = array();
    /**
     * Summary of currentPage
     * @var string
     */
    private $currentPage = "";
    /**
     * Summary of dropDownItems
     * @var array
     */
    private $dropDownItems = array();

    /**
     * Summary of dropdownItemClasses
     * @var array
     */
    private $dropdownItemClasses = array();


    /**
     * Summary of dropdownItemLinkClasses
     * @var array
     */
    private $dropdownItemLinkClasses = array();


    /**
     * Summary of dropDownItemsLinks
     * @var array
     */
    private $dropDownItemsLinks = array();

    /**
     * Summary of dropDownItemsId
     * @var array
     */
    private $dropDownItemsId = array();


    /**
     * Summary of navItemIcons
     * @var array
     */
    private $navItemIcons = array();

    /**
     * Summary of navItemIconClasses
     * @var array
     */
    private $navItemIconClasses = array();





    /**
     * @return string
     */
    protected function getNavBarVariation()
    {
        if (!empty($this->navBarVariation)) {
            return $this->navBarVariation;
        } else {
            throw new Exception("Warning: Navbar variation has not been defined");
        }
    }

    /**
     * @param string $navBarVariation 
     * @return self
     */
    public function setNavBarVariation(string $navBarVariation): self
    {
        $this->navBarVariation = $navBarVariation;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavBarColor()
    {
        return $this->navBarColor;
    }

    /**
     * @param string $navBarColor 
     * @return self
     */
    public function setNavBarColor(string $navBarColor): self
    {
        $this->navBarColor = $navBarColor;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavBarPositioning()
    {
        return $this->navBarPositioning;
    }

    /**
     * @param string $navBarPositioning 
     * @return self
     */
    public function setNavBarPositioning(string $navBarPositioning): self
    {
        $this->navBarPositioning = $navBarPositioning;
        return $this;
    }

    /**
     * @return string
     */
    protected function getNavBarClasses()
    {
        return $this->navBarClasses;
    }

    /**
     * @param mixed $navBarClasses 
     * @return self
     */
    public function setNavBarClasses(string $navBarClasses): self
    {
        $this->navBarClasses = $navBarClasses;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavBrandClasses()
    {
        return $this->navBrandClasses;
    }

    /**
     * @param string $navBrandClasses 
     * @return self
     */
    public function setNavBrandClasses(string $navBrandClasses): self
    {
        $this->navBrandClasses = $navBrandClasses;
        return $this;
    }

    /**
     * @return string
     */
    protected function getNavBrandLink()
    {
        if (!empty($this->navBrandLink)) {
            return $this->navBrandLink;
        } else {
            throw new Exception("Warning: Nav brand link has not been defined");
        }
    }

    /**
     * @param string $navBrandLink 
     * @return self
     */
    public function setNavBrandLink(string $navBrandLink): self
    {
        $this->navBrandLink = $navBrandLink;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavBrandImageUrl()
    {
        return $this->navBrandImageUrl;
    }

    /**
     * @param string $navBrandImageUrl 
     * @return self
     */
    public function setNavBrandImageUrl(string $navBrandImageUrl): self
    {
        $this->navBrandImageUrl = $navBrandImageUrl;
        return $this;
    }

    /**
     * @return string
     */
    protected function getNavBrandImageClasses()
    {
        if (!empty($this->navBrandImageClasses)) {
            return $this->navBrandImageClasses;
        } else {
            throw new Exception("Warning: Nav brand image classes are invalid");
        }
    }

    /**
     * @param string $navBrandImageClasses 
     * @return self
     */
    public function setNavBrandImageClasses(string $navBrandImageClasses): self
    {
        $this->navBrandImageClasses = $navBrandImageClasses;
        return $this;
    }

    /**
     * @return bool
     */
    protected function isCollapsable()
    {
        return $this->isCollapsable;
    }

    /**
     * @param bool $isCollapsable 
     * @return self
     */
    public function setIsCollapsable(bool $isCollapsable): self
    {
        $this->isCollapsable = $isCollapsable;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavBarUlClasses()
    {
        return $this->navBarUlClasses;
    }

    /**
     * @param mixed $navBarUlClasses 
     * @return self
     */
    public function setNavBarUlClasses(string $navBarUlClasses): self
    {
        $this->navBarUlClasses = $navBarUlClasses;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getNavItemClasses()
    {
        return $this->navItemClasses;
    }

    /**
     * @param string $navItemClasses 
     * @return self
     */
    public function setNavItemClasses(string $navItemClasses): self
    {
        $this->navItemClasses = $navItemClasses;
        return $this;
    }

    /**
     * @return array
     */
    protected function getNavItems()
    {
        return $this->navItems;
    }

    /**
     * @param array $navItems 
     * @return self
     */
    public function setNavItems(array $navItems): self
    {
        $this->navItems = $navItems;
        return $this;
    }

    /**
     * @return array
     */
    protected function getNavLinks()
    {
        return $this->navLinks;
    }

    /**
     * @param array $navLinks 
     * @return self
     */
    public function setNavLinks(array $navLinks): self
    {
        $this->navLinks = $navLinks;
        return $this;
    }

    /**
     * @return string
     */
    protected function getNavLinkClasses()
    {
        return $this->navLinkClasses;
    }

    /**
     * @param string $navLinkClasses 
     * @return self
     */
    public function setNavLinkClasses(string $navLinkClasses): self
    {
        $this->navLinkClasses = $navLinkClasses;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getSeparator()
    {
        return $this->separator;
    }

    /**
     * @param bool $separator 
     * @return self
     */
    public function setSeparator(bool $separator): self
    {
        $this->separator = $separator;
        return $this;
    }

    /**
     * @return string
     */
    protected function getSeparatorClasses()
    {
        return $this->separatorClasses;
    }

    /**
     * @param string $separatorClasses 
     * @return self
     */
    public function setSeparatorClasses(string $separatorClasses): self
    {
        $this->separatorClasses = $separatorClasses;
        return $this;
    }

    /**
     * @return array
     */
    protected function getNavbarButtons()
    {
        return $this->navBarButtons;
    }

    /**
     * @param array $navBarButtons 
     * @return self
     */
    public function setNavbarButtons(array $navBarButtons): self
    {
        $this->navBarButtons = $navBarButtons;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getButtonColor()
    {
        return $this->buttonColor;
    }

    /**
     * @param mixed $buttonColor 
     * @return self
     */
    public function setButtonColor(array $buttonColor): self
    {
        $this->buttonColor = $buttonColor;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getButtonClasses()
    {
        return $this->buttonClasses;
    }

    /**
     * @param mixed $buttonClasses 
     * @return self
     */
    public function setButtonClasses($buttonClasses): self
    {
        $this->buttonClasses = $buttonClasses;
        return $this;
    }

    /**
     * @return string
     */
    protected function getButtonContainerClasses()
    {
        return $this->buttonContainerClasses;
    }

    /**
     * @param string $buttonContainerClasses 
     * @return self
     */
    public function setButtonContainerClasses(string $buttonContainerClasses): self
    {
        $this->buttonContainerClasses = $buttonContainerClasses;
        return $this;
    }

    /**
     * @return array
     */
    protected function getButtonLinks()
    {
        return $this->buttonLinks;
    }

    /**
     * @param array $buttonLinks 
     * @return self
     */
    public function setButtonLinks(array $buttonLinks): self
    {
        $this->buttonLinks = $buttonLinks;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param string $currentPage 
     * @return self
     */
    public function setCurrentPage(string $currentPage): self
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * Summary of dropDownItems
     * @return array
     */
    protected function getDropDownItems()
    {
        return $this->dropDownItems;
    }

    /**
     * Summary of dropDownItems
     * @param array $dropDownItems Summary of dropDownItems
     * @return self
     */
    public function setDropDownItems(array $dropDownItems): self
    {
        $this->dropDownItems = $dropDownItems;
        return $this;
    }

    /**
     * Summary of dropDownItemsLinks
     * @return array
     */
    protected function getDropDownItemLinks()
    {
        return $this->dropDownItemsLinks;
    }

    /**
     * Summary of dropDownItemsLinks
     * @param array $dropDownItemsLinks Summary of dropDownItemsLinks
     * @return self
     */
    public function setDropDownItemLinks(array $dropDownItemsLinks): self
    {
        $this->dropDownItemsLinks = $dropDownItemsLinks;
        return $this;
    }


    /**
     * Summary of dropDownItemsId
     * @return array
     */
    protected function getDropDownItemsId()
    {
        return $this->dropDownItemsId;
    }

    /**
     * Summary of dropDownItemsId
     * @param array $dropDownItemsId Summary of dropDownItemsId
     * @return self
     */
    public function setDropDownItemsId(array $dropDownItemsId): self
    {
        $this->dropDownItemsId = $dropDownItemsId;
        return $this;
    }

    /**
     * Summary of navItemIcons
     * @return array
     */
    protected function getNavItemIcons()
    {
        return $this->navItemIcons;
    }

    /**
     * Summary of navItemIcons
     * @param array $navItemIcons Summary of navItemIcons
     * @return self
     */
    public function setNavItemIcons(array $navItemIcons): self
    {
        $this->navItemIcons = $navItemIcons;
        return $this;
    }

    /**
     * Summary of navItemIconClasses
     * @return array
     */
    protected function getNavItemIconClasses()
    {
        return $this->navItemIconClasses;
    }

    /**
     * Summary of navItemIconClasses
     * @param array $navItemIconClasses Summary of navItemIconClasses
     * @return self
     */
    public function setNavItemIconClasses(array $navItemIconClasses): self
    {
        $this->navItemIconClasses = $navItemIconClasses;
        return $this;
    }

    /**
     * Summary of dropdownItemClasses
     * @return array
     */
    private function getDropdownItemClasses()
    {
        return $this->dropdownItemClasses;
    }

    /**
     * Summary of dropdownItemClasses
     * @param array $dropdownItemClasses Summary of dropdownItemClasses
     * @return self
     */
    public function setDropdownItemClasses(array $dropdownItemClasses): self
    {
        $this->dropdownItemClasses = $dropdownItemClasses;
        return $this;
    }

    /**
     * Summary of dropdownItemLinkClasses
     * @return array
     */
    private function getDropdownItemLinkClasses()
    {
        return $this->dropdownItemLinkClasses;
    }

    /**
     * Summary of dropdownItemLinkClasses
     * @param array $dropdownItemLinkClasses Summary of dropdownItemLinkClasses
     * @return self
     */
    public function setDropdownItemLinkClasses($dropdownItemLinkClasses): self
    {
        $this->dropdownItemLinkClasses = $dropdownItemLinkClasses;
        return $this;
    }

    /**
     * Summary of type
     * @return string
     */
    private function getType()
    {
        return $this->type;
    }

    /**
     * Summary of type
     * @param string $type Summary of type
     * @return self
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }



    protected function loopButtonLinks()
    {
        foreach ($this->getNavbarButtons() as $item) {
            echo
                ' <li class="nav-item ' . $this->getButtonContainerClasses() . '">
                <a class="nav-link btn btn-' . $this->getButtonColor()[$item] . ' ' . $this->getButtonClasses() . '" href="' . $this->getButtonLinks()[$item] . '">';
            if (Formatter::verifyArrayKey($item, $this->getNavItemIcons())) {
                echo '<img src="' . $this->getNavItemIcons()[$item] . '" class="img-fluid ' . $this->getNavItemIconClasses()[$item] . '">';
            }
            echo $item;
            echo '</a>
            </li>';
        }
    }




    protected function loopNavItems()
    {
        foreach ($this->getNavItems() as $item) {
            if ($item == $this->getCurrentPage()) {
                echo
                    '<li class="nav-item ' . $this->getNavItemClasses() . '">
                        <a class="nav-link active ' . $this->getNavLinkClasses() . '" href="' . $this->getNavLinks()[$item] . '" aria-current="page">' . $item . '
                            <span class="visually-hidden">(current)</span></a>
                    </li>';
            } else {
                if (count($this->getDropDownItems()) && Formatter::verifyArrayKey($item, $this->getDropDownItems())) {
                    echo '  <li class="nav-item dropdown ' . $this->getNavItemClasses() . '">
                    <a class="nav-link dropdown-toggle" href="#" id="' . $this->getDropDownItemsId()[$item] . '"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                        . $item . '</a>';
                    if (Formatter::verifyArrayKey($item, $this->getDropdownItemClasses())) {
                        echo '<div class="dropdown-menu ' . $this->getDropdownItemClasses()[$item] . '" aria-labelledby="' . $this->getDropDownItemsId()[$item] . '">';
                    } else {
                        echo '<div class="dropdown-menu bg-light" aria-labelledby="' . $this->getDropDownItemsId()[$item] . '">';
                    }
                    foreach ($this->getDropDownItems()[$item] as $dropdownItem) {
                        if (Formatter::verifyArrayKey($dropdownItem, $this->getDropdownItemLinkClasses())) {
                            echo ' <a class="dropdown-item ' . $this->getDropdownItemLinkClasses()[$dropdownItem] . '" href="' . $this->getDropDownItemLinks()[$item][$dropdownItem] . '">';
                        } else {
                            echo ' <a class="dropdown-item my-2" href="' . $this->getDropDownItemLinks()[$item][$dropdownItem] . '">';
                        }
                        if (Formatter::verifyArrayKey($dropdownItem, $this->getNavItemIcons())) {
                            echo '<img src="' . $this->getNavItemIcons()[$dropdownItem] . '" class="img-fluid ' . $this->getNavItemIconClasses()[$dropdownItem] . '">';
                        }
                        echo $dropdownItem;
                        echo '</a>';
                    }
                    echo '
                    </div>
                </li>';
                } else {
                    echo
                        '<li class="nav-item ' . $this->getNavItemClasses() . '">
                        <a class="nav-link ' . $this->getNavLinkClasses() . '" href="' . $this->getNavLinks()[$item] . '">';
                    if (Formatter::verifyArrayKey($item, $this->getNavItemIcons())) {
                        echo '<img src="' . $this->getNavItemIcons()[$item] . '" class="img-fluid ' . $this->getNavItemIconClasses()[$item] . '">';
                    }
                    echo $item;
                    echo '</a>
                    </li>';
                }
            }

        }
    }



    private function defaultNavbar()
    {
        echo '
        <nav class="navbar navbar-expand-xl  navbar-' . $this->getNavBarVariation() . ' bg-' . $this->getNavbarColor() . ' ' . $this->getNavBarClasses() . ' ' . $this->getNavBarPositioning() . '">
            <a class="navbar-brand ' . $this->getNavBrandClasses() . '" href="' . $this->getNavBrandLink() . '">
                <img src="' . $this->getNavBrandImageUrl() . '" alt=""
class="img-fluid ' . $this->getNavBrandImageClasses() . '"></a>';

        if ($this->isCollapsable()) {
            echo '
<button class="navbar-toggler d-xl-none me-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
<div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav ' . $this->getNavBarUlClasses() . '">';
            $this->loopNavItems();


            if ($this->getSeparator()) {
                echo '<span class="nav-link ' . $this->getSeparatorClasses() . '">|</span>';
            }

            if (count($this->getNavbarButtons())) {
                $this->loopButtonLinks();
            }
            echo '
    </ul>
</div>';
        }
        echo '</nav>';
    }



    private function navbarWithOffCanvas()
    {

    }






    protected function render()
    {
        return match ($this->getType()) {
            "navbar-default" => $this->defaultNavbar(),
            "navbar-with-offcanvas" => $this->navbarWithOffCanvas(),
        };
    }


}