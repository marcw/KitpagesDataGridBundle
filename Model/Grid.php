<?php

namespace Kitpages\DataGridBundle\Model;

use Kitpages\DataGridBundle\Tool\UrlTool;
use Kitpages\DataGridBundle\Model\Field;

class Grid
{
    /** @var Paginator */
    protected $paginator = null;
    /** @var GridConfig */
    protected $gridConfig = null;
    /** @var array */
    protected $itemList = array();
    /** @var UrlTool */
    protected $urlTool = null;
    /** @var string */
    protected $requestUri = null;
    /** @var string */
    protected $filterValue = null;

    public function displayGridValue($value, Field $field)
    {
        if ( is_callable( $field->getFormatValueCallback() ) ) {
            $callback = $field->getFormatValueCallback();
            return $callback($value);
        }
        if (is_scalar($value)) {
            return $value;
        }
        if ($value instanceof \DateTime) {
            return $value->format("Y-m-d H:i:s");
        }

        return $value;
    }

    public function getFilterFormName()
    {
        return "kitdg_grid_".$this->getGridConfig()->getName()."_filter";
    }

    /**
     * @param \Kitpages\DataGridBundle\Model\GridConfig $gridConfig
     */
    public function setGridConfig($gridConfig)
    {
        $this->gridConfig = $gridConfig;
    }

    /**
     * @return \Kitpages\DataGridBundle\Model\GridConfig
     */
    public function getGridConfig()
    {
        return $this->gridConfig;
    }

    public function setItemList($itemList)
    {
        $this->itemList = $itemList;
    }

    public function getItemList()
    {
        return $this->itemList;
    }

    /**
     * @param \Kitpages\DataGridBundle\Model\Paginator $paginator
     */
    public function setPaginator($paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @return \Kitpages\DataGridBundle\Model\Paginator
     */
    public function getPaginator()
    {
        return $this->paginator;
    }

    /**
     * @param \Kitpages\DataGridBundle\Tool\UrlTool $urlTool
     */
    public function setUrlTool($urlTool)
    {
        $this->urlTool = $urlTool;
    }

    /**
     * @return \Kitpages\DataGridBundle\Tool\UrlTool
     */
    public function getUrlTool()
    {
        return $this->urlTool;
    }

    /**
     * @param string $requestUri
     */
    public function setRequestUri($requestUri)
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param string $filterValue
     */
    public function setFilterValue($filterValue)
    {
        $this->filterValue = $filterValue;
    }

    /**
     * @return string
     */
    public function getFilterValue()
    {
        return $this->filterValue;
    }
}