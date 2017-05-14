<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class CustomHtmlService extends ServiceProvider
{
    /**
     * @param null $caption
     * @param string $captionIcon
     * @param null $routeName
     * @param string $buttonClass
     * @param string $buttonIcon
     * @return string
     */
    public static function formTitleBox(
        $caption=null,
        $captionIcon="fa fa-cogs",
        $routeName=null,
        $buttonClass="sbold green",
        $buttonIcon="fa fa-plus"
    )
    {
        if(empty($captionIcon)) $captionIcon="fa fa-cogs";
        if(empty($buttonClass)) $buttonClass="sbold green";
        if(empty($buttonIcon)) $buttonIcon="fa fa-plus";
        $HTML="";
        $HTML.="
            <div class=\"portlet-title hidden-print\">
                <div class=\"caption font-dark\">
                    <i class=\"".$captionIcon." font-dark\"></i>
                    <span class=\"caption-subject bold uppercase\"> ".$caption." </span>
                </div>
        ";
        if($routeName!=null){
            $HTML.="
                <div class=\"action\">
                    <div class=\"btn-group pull-right\">
                        <a href=\"".route($routeName)."\" class=\"btn ".$buttonClass."\">
                            Add New 
                            <i class=\"".$buttonIcon."\"></i>
                        </a>
                    </div>
                </div>
        ";
        }
        $HTML.="
            </div>
        ";
        return $HTML;
    }

    /**
     * @param null $caption
     * @param string $captionIcon
     * @return string
     */
    public static function filterBoxOpen($caption=null, $captionIcon="fa fa-search-plus")
    {
        if(empty($captionIcon)) $captionIcon="fa fa-search-plus";
        $HTML="";
        $HTML.="
            <div class=\"portlet green-sharp box hidden-print\">
                <div class=\"portlet-title\">
                    <div class=\"caption\">
                        <i class=\"".$captionIcon."\"></i> ".$caption." 
                    </div>
                </div>
                <div class=\"portlet-body\">
                    <div class=\"row\">
                        
                        
        ";
        return $HTML;
    }

    /**
     * @return string
     */
    public static function filterBoxClose()
    {
        $HTML="";
        $HTML.="
                    </div>
                </div>
            </div>            
        ";
        return $HTML;
    }

    /**
     * @param $model
     * @param $position
     * @return string
     */
    public static function customPaginate( $model, $position='bottom')
    {
        $HTML="";
        $HTML.="
            <style>
                .pagination{
                    margin: 0px !important;
                }
            </style>
            <div class=\"row\">
                <div class=\"pull-right\">
                    <div class=\"pull-left\">
        ";
        if($position=='top'){
            $HTML.="
                    <select
                        name='display_item_per_page' 
                        id='display_item_per_page' 
                        class='form-control input-small'
                    >
                        <option value='10'>10</option>
                        <option value='20'>20</option>
                        <option value='50'>50</option>
                        <option value='100'>100</option>
                    </select>
            ";
        }
        $HTML.=" 
                    </div>
                    <div class=\"pull-right\">
        ";
            $HTML.= $model->links();
        $HTML.="
                    </div>
        ";
        $HTML.="
                </div>
        ";
        if($position=='top'){

        }else{
        $HTML.="
                <div class=\"pull-left\">
                        Total: 
        ";
                    if($position=='top'){
                        $HTML.=$model->firstItem()?$model->firstItem():0;
                    }else{
                        $HTML.=$model->lastItem()?$model->lastItem():0;
                    }
        $HTML.="
                        of  
        ";
                        $HTML.=$model->total();
        $HTML.="
                        records
                </div>
        ";
        }
        $HTML.="
            </div>
        ";
        return $HTML;
    }

    /**
     * @return string
     */
    public static function printPreviewButton()
    {
        $HTML="";

        //Print Preview Button
        $HTML.="
            <a class=\"btn yellow hidden-print printPreview\" />
                Print
                <i class=\"glyphicon glyphicon-camera\"></i>
            </a>
        ";

        return $HTML;
    }

    /**
     * @param string $reportTitle
     * @return string
     */
    public static function printButton($reportTitle='...'){
        $HTML="";

        //Print Button
        $HTML.="
            <a 
                class=\"btn blue hidden-print\" 
                onclick=\"javascript:document.title = '".$reportTitle."';javascript:window.print();\"
            />
                Print
                <i class=\"fa fa-print\"></i>
            </a>
        ";

        return $HTML;
    }

    /**
     * @param string $routeLink
     * @return string
     */
    public static function backButton($routeLink='#')
    {
        $HTML="";

        //Back Button
        $HTML.="
            <a href=\"".$routeLink."\" class=\"btn btn-danger hidden-print\">
                <i class=\"glyphicon glyphicon-hand-left\"></i> Back
            </a>
        ";

        return $HTML;
    }

    /**
     * @param string $routeLink
     * @return string
     */
    public static function pdfButton($routeLink='#')
    {
        $HTML="";

        $HTML.="
        <a class=\"btn blue hidden-print\" href=\"".$routeLink."\" id=\"pdfPrint\" />
            PDF
            <i class=\"fa fa-file-pdf-o\"></i>
        </a>";

        return $HTML;
    }

    /**
     * @param string $routeLink
     * @return string
     */
    public static function editButton( $routeLink='#')
    {
        $HTML="";

        $HTML.="
            <a href=\"".$routeLink."\" class=\"btn btn-primary green\" />
                <i class=\"glyphicon glyphicon-pencil\"></i> Edit
            </a>
        ";

        return $HTML;
    }

    /**
     * @param string $reportTitle
     * @param string $routeLink
     * @param array $selectButton
     * @return string
     */
    public static function customPrintButton( $reportTitle='...', $routeLink='#', $selectButton=array())
    {
        $HTML="";

        foreach ($selectButton as $thisSelectButton){
            if($thisSelectButton=='printPreview') $HTML.= self::printPreviewButton();
            if($thisSelectButton=='pdfButton') $HTML.= self::pdfButton($routeLink);
            if($thisSelectButton=='printButton') $HTML.= self::printButton($reportTitle);
            if($thisSelectButton=='backButton') $HTML.= self::backButton($routeLink);
        }

        return $HTML;
    }

}